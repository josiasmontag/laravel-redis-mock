<?php
/**
 * Created by Josias Montag
 * Date: 03.11.17 19:48
 * Mail: josias@montag.info
 */

namespace Lunaweb\RedisMock\Tests;


use Illuminate\Support\Facades\Redis;
use Lunaweb\RedisMock\MockPredisConnection;
use Orchestra\Testbench\TestCase;

class RedisMockTest extends TestCase
{

    use EnvironmentSetUp;


    public function testMock() {

        $this->assertInstanceOf(MockPredisConnection::class, Redis::connection());
        Redis::set('key', 'test');
        $this->assertEquals('test', Redis::get('key'));

    }

}




