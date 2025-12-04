<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerificationToken extends Model
{
    public $table = 'verification_token';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'expiration',
        'patient_id',
        'token',
    ];
}
