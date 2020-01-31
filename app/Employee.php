<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'salary_usd',
        'salary_mxn',
        'address',
        'city',
        'email',
    ];
}
