<?php

namespace Tests\YooKassa\Helpers;

use PHPUnit\Framework\TestCase;
use YooKassa\Helpers\StringObject;

/**
 * @internal
 */
class StringObjectTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function test_to_string(string $value): void
    {
        $instance = new StringObject($value);
        self::assertEquals($value, $instance->__toString());
    }

    public static function dataProvider(): array
    {
        return [
            [''],
            ['value'],
        ];
    }
}
