<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    protected $table = 'lab';
    protected $primaryKey = 'id';
    protected $fillable = ['LabType', 'LabDescription'];

    public function patienthistories()
    {
        return $this->hasMany(Patienthistory::class);
    }

    use HasFactory;
}
