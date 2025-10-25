<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public $table = 'patient';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'user_id',
        'civil',
        'gender',
        'e_contact',
        'e_number',
        'idno',
        'relationship',
        'blood_type',
        'allergies',
        'medications',
        'previous_illness',
        'smoke',
        'illness',
    ];


    protected function casts(): array
    {
        return [
            'allergies'         => 'array',
            'medications'       => 'array',
            'previuos_illness'  => 'array',
        ];
    }
}
