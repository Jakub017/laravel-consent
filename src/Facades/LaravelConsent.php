<?php

namespace Jakub017\LaravelConsent\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Jakub017\LaravelConsent\LaravelConsent
 */
class LaravelConsent extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Jakub017\LaravelConsent\LaravelConsent::class;
    }
}
