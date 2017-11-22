<?php

namespace SoaringHost\Admin\Middleware;

use SoaringHost\Admin\Form;
use SoaringHost\Admin\Grid;
use Illuminate\Http\Request;

class Bootstrap
{
    /**
     * @param Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, \Closure $next)
    {
        Form::registerBuiltinFields();

        if (file_exists($bootstrap = admin_path('bootstrap.php'))) {
            require $bootstrap;
        }

        Form::collectFieldAssets();

        Grid::registerColumnDisplayer();

        return $next($request);
    }
}
