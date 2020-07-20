<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    protected $fillable = [
        'role', 'type', 'phone', 'code', 'expire_at'
    ];

    public $timestamps = false;
}
