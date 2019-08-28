<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // название таблицы
    protected $table = 'employees';

    protected $fillable = [
        'title',
        'firstname',
        'lastname',
        'company_id',
        'phone',
        'email',
        //'created_at',
        //'updated_at',
    ];
}
