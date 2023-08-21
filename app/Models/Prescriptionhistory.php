<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescriptionhistory extends Model
{
    protected $table = 'patient_prescription_history';
    protected $primaryKey = 'id';
    protected $fillable = ['PatientID', 'medicine'];

    use HasFactory;
}
