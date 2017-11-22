<?php

namespace SoaringHost\Admin\Facades;

use Illuminate\Support\Facades\Facade;

class Admin extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \SoaringHost\Admin\Admin::class;
    }
}
