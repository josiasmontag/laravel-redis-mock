<?php
/**
 * Created by Josias Montag
 * Date: 03.11.17 20:01
 * Mail: josias@montag.info
 */

namespace Lunaweb\RedisMock;

use Illuminate\Redis\Connectors\PhpRedisConnector;
use Illuminate\Redis\Connectors\PredisConnector;
use Illuminate\Redis\RedisManager as BaseRedisManager;

class RedisManager extends BaseRedisManager
{

    /**
     * Get the connector instance for the current driver.
     *
     * @return \Illuminate\Redis\Connectors\PhpRedisConnector|\Illuminate\Redis\Connectors\PredisConnector
     */
    protected function connector()
    {
        switch ($this->driver) {
            case 'predis':
                return new PredisConnector;
            case 'phpredis':
                return new PhpRedisConnector;
            case 'mock':
                return new MockPredisConnector;
        }
    }

}