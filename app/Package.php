<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    // название таблицы
    protected $table = 'packages';

    // отключаю стандартные created_at и updated_at
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'short_description',
        'full_description',
        'days',
        'price',
        'currency',
        'is_visible',
        'is_delete',
        'created_at',
    ];
}
