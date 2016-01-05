<?php 
namespace Asantanacu\ShareLogin;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $this->app->bind('sharelogin', 'Asantanacu\ShareLogin\ShareLogin');
    }
}