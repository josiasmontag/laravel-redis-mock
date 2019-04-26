# Laravel Redis Mock


<p align="center">
<a href="https://travis-ci.org/josiasmontag/laravel-redis-mock"><img src="https://travis-ci.org/josiasmontag/laravel-redis-mock.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/josiasmontag/laravel-redis-mock"><img src="https://poser.pugx.org/josiasmontag/laravel-redis-mock/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/josiasmontag/laravel-redis-mock"><img src="https://poser.pugx.org/josiasmontag/laravel-redis-mock/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/josiasmontag/laravel-redis-mock"><img src="https://poser.pugx.org/josiasmontag/laravel-redis-mock/license.svg" alt="License"></a>
</p>


This Laravel package provides a Redis mock for your tests. It depends on [Redis PHP Mock](https://github.com/M6Web/RedisMock).


## Installation & Usage


To get started, use Composer to add the package to your project's dependencies:

    composer require josiasmontag/laravel-redis-mock


This package adds a new `mock` Redis client.

In `config/database.php`, make the Redis client configurable via environment variable:

```php
    'redis' => [

        'client' => env('REDIS_CLIENT', 'predis'),

        ...
        
    ],
```

Now, you can switch to the `mock` client in your `.env.testing`:
```
REDIS_CLIENT=mock
```
Alternatively, you can switch to the mock in your `phpunit.xml`:
```
<env name="REDIS_CLIENT" value="mock"/>
```
Done! Your tests should work without a local redis server running.

