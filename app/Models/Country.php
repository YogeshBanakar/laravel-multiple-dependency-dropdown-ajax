<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'country_name',
        'region_id',
    ];
    public function region(){
        return $this->belongsTo(Region::class,'region_id');
    }
    public function city(){
        return $this->hasMany(City::class,'country_id');
    }
}
