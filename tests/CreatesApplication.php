<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;

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

        $dispatcher = $app->get(\Illuminate\Bus\Dispatcher::class);
        $dispatcher->map([
            \App\Commands\CreateStoreCommand::class => \App\Handlers\Commands\CreateStoreHandler::class,
            \App\Commands\CreateStoreErrorCommand::class => \App\Handlers\Commands\CreateStoreErrorHandler::class,
        ]);

        $app->singleton(\Illuminate\Bus\Dispatcher::class, fn() => $dispatcher);



        return $app;
    }
}
