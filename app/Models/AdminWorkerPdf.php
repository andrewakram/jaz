<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminWorkerPdf extends Model
{
    protected $fillable = [
        'type', 'file'
    ];

    public function setFileAttribute($value)
    {
        $file_name = time().uniqid().'.'.$value->getClientOriginalExtension();
        $value->move(public_path('/public/admin/worker/pdf/'),$file_name);
        $this->attributes['file'] = $file_name ;
    }

    public function getFileAttribute($value)
    {
        return asset('public/public/admin/worker/pdf/'.$value);
    }
}
