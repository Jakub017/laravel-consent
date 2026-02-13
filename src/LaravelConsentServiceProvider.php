<?php

namespace Jakub017\LaravelConsent;

use Jakub017\LaravelConsent\Commands\LaravelConsentCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelConsentServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-consent')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_consent_table')
            ->hasCommand(LaravelConsentCommand::class);
    }

    public function packageRegistered(): void
    {
        $this->app->singleton(LaravelConsent::class, function () {
            return new LaravelConsent;
        });

        $this->app->alias(LaravelConsent::class, 'laravel-consent');
    }
}
