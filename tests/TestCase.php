<?php

namespace Lunaweb\RedisMock\Tests;

use Lunaweb\RedisMock\Providers\RedisMockServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{

    protected function getEnvironmentSetUp($app)
    {

        $app['config']->set('app.debug', true);
        $app['config']->set('database.redis.client', 'mock');


        $app->register(RedisMockServiceProvider::class);
    }

}