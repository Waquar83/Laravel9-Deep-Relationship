<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $fillable = ["country_id","name","country_code"];
    public function country(){
        return $this->belongsTo(Country::class,'id')->withDefault([
            'name' => 'Empty country'
        ]);
    }
    public function cities(){
        return $this->hasMany(City::class,'state_id');
    }
}
