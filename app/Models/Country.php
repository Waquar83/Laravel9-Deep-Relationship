<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = ["iso2","name","status","phone_code","iso3","region","subregion"];
    public function states(){
        return $this->hasMany(State::class,'country_id');
    }
}
