<?php
/**
 * Created by Josias Montag
 * Date: 03.11.17 20:01
 * Mail: josias@montag.info
 */

namespace Lunaweb\RedisMock;


use Illuminate\Redis\Connectors\PredisConnector;
use Illuminate\Support\Arr;
use M6Web\Component\RedisMock\RedisMockFactory;

class MockPredisConnector extends PredisConnector
{

    /**
     * Create a new clustered Predis connection.
     *
     * @param array $config
     * @param array $options
     *
     * @return \Illuminate\Redis\Connections\PredisConnection
     */
    public function connect(array $config, array $options)
    {
        $formattedOptions = array_merge(
            ['timeout' => 10.0], $options, Arr::pull($config, 'options', [])
        );


        $factory = new RedisMockFactory();
        $redisMockClass = $factory->getAdapter('Predis\Client', true);

        return new MockPredisConnection(new $redisMockClass($config, $formattedOptions));
    }

    /**
     * Create a new clustered Predis connection.
     *
     * @param array $config
     * @param array $clusterOptions
     * @param array $options
     *
     * @return \Illuminate\Redis\Connections\PredisClusterConnection
     */
    public function connectToCluster(array $config, array $clusterOptions, array $options)
    {
        $clusterSpecificOptions = Arr::pull($config, 'options', []);

        $factory = new RedisMockFactory();
        $redisMockClass = $factory->getAdapter('Predis\Client', true);

        return new MockPredisConnection(new $redisMockClass(array_values($config), array_merge(
            $options, $clusterOptions, $clusterSpecificOptions
        )));
    }

}
