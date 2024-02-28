<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;
    protected $fillable = ["country_id","name","code","precision","symbol","symbol_native","symbol_first","decimal_mark","thousands_separator"];
}
