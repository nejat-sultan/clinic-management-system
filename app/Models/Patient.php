<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patient';
    protected $primaryKey = 'id';
    protected $fillable = ['CardNumber', 'PersonID'];

    public function patienthistory()
    {
        return $this->belongsTo(Patienthistory::class);
    }

    public function prescriptionhistory()
    {
        return $this->belongsTo(Prescriptionhistory::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }



    use HasFactory;
}
