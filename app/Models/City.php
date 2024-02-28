<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory, \Znck\Eloquent\Traits\BelongsToThrough;
    protected $fillable = ["country_id","state_id","name","country_code"];
    public function states(){
        return $this->belongsTo(State::class,'id')->withDefault([
            'name' => 'Empty state'
        ]);
    }
    public function country(){
        return $this->belongsToThrough(Country::class,State::class);
    }
}
