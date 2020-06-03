<?php
declare(strict_types=1);

namespace PcComponentes\ElasticAPM\Reporter;

use Predis\Client;
use ZoiloMora\ElasticAPM\Reporter\Reporter;

final class RedisReporter implements Reporter
{
    private Client $redis;
    private string $key;

    public function __construct(Client $redis, string $key)
    {
        $this->redis = $redis;
        $this->key = $key;
    }

    public function report(array $events)
    {
        $this->redis->rpush(
            $this->key,
            [
                Compressor::zip(
                    \json_encode($events),
                ),
            ],
        );
    }
}
