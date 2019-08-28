<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    // название таблицы
    protected $table = 'companies';

    protected $fillable = [
        'name',
        'email',
        'logo',
        'is_checked',
        'website',
    ];
}
