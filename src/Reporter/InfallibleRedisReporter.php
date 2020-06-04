<?php
declare(strict_types=1);

namespace PcComponentes\ElasticAPM\Reporter;

final class InfallibleRedisReporter extends RedisReporter
{
    public function report(array $events)
    {
        try {
            parent::report($events);
        } catch (\Throwable $exception) {
            // Nothing
        }
    }
}
