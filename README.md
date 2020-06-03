# Elastic APM Redis Reporter

This library supports the report of traces from the APM Agent to [Redis](https://redis.io/).

## Installation

1) Install via [composer](https://getcomposer.org/)

    ```shell script
    composer require pccomponentes/apm-redis-reporter
    ```

## Usage

### Native PHP

```php
<?php
declare(strict_types=1);

$redisClient = new Predis\Client('tcp://redis:6379?database=0');
$key = 'apm';

$reporter = new PcComponentes\ElasticAPM\Reporter\RedisReporter(
    $redisClient,
    $key
);

$apmTracer = new ZoiloMora\ElasticAPM\ElasticApmTracer(
    // ZoiloMora\ElasticAPM\Configuration\CoreConfiguration::class
    $reporter,
    // ZoiloMora\ElasticAPM\Pool\PoolFactory::class
);

/** ... Use the connection in your project */
```

## License
Licensed under the [MIT license](http://opensource.org/licenses/MIT)

Read [LICENSE](LICENSE) for more information
