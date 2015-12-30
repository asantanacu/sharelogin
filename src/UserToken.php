<?php

namespace Asantanacu\ShareLogin;

use Illuminate\Database\Eloquent\Model;

class UserToken extends Model
{
    protected $fillable = ['token'];
    
    public function user(){
    	return $this->belongsTo('Asantanacu\ShareLogin\User');
    }
}