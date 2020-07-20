<?php
use Illuminate\Support\Facades\Config;
use \Illuminate\Support\Facades\Auth;

function unique_file($fileName)
{
    $fileName = str_replace(' ','-',$fileName);
    return time() . uniqid().'-'.$fileName;
}

function generateActivationCode()
{
    return rand(1000,9999);
}

function admin()
{
    return Auth::guard('admin')->user();
}

function success()
{
    return 'success';
}


function error()
{
    return 'error';
}


function failed()
{
    return 'failed';
}

function not_active()
{
    return 'not_active';
}

function waiting_admin()
{
    return 'waiting_admin';
}

function msg($request,$status,$key)
{
    $msg['status'] = $status;
    $msg['msg'] = Config::get('response.'.$key.'.'.$request->header('lang'));

    return $msg;
}

function msgdata($request,$status,$key,$data)
{
    $msg['status'] = $status;
    $msg['msg'] = Config::get('response.'.$key.'.'.$request->header('lang'));
    $msg['data'] = $data;

    return $msg;
}

function image($path,$url)
{
    return 'http://'.$_SERVER['SERVER_NAME'].$path.$url;
}
