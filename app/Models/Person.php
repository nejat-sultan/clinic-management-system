<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Person extends Model
{
    protected $table = 'person';
    protected $primaryKey = 'id';
    protected $fillable = ['PersonTypeID', 'Title', 'FirstName','FatherName', 'LastName', 'DOB', 'PhotoURL', 'Gender', 'CreatedByID'];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'PersonID', 'id');
    }

    use HasFactory;
}
