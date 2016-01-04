<?php 
namespace Asantanacu\ShareLogin;

class SearchServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $this->app->bind('sharelogin', 'Asantanacu\ShareLogin\ShareLogin');
    }
}