<?php

namespace ClassNames;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ClassNames\ClassNames
 */
class ClassNamesFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ClassNamesServiceProvider::ALIAS;
    }
}
