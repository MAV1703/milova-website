<?php

namespace Tests\YooKassa\Common;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use stdClass;
use YooKassa\Common\AbstractObject;
use YooKassa\Common\ListObject;
use YooKassa\Helpers\Random;
use YooKassa\Model\Deal\AbstractBaseDeal;
use YooKassa\Request\Payments\Airline;
use YooKassa\Request\Payments\Leg;
use YooKassa\Request\Payments\Passenger;
use YooKassa\Validator\Exceptions\EmptyPropertyValueException;
use YooKassa\Validator\Exceptions\InvalidPropertyValueException;

class ListObjectTest extends TestCase
{
    /**
     * @dataProvider validDataProvider
     */
    public function test_get_set(string $type, mixed $data): void
    {
        $instance = new ListObject($type, $data);

        $this->assertEquals($type, $instance->getType());
        $this->assertCount(is_array($data) ? count($data) : 0, $instance->getItems());
        $this->assertEquals(is_array($data) ? count($data) : 0, $instance->count());

        if (is_array($data) && count($data) > 0) {
            $cnt = count($data);
            $instance->remove(0);
            $this->assertCount($cnt - 1, $instance->getItems());
            $this->assertEquals($cnt - 1, $instance->count());
        }

        $instance = new ListObject($type, $data);

        if (is_array($data) && count($data) > 0) {
            $instance->clear();
            $this->assertCount(0, $instance->getItems());
            $this->assertEquals(0, $instance->count());
        }
    }

    public function test_change_type(): void
    {
        $data = [
            ['first_name' => 'Michail', 'last_name' => 'Sidorov'],
            new Passenger(['first_name' => 'Alex', 'last_name' => 'Lutor']),
        ];

        $instance = new ListObject(Passenger::class);

        $this->assertEquals(Passenger::class, $instance->getType());
        $this->assertCount(0, $instance->getItems());
        $this->assertEquals(0, $instance->count());

        $instance->merge($data);

        $this->assertEquals(Passenger::class, $instance->getType());
        $this->assertCount(count($data), $instance->getItems());
        $this->assertEquals(count($data), $instance->count());

        $this->expectException(InvalidArgumentException::class);
        $instance->setType(Leg::class);

        $this->assertEquals(Passenger::class, $instance->getType());
    }

    public function test_offsets(): void
    {
        $data = [
            ['first_name' => 'Michail', 'last_name' => 'Sidorov'],
            new Passenger(['first_name' => 'Alex', 'last_name' => 'Lutor']),
        ];

        $instance = new ListObject(Passenger::class, $data);

        $this->assertEquals($data[0], $instance->get(0)->toArray());
        $this->assertEquals($data[0], $instance[0]->toArray());

        $this->assertTrue(isset($instance[1]));
        unset($instance[1]);

        $this->assertCount(count($data) - 1, $instance->getItems());
        $this->assertEquals(count($data) - 1, $instance->count());

        $instance[] = ['first_name' => 'Alex', 'last_name' => 'Lutor'];

        $this->assertCount(count($data), $instance->getItems());
        $this->assertEquals(count($data), $instance->count());
    }

    /**
     * @dataProvider invalidDataProvider
     */
    public function test_set_invalid(string $type, mixed $data, string $exception): void
    {
        $this->expectException($exception);
        new ListObject($type, $data);
    }

    public function validDataProvider(): array
    {
        return [
            [
                Airline::class,
                [
                    [
                        'booking_reference' => 'IIIKRV',
                        'ticket_number' => '12342123413',
                        'passengers' => [
                            [
                                'first_name' => 'SERGEI',
                                'last_name' => 'IVANOV',
                            ],
                        ],
                        'legs' => [
                            [
                                'departure_airport' => 'LED',
                                'destination_airport' => 'AMS',
                                'departure_date' => '2023-01-20',
                            ],
                        ],
                    ],
                ],
            ],
            [
                Passenger::class,
                [
                    ['first_name' => 'Michail', 'last_name' => 'Sidorov'],
                    new Passenger(['first_name' => 'Alex', 'last_name' => 'Lutor']),
                ],
            ],
            [
                Passenger::class,
                null,
            ],
        ];
    }

    public function invalidDataProvider(): array
    {
        return [
            [
                Passenger::class,
                [
                    new stdClass,
                ],
                InvalidArgumentException::class,
            ],
            [
                Passenger::class,
                [
                    ['first_name' => null, 'last_name' => 'Sidorov'],
                ],
                EmptyPropertyValueException::class,
            ],
            [
                Passenger::class,
                [
                    ['first_name' => 'Michail', 'last_name' => Random::str(65)],
                ],
                InvalidPropertyValueException::class,
            ],
            [
                AbstractObject::class,
                [
                    [],
                ],
                InvalidArgumentException::class,
            ],
            [
                AbstractBaseDeal::class,
                [
                    [],
                ],
                InvalidArgumentException::class,
            ],
        ];
    }
}
