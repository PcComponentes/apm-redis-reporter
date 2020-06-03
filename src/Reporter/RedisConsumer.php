<?php
declare(strict_types=1);

namespace PcComponentes\ElasticAPM\Reporter;

use Predis\Client;

final class RedisConsumer
{
    private Client $redis;
    private string $key;
    private int $timeout;

    public function __construct(Client $redis, string $key, int $timeout = 15)
    {
        $this->redis = $redis;
        $this->key = $key;
        $this->timeout = $timeout;
    }

    public function consumeOneAndRemove(): array
    {
        $items = $this->redis->blpop(
            [
                $this->key,
            ],
            $this->timeout,
        );

        return \json_decode(
            Compressor::unzip($items[1]),
        );
    }
}
