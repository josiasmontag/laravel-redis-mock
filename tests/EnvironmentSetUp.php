<?php
/**
 * Created by Josias Montag
 * Date: 03.11.17 19:57
 * Mail: josias@montag.info
 */

namespace  Lunaweb\RedisMock\Tests;

use Lunaweb\RedisMock\Providers\RedisMockServiceProvider;

trait EnvironmentSetUp
{

    protected function getEnvironmentSetUp($app)
    {

        $app['config']->set('app.debug', true);
        $app['config']->set('database.redis.client', 'mock');


        $app->register(RedisMockServiceProvider::class);
    }

}
