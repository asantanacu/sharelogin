<?php 
namespace Asantanacu\ShareLogin\Providers;

use Illuminate\Support\ServiceProvider;

class ShareLoginServiceProvider extends ServiceProvider
{
	public function boot()
	{
	    $this->publishes([
	        __DIR__.'/../../config/sharelogin.php' => config_path('sharelogin.php')
	    ], 'config');
	
	    $this->publishes([
	        __DIR__.'/../../database/migrations/' => database_path('migrations')
	    ], 'migrations');
	    
	    if (! $this->app->routesAreCached()) {
	    	require __DIR__.'/../Http/routes.php';
	    }

		$loader = \Illuminate\Foundation\AliasLoader::getInstance();
		$aliases = \Config::get('app.aliases');

		if (empty($aliases['ShareLogin'])) {
			$loader->alias('ShareLogin', \Asantanacu\ShareLogin\Facades\ShareLogin::class);
		}	    
	}	
	
    public function register()
    {
        $this->app->bind('sharelogin', 'Asantanacu\ShareLogin\ShareLogin');
		
		$this->commands([
            'Asantanacu\ShareLogin\Console\Commands\ShareLogin',
        ]);
    }
}