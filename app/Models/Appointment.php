<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['clinician_id', 'patient_name', 'patient_email', 'patient_phone', 'signature', 'status'];

    public function clinician()
    {
        return $this->belongsTo(Clinician::class);
    }
}

