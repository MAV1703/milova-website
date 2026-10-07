<?php

/*
* The MIT License
*
* Copyright (c) 2024 "YooMoney", NBСO LLC
*
* Permission is hereby granted, free of charge, to any person obtaining a copy
* of this software and associated documentation files (the "Software"), to deal
* in the Software without restriction, including without limitation the rights
* to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
* copies of the Software, and to permit persons to whom the Software is
* furnished to do so, subject to the following conditions:
*
* The above copyright notice and this permission notice shall be included in
* all copies or substantial portions of the Software.
*
* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
* IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
* FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
* AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
* LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
* OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
* THE SOFTWARE.
*/

namespace Tests\YooKassa\Request\Payments;

use Datetime;
use Exception;
use Tests\YooKassa\AbstractTestCase;
use YooKassa\Request\Payments\Leg;

/**
 * LegTest
 *
 * @category    ClassTest
 *
 * @author      cms@yoomoney.ru
 *
 * @link        https://yookassa.ru/developers/api
 */
class LegTest extends AbstractTestCase
{
    protected Leg $object;

    protected function getTestInstance(mixed $value = null): Leg
    {
        return new Leg($value);
    }

    public function test_leg_class_exists(): void
    {
        $this->object = $this->getMockBuilder(Leg::class)->getMockForAbstractClass();
        $this->assertTrue(class_exists(Leg::class));
        $this->assertInstanceOf(Leg::class, $this->object);
    }

    /**
     * Test property "departure_airport"
     *
     * @dataProvider validDepartureAirportDataProvider
     *
     * @throws Exception
     */
    public function test_departure_airport(mixed $value): void
    {
        $instance = $this->getTestInstance();
        $instance->setDepartureAirport($value);
        self::assertNotNull($instance->getDepartureAirport());
        self::assertNotNull($instance->departure_airport);
        self::assertEquals($value, is_array($value) ? $instance->getDepartureAirport()->toArray() : $instance->getDepartureAirport());
        self::assertEquals($value, is_array($value) ? $instance->departure_airport->toArray() : $instance->departure_airport);
        self::assertMatchesRegularExpression('/[A-Z]{3}/', $instance->getDepartureAirport());
        self::assertMatchesRegularExpression('/[A-Z]{3}/', $instance->departure_airport);
        self::assertLessThanOrEqual(3, is_string($instance->getDepartureAirport()) ? mb_strlen($instance->getDepartureAirport()) : $instance->getDepartureAirport());
        self::assertLessThanOrEqual(3, is_string($instance->departure_airport) ? mb_strlen($instance->departure_airport) : $instance->departure_airport);
        self::assertGreaterThanOrEqual(3, is_string($instance->getDepartureAirport()) ? mb_strlen($instance->getDepartureAirport()) : $instance->getDepartureAirport());
        self::assertGreaterThanOrEqual(3, is_string($instance->departure_airport) ? mb_strlen($instance->departure_airport) : $instance->departure_airport);
    }

