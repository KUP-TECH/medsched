<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public $table = 'service';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'desc',
        'active_days',
        'start',
        'end',
        'is_active',
    ];


    protected $casts = [
        'active_days' => 'array',
    ];
}
