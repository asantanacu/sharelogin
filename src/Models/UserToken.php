<?php

namespace Asantanacu\ShareLogin\Models;

use Illuminate\Database\Eloquent\Model;

class UserToken extends Model
{
	protected $primaryKey = 'token';
	
	protected $fillable = ['token','user_id'];
}