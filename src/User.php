<?php

namespace Asantanacu\ShareLogin;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public function usertokens(){
    	return $this->hasMany('Asantanacu\ShareLogin\UserToken');
    }
}
