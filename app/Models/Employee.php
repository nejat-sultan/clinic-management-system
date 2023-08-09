<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Person;

class Employee extends Model
{
    protected $table = 'employee';
    protected $primaryKey = 'id';
    protected $fillable = ['PersonID', 'Username', 'Password', 'CreatedByID'];

    public function persons()
    {
        return $this->belongsTo(Person::class);
    }
   
    use HasFactory;
}
