<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employeetype extends Model
{
    protected $table = 'person_type';
    protected $primaryKey = 'id';
    protected $fillable = ['TypeName', 'TypeDescription'];

    public function persons()
    {
        return $this->hasMany(Person::class);
    }

    

    use HasFactory;
}
