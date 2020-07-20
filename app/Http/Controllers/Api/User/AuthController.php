<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Interfaces\User\AuthRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    protected $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role' => 'required|in:user,company',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|numeric',
            'password' => 'required|min:6',
            'address' => 'required',
            'lat' => 'required',
            'lng' => 'required',
        ]);

        if($validator->fails())
        {
            return response()->json(['status' => 'error', 'msg' => $validator->messages()->first()]);
        }

        $email = $request->email;

        if($this->authRepository->checkIfEmailExist($email))
        {
            return response()->json(msg($request, failed(), 'email_exist'));
        }

        $phone = $request->phone;

        if($this->authRepository->checkIfPhoneExist($phone))
        {
            return response()->json(msg($request, failed(), 'phone_exist'));
        }

        $user = $this->authRepository->create($request);

        if($user)
        {
            $user = $this->authRepository->userData($user);
            return response()->json(msgdata($request, success(), 'register_success',$user));
            //return response()->json(msg($request, success(), 'register_success'));
        }
    }

    public function codeSend(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role' => 'required|in:user,company',
            'type' => 'required|in:activate,reset',
            'phone' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validator->messages()->first()]);
        }

        $this->authRepository->sendSMS('user',$request->type,$request->phone);

        return response()->json(msg($request, success(), 'code_sent'));
    }

    public function codeCheck(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
        ]);

        if($validator->fails())
        {
            return response()->json(['status' => 'error', 'msg' => $validator->messages()->first()]);
        }

        $check = $this->authRepository->codeCheck($request->code);
        if($check)
        {
            if(Carbon::now()->format('Y-m-d H') > Carbon::parse($check->expire_at)->format('Y-m-d H'))
            {
                return response()->json(msg($request, failed(), 'code_expire'));
            }else{
                if($check->type == 'activate')
                {
                    $this->authRepository->activeUser($check->phone);
                    return response()->json(msg($request, success(), 'activated'));
                }else{
                    $user = $this->authRepository->checkIfPhoneExist($check->phone);
                    return response()->json(msgdata($request, success(), 'activated',$user));
                }
            }
        }else{
            return response()->json(msg($request, failed(), 'invalid_code'));
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|numeric',
            'password' => 'required',
            'token' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['status' => 'error', 'msg' => $validator->messages()->first()]);
        }

        $user = $this->authRepository->checkIfPhoneExist($request->phone);
        if($user)
        {
            if(Hash::check($request->password,$user->password))
            {
                if($user->active == 0) return response()->json(msg($request, not_active(), 'not_active'));

                $user->token = $request->token;
                $user->jwt = Str::random(25);
                $user->save();
                $user = $this->authRepository->userData($user->jwt);
                return response()->json(msgdata($request, success(), 'logged_in', $user));
            }
            else return response()->json(msg($request, failed(), 'invalid_data'));
        }
        else return response()->json(msg($request, failed(), 'invalid_data'));
    }

    public function forgetPassword(Request $request)
    {
        $validator = Validator::make($request->all(),[
           'password' => 'required|min:6',
            'user_id' => 'required|exists:users,id'
        ]);

        if($validator->fails())
        {
            return response()->json(['status' => 'error', 'msg' => $validator->messages()->first()]);
        }

        $user = $this->authRepository->checkId($request->user_id);
        if($user)
        {
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json(msg($request, success(), 'password_changed'));
        }
        return response()->json(msg($request, failed(), 'invalid_data'));
    }
}
