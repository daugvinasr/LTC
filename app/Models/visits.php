<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visits extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function patientIdToText()
    {
        return $this->belongsTo(users::class, 'fk_patient', 'id_user');
    }
    public function doctorIdToText()
    {
        return $this->belongsTo(users::class, 'fk_doctor', 'id_user');
    }
}
