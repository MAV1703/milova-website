<?php

namespace Tests\YooKassa\Helpers;

use DateTime;
use Exception;
use PHPUnit\Framework\TestCase;
use stdClass;
use YooKassa\Helpers\StringObject;
use YooKassa\Helpers\TypeCast;

/**
 * @internal
 */
class TypeCastTest extends TestCase
{
    /**
     * @dataProvider canCastToStringDataProvider
     */
    public function test_can_cast_to_string(mixed $value, bool $can): void
    {
        if ($can) {
            self::assertTrue(TypeCast::canCastToString($value));
        } else {
            self::assertFalse(TypeCast::canCastToString($value));
        }
    }

    /**
     * @dataProvider canCastToEnumStringDataProvider
     */
    public function test_can_cast_to_enum_string(mixed $value, bool $can): void
    {
        if ($can) {
            self::assertTrue(TypeCast::canCastToEnumString($value));
        } else {
            self::assertFalse(TypeCast::canCastToEnumString($value));
        }
    }

    /**
     * @dataProvider canCastToDateTimeDataProvider
     */
    public function test_can_cast_to_date_time(mixed $value, bool $can): void
    {
        if ($can) {
            self::assertTrue(TypeCast::canCastToDateTime($value));
        } else {
            self::assertFalse(TypeCast::canCastToDateTime($value));
        }
    }

    /**
     * @dataProvider castToDateTimeDataProvider
     */
    public function test_cast_to_date_time(mixed $value, int $expected, mixed $valid): void
    {
        $instance = TypeCast::castToDateTime($value);
        if ($valid) {
            if ($value instanceof DateTime) {
                self::assertEquals($value->getTimestamp(), $instance->getTimestamp());
                self::assertNotSame($value, $instance);
            } else {
                self::assertEquals($expected, $instance->getTimestamp());
            }
        } else {
            self::assertNull($instance);
        }
    }

    public static function canCastToStringDataProvider(): array
    {
        return [
            ['', true],
            ['test_string', true],
            [0, true],
            [1, true],
            [-1, true],
            [0.0, true],
            [-0.001, true],
            [0.001, true],
            [true, false],
            [false, false],
            [null, false],
            [[], false],
            [new stdClass, false],
            [fopen(__FILE__, 'rb'), false],
            [new StringObject('test'), true],
        ];
    }

    public static function canCastToEnumStringDataProvider(): array
    {
        return [
            ['', false],
            ['test_string', true],
            [0, false],
            [1, false],
            [-1, false],
            [0.0, false],
            [-0.001, false],
            [0.001, false],
            [true, false],
            [false, false],
            [null, false],
            [[], false],
            [new stdClass, false],
            [fopen(__FILE__, 'rb'), false],
            [new StringObject('test'), true],
        ];
    }

    public static function canCastToDateTimeDataProvider(): array
    {
        return [
            ['', false],
            ['test_string', true],
            [0, true],
            [1, true],
            [-1, false],
            [0.0, true],
            [-0.001, false],
            [0.001, true],
            [true, false],
            [false, false],
            [null, false],
            [[], false],
            [new stdClass, false],
            [fopen(__FILE__, 'rb'), false],
            [new StringObject('test'), true],
            [new DateTime, true],
        ];
    }

    /**
     * @throws Exception
     */
    public static function castToDateTimeDataProvider(): array
    {
        $result = [];
        date_default_timezone_set('UTC');
        $time = time();
        $result[] = [$time, $time, true];
        $result[] = [date(YOOKASSA_DATE, $time), $time, true];
        $result[] = [new DateTime(date(YOOKASSA_DATE, $time)), $time, true];
        $result[] = ['3234-new-23', $time, false];
        $result[] = [[], $time, false];

        return $result;
    }
}
