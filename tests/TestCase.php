<?php

namespace YuriyMartini\Laravel\Authorization\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use YuriyMartini\Laravel\Authorization\ServiceProvider;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ServiceProvider::class,
        ];
    }
}
