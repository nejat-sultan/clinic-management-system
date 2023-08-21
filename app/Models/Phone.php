<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = 'person_phone';
    protected $primaryKey = 'id';
    protected $fillable = ['PersonID', 'PhoneNumber'];

    use HasFactory;
}
