<?php

namespace NietThijmen\LaravelAuditTrail;

use NietThijmen\LaravelAuditTrail\Commands\LaravelAuditTrailCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelAuditTrailServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-audit-trail')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigrations([
                'create_audit_trails_table',
            ])
            ->publishesServiceProvider(
                'LaravelAuditTrailService',
            )
            ->hasCommand(LaravelAuditTrailCommand::class);
    }
}
