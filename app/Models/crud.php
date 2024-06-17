<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class crud extends Model
{
    use HasFactory;
    protected $table='Cruds';
    protected $fillable=[
   
        'first_name',
        'last_name',
        'email',
        'contact',
        'gender',
        'hobies',
        'address',
        'country_id',
        'profile'
    ];

    public function setEmailAttribute($value)
    {
        $this->attributes['email']=Str::of($value)->lower();
    }

    public function setHobiesAttribute($value)
    {
        $this->attributes['hobies'] = implode(',', $value);
    }

    public function getHobiesArrAttribute()
    {
        return explode(',', $this->hobies);
    }
    
    
    public function getcountry()
    {
        return $this->belongsTo(countrylist::class,'country_id','id');
    }
}
    
