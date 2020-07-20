<?php

namespace App\Http\Controllers\Interfaces\User;

interface AuthRepositoryInterface{

    public function create($attributes);
    public function sendSMS($role,$type,$phone);
    public function codeCheck($code);
    public function activeUser($phone);
    public function checkIfEmailExist($email);
    public function checkIfPhoneExist($phone);
    public function checkJWT($jwt);
    public function checkId($id);
    public function userData($jwt);
}
