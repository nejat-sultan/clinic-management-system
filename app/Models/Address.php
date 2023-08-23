<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'person_address';
    protected $primaryKey = 'id';
    protected $fillable = ['RegionID', 'ZoneOrSubcity', 'Woreda', 'Town', 'Kebele', 'HouseNumber', 'PersonID'];

    public function region()
    {
        return $this->belongsTo(Region::class,'RegionID');
    }

    public function person()
    {
        return $this->belongsTo(Person::class,'PersonID');
    }
   
    use HasFactory;
}
