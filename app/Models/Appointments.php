<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    public $table = 'appointment';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'service_id',
        'patient_id',
        'attendance_id',
        'date',
        'start',
        'status',
        'remarks',
    ];
}
