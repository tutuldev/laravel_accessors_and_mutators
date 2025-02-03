<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Number;

class User extends Model
{
    use HasFactory;
    // protected $fillable = ['name','email','age','city'];
    public  $timestamps=false;
    protected $guarded = [];
    // convert with small letter in email column
    public function setEmailAttribute($value){
        $this->attributes['email']= strtolower($value);
    }
    // convert with small letter in name  column
    // public function setUserNameAttribute($value){
    //     $this->attributes['user_name']= strtolower($value);
    // }

    // password bcrypt or incrypt
    public function setPasswordAttribute($value){
        $this->attributes['password']= bcrypt($value);
    }

    // get method
    public function getDobAttribute($value){
        return date('d M Y',strtotime($value));
    }
    // public function getUserNameAttribute($value){
    //     return ucwords($value);
    // }
    // public function getSalaryAttribute($value){
    //     // return Number::currency($value); //defult dollor
    //     return Number::currency($value,in:'EUR'); //defult dollor to uro
    // }

    // public function getSalaryAttribute($value){
    //     return Number::format($value); //defult dollor to uro
    // }

    public function getSalaryAttribute($value){
        return Number::spell($value); //defult dollor to uro
    }
    // get set method both

    // get set both
    protected function UserName():Attribute{
        return Attribute::make(
            get: fn(string $value) => ucwords($value),
            set: fn(string $value) => strtolower($value),
        );
    }

}
