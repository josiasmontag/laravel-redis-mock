<?php
/**
 * Created by Josias Montag
 * Date: 03.11.17 19:48
 * Mail: josias@montag.info
 */

namespace Lunaweb\RedisMock\Tests;


use Illuminate\Support\Facades\Redis;
use Lunaweb\RedisMock\MockPredisConnection;


class RedisMockTest extends TestCase
{

    public function testRedisConnectionInstance()
    {

        $this->assertInstanceOf(MockPredisConnection::class, Redis::connection());

    }

    public function testSetAndGet()
    {

        Redis::set('key', 'test');
        $this->assertEquals('test', Redis::get('key'));

    }

    public function testPipeline()
    {

        Redis::pipeline(function ($pipe) {
            $pipe->set('key1', 'test1');
            $pipe->set('key2', 'test2');
        });

        $this->assertEquals('test2', Redis::get('key2'));
    }

}




