<?php

namespace IgniteCareers\Source;

use IgniteCareers\Source\Commands\MigrateCheckCommand;
use IgniteCareers\Source\Commands\NewVersion;
use IgniteCareers\Source\Commands\NewVersionModule;
use IgniteCareers\Source\Commands\VendorCleanUpCommand;
use Illuminate\Support\ServiceProvider;

class IgniteCareersSourceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/Config/ignite_source.php','ignite_source'
        );
        $this->commands([
            VendorCleanUpCommand::class,
            NewVersion::class,
            NewVersionModule::class,
            MigrateCheckCommand::class
        ]);
    }

    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function boot()
    {
        $this->publishFiles();

        include __DIR__ . '/routes.php';
    }

    public function publishFiles()
    {
        $this->publishes([
            __DIR__ . '/Config/ignite_source.php' => config_path('ignite_source.php'),
        ]);

        $this->publishes([
            __DIR__ . '/Migrations/' => database_path('migrations')
        ], 'migrations');

        $this->publishes([
            __DIR__ . '/Views' => resource_path('views/vendor/ignite-source'),
        ]);

    }
}
