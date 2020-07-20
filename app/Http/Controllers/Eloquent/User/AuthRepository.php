<?php

namespace App\Http\Controllers\Eloquent\User;

use App\Http\Controllers\Interfaces\User\AuthRepositoryInterface;
use App\Models\User;
use App\Models\Verification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthRepository implements AuthRepositoryInterface {

    public function create($input)
    {
        $array = array(
            'jwt' => Str::random(25),
            'role' => $input->role,
            'name' => $input->name,
            'email' => $input->email,
            'phone' => $input->phone,
            'password' => Hash::make($input->password),
            'lat' => $input->lat,
            'lng' => $input->lng,
            'address' => $input->address,
            'active' => 1
        );

        if($user = User::create($array))
        {
            if($input->image)
            {
                $user->image = $input->image;
            }

            if($input->commercial_register)
            {
                $user->commercial_register = $input->commercial_register;
            }

            $this->sendSMS('user', 'activate', $user->phone);
            $user->save();
        }

        return $user->jwt;
    }

    public function sendSMS($role,$type,$phone)
    {
        $activation_code = generateActivationCode();
        $message = "كود التفعيل الخاص بجاز هو".$activation_code;
        $message = urlencode($message);
        $url = "https://www.hisms.ws/api.php?send_sms&username=966563244763&password=Aa0563244763&message=$message&numbers=$phone&sender=JazApp&unicode=e&Rmduplicated=1&return=json";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $data = curl_exec($ch);
        curl_close($ch);
        $decodedData = json_decode($data);

        Verification::updateOrcreate
        (
            [
                'role' => $role,
                'type' => $type,
                'phone' => $phone,
            ],
            [
                'code' => $activation_code,
                'expire_at' => Carbon::now()->addHour()->toDateTimeString()
            ]
        );
    }

    public function checkIfEmailExist($email)
    {
        return User::whereEmail($email)->select('id')->first();
    }

    public function checkIfPhoneExist($phone)
    {
         $user = User::wherePhone($phone)->select('id','password','token','active','image')->first();
         return $user;
    }

    public function checkJWT($jwt)
    {
        return User::whereJwt($jwt)->select('id','password')->first();
    }

    public function checkId($id)
    {
        return User::whereId($id)->first();
    }

    public function codeCheck($code)
    {
        return Verification::whereCode($code)->whereRole('user')->first();
    }

    public function activeUser($phone)
    {
        $user = $this->checkIfPhoneExist($phone);
        $user->active = 1;
        $user->save();
        return $user;
    }

    public function userData($jwt)
    {
        $user = User::whereJwt($jwt)->select('id','jwt','name','email','phone','lat','lng','address','image')->first();
        return $user;
    }
}
