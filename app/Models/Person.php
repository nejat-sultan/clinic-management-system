<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'person';
    protected $primaryKey = 'id';
    protected $fillable = ['PersonTypeID', 'Title', 'FirstName','FatherName', 'LastName', 'DOB', 'PhotoURL', 'Gender'];
    
    
    public function employeetype()
    {
        return $this->belongsTo(Employeetype::class,'PersonTypeID')->withDefault();
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function email()
    {
        return $this->belongsTo(Email::class);
    }

    public function phone()
    {
        return $this->belongsTo(Phone::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    use HasFactory;
}
