<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    protected $table = 'employee_license';
    protected $primaryKey = 'id';
    protected $fillable = ['LicenseTitle', 'LicenseGivenDate', 'LicenseExpiryDate', 'LicensingOrgan', 'PersonID'];

    use HasFactory;
}