    /**
     * Test invalid property "departure_airport"
     *
     * @dataProvider invalidDepartureAirportDataProvider
     */
    public function test_invalid_departure_airport(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setDepartureAirport($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validDepartureAirportDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_departure_airport'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidDepartureAirportDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_departure_airport'));
    }

    /**
     * Test property "destination_airport"
     *
     * @dataProvider validDestinationAirportDataProvider
     *
     * @throws Exception
     */
    public function test_destination_airport(mixed $value): void
    {
        $instance = $this->getTestInstance();
        $instance->setDestinationAirport($value);
        self::assertNotNull($instance->getDestinationAirport());
        self::assertNotNull($instance->destination_airport);
        self::assertEquals($value, is_array($value) ? $instance->getDestinationAirport()->toArray() : $instance->getDestinationAirport());
        self::assertEquals($value, is_array($value) ? $instance->destination_airport->toArray() : $instance->destination_airport);
        self::assertMatchesRegularExpression('/[A-Z]{3}/', $instance->getDestinationAirport());
        self::assertMatchesRegularExpression('/[A-Z]{3}/', $instance->destination_airport);
        self::assertLessThanOrEqual(3, is_string($instance->getDestinationAirport()) ? mb_strlen($instance->getDestinationAirport()) : $instance->getDestinationAirport());
        self::assertLessThanOrEqual(3, is_string($instance->destination_airport) ? mb_strlen($instance->destination_airport) : $instance->destination_airport);
        self::assertGreaterThanOrEqual(3, is_string($instance->getDestinationAirport()) ? mb_strlen($instance->getDestinationAirport()) : $instance->getDestinationAirport());
        self::assertGreaterThanOrEqual(3, is_string($instance->destination_airport) ? mb_strlen($instance->destination_airport) : $instance->destination_airport);
    }

    /**
     * Test invalid property "destination_airport"
     *
     * @dataProvider invalidDestinationAirportDataProvider
     */
    public function test_invalid_destination_airport(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setDestinationAirport($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validDestinationAirportDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_destination_airport'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidDestinationAirportDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_destination_airport'));
    }

    /**
     * Test property "departure_date"
     *
     * @dataProvider validDepartureDateDataProvider
     *
     * @throws Exception
     */
    public function test_departure_date(mixed $value): void
    {
        $instance = $this->getTestInstance();
        $instance->setDepartureDate($value);
        self::assertNotNull($instance->getDepartureDate());
        self::assertNotNull($instance->departure_date);
        if ($value instanceof Datetime) {
            self::assertEquals($value, $instance->getDepartureDate());
            self::assertEquals($value, $instance->departure_date);
        } else {
            self::assertEquals(new Datetime($value), $instance->getDepartureDate());
            self::assertEquals(new Datetime($value), $instance->departure_date);
        }
    }

    /**
     * Test invalid property "departure_date"
     *
     * @dataProvider invalidDepartureDateDataProvider
     */
    public function test_invalid_departure_date(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setDepartureDate($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validDepartureDateDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_departure_date'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidDepartureDateDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_departure_date'));
    }

    /**
     * Test property "carrier_code"
     *
     * @dataProvider validCarrierCodeDataProvider
     *
     * @throws Exception
     */
    public function test_carrier_code(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getCarrierCode());
        self::assertEmpty($instance->carrier_code);
        $instance->setCarrierCode($value);
        self::assertEquals($value, is_array($value) ? $instance->getCarrierCode()->toArray() : $instance->getCarrierCode());
        self::assertEquals($value, is_array($value) ? $instance->carrier_code->toArray() : $instance->carrier_code);
        if (! empty($value)) {
            self::assertNotNull($instance->getCarrierCode());
            self::assertNotNull($instance->carrier_code);
            self::assertLessThanOrEqual(3, is_string($instance->getCarrierCode()) ? mb_strlen($instance->getCarrierCode()) : $instance->getCarrierCode());
            self::assertLessThanOrEqual(3, is_string($instance->carrier_code) ? mb_strlen($instance->carrier_code) : $instance->carrier_code);
            self::assertGreaterThanOrEqual(2, is_string($instance->getCarrierCode()) ? mb_strlen($instance->getCarrierCode()) : $instance->getCarrierCode());
            self::assertGreaterThanOrEqual(2, is_string($instance->carrier_code) ? mb_strlen($instance->carrier_code) : $instance->carrier_code);
        }
    }

    /**
     * Test invalid property "carrier_code"
     *
     * @dataProvider invalidCarrierCodeDataProvider
     */
    public function test_invalid_carrier_code(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setCarrierCode($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validCarrierCodeDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_carrier_code'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidCarrierCodeDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_carrier_code'));
    }

    /**
     * Test valid method "jsonSerialize"
     *
     * @dataProvider validClassDataProvider
     */
    public function test_json_serialize(mixed $value): void
    {
        $instance = $this->getTestInstance($value);
        self::assertEquals($value, $instance->jsonSerialize());
    }

    /**
     * @throws Exception
     */
    public function validClassDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return [$this->getValidDataProviderByClass($instance)];
    }
}
