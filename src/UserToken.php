<?php

namespace Asantanacu\ShareLogin;

use Illuminate\Database\Eloquent\Model;
use Config;

class UserToken extends Model
{
    protected $fillable = ['token'];
    
    public function user(){
    	return $this->belongsTo(Config::get('sharelogin.usermodel'));
    }
}