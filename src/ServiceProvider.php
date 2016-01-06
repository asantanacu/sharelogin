<?php 
namespace Asantanacu\ShareLogin;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
	public function boot()
	{
	    $this->publishes([
	        __DIR__.'/../config/sharelogin.php' => config_path('sharelogin.php')
	    ], 'config');
	
	    $this->publishes([
	        __DIR__.'/../database/migrations/' => database_path('migrations')
	    ], 'migrations');
	    
	    if (! $this->app->routesAreCached()) {
	    	require __DIR__.'/../routes/routes.php';
	    }	    
	}	
	
    public function register()
    {
        $this->app->bind('sharelogin', 'Asantanacu\ShareLogin\ShareLogin');
    }
}