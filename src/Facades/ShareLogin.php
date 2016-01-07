<?php
namespace Asantanacu\ShareLogin\Facades;

use Illuminate\Support\Facades\Facade;

class ShareLogin extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'sharelogin';
    }
}