<?php
namespace Asantanacu\ShareLogin\Http\Controllers;

use Asantanacu\ShareLogin\Models\UserToken;
use Illuminate\Routing\Controller;
use Auth;

class ShareLoginController extends Controller
{
    public function logout()
    {
		Auth::logout();
    }
	
    public function token($token)
    {
		$usertoken = UserToken::where('token',$token)->firstOrFail();
		Auth::loginUsingId($usertoken->user_id);
		$usertoken->delete();
    }

    public function refresh()
    {
		return;
    }	
}
