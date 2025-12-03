<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public $table = 'admin';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'user_id',
        'role',
        'start',
        'end',
        'active_days'
    ];

    protected function casts(): array
    {
        return [
            'active_days' => 'array',
        ];
    }
}
