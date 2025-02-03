<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    public function setUserNameAttribute($value){
        $this->attributes['user_name']= strtolower($value);
    }

    // password bcrypt or incrypt
    public function setPasswordAttribute($value){
        $this->attributes['password']= bcrypt($value);
    }

}
