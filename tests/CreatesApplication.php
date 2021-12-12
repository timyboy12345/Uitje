<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Mcamara\LaravelLocalization\LaravelLocalization;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        putenv(LaravelLocalization::ENV_ROUTE_KEY . '=' . 'nl-NL');

        return $app;
    }
}
