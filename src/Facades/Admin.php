<?php

namespace StartupWrench\Admin\Facades;

use Illuminate\Support\Facades\Facade;

class Admin extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \StartupWrench\Admin\Admin::class;
    }
}
