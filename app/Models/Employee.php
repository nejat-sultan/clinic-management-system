<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';
    protected $primaryKey = 'id';
    protected $fillable = ['PersonID', 'Username', 'Password'];

    public function person()
    {
        return $this->belongsTo(Person::class,'PersonID');
    }

    use HasFactory;
}
