<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table = 'person_email';
    protected $primaryKey = 'id';
    protected $fillable = ['PersonID', 'Email'];

    use HasFactory;
}
