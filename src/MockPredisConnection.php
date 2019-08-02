<?php
/**
 * Created by Josias Montag
 * Date: 03.11.17 20:01
 * Mail: josias@montag.info
 */

namespace Lunaweb\RedisMock;


use Illuminate\Redis\Connections\PredisConnection;

class MockPredisConnection extends PredisConnection
{
    /**
     * Execute commands in a pipeline.
     *
     * @param callable|null $callback
     *
     * @return \Redis|array
     */
    public function pipeline(callable $callback = null)
    {
        $pipeline = $this->client()->pipeline();

        return is_null($callback)
            ? $pipeline
            : tap($pipeline, $callback)->exec();
    }
}
