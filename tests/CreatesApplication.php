<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

trait CreatesApplication
{
    //use DatabaseTransactions;

    protected static $migrationsRun = false;

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        Hash::setRounds(4);

        if (!static::$migrationsRun) {
            Artisan::call('migrate:refresh');
            Artisan::call('db:seed');
            static::$migrationsRun = true;
        }

        return $app;
    }
}
