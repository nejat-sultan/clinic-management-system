<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patienthistory extends Model
{
    protected $table = 'patient_history';
    protected $primaryKey = 'id';
    protected $fillable = ['PatientID', 'findings'];

    use HasFactory;
}
