<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function staffIdToText()
    {
        return $this->belongsTo(users::class, 'fk_staff', 'id_user');
    }

    public function patientIdToText()
    {
        return $this->belongsTo(users::class, 'fk_patient', 'id_user');
    }

}
