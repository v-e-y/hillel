<?php

declare(strict_types=1);

namespace Hillel\Casts;

class ArrayCast
{
    public static function set(array $value)
    {
        return json_encode($value);
    }

    public static function get($value): array
    {
        return json_decode($value, true);
    }
}
