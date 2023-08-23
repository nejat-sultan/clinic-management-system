<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'patient_appointment';
    protected $primaryKey = 'id';
    protected $fillable = ['AssignedToID', 'PatientID', 'AppointmentDate', 'Status'];

     // To get all attributes from patient class
     public function patient()
     {
         return $this->belongsTo(Patient::class,'PatientID');
     }

     // To get all attributes from person class
     public function person()
     {
         return $this->belongsTo(Person::class,'AssignedToID');
     }

     public function lab()
     {
         return $this->belongsTo(Lab::class);
     }

    use HasFactory;
}
