<?php

namespace NietThijmen\LaravelAuditTrail\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \NietThijmen\LaravelAuditTrail\LaravelAuditTrail
 */
class LaravelAuditTrail extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \NietThijmen\LaravelAuditTrail\LaravelAuditTrail::class;
    }
}
