<?php
declare(strict_types=1);

namespace PcComponentes\ElasticAPM\Utils;

final class Compressor
{
    public static function zip(string $data): string
    {
        return \gzencode($data, -1, \FORCE_GZIP);
    }

    public static function unzip(string $data): string
    {
        return \gzdecode($data);
    }
}
