<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Labhistory extends Model
{
    protected $table = 'patient_lab_history';
    protected $primaryKey = 'id';
    protected $fillable = ['LabID', 'PatientID', 'LabDoneByID', 'LabResult'];

    public function patient()
    {
        return $this->belongsTo(Patient::class,'PatientID')->withDefault();
    }

    public function person()
    {
        return $this->belongsTo(Person::class,'LabDoneByID')->withDefault();
    }

    public function lab()
    {
        return $this->belongsTo(Lab::class,'LabID')->withDefault();
    }

    use HasFactory;
}
