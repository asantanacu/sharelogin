<?php

namespace Asantanacu\ShareLogin;

trait User
{
    public function usertokens(){
    	return $this->hasMany('Asantanacu\ShareLogin\UserToken');
    }
}
