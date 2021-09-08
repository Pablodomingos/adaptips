<?php

namespace App\Models;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{   
    use HasFactory;
    protected $fillable = ['title','genre','release','synopsis','rating','image','country_id'];
    public function country(){
        return $this->belongsTo(Country::class);
    }
}
