<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employeetype extends Model
{
    protected $table = 'person_type';
    protected $primaryKey = 'id';
    protected $fillable = ['TypeName', 'TypeDescription'];

    use HasFactory;
}
