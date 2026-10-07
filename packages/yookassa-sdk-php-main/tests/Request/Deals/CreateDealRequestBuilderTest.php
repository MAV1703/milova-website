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

namespace Tests\YooKassa\Request\Deals;

use Exception;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use stdClass;
use YooKassa\Helpers\Random;
use YooKassa\Model\Deal\DealType;
use YooKassa\Model\Deal\FeeMoment;
use YooKassa\Model\Deal\SafeDeal;
use YooKassa\Model\Metadata;
use YooKassa\Request\Deals\CreateDealRequestBuilder;

/**
 * CreateDealRequestBuilderTest
 *
 * @category    ClassTest
 *
 * @author      cms@yoomoney.ru
 *
 * @link        https://yookassa.ru/developers/api
 */
class CreateDealRequestBuilderTest extends TestCase
{
    /**
     * @dataProvider validDataProvider
     *
     * @throws Exception
     */
    public function test_set_type(mixed $options): void
    {
        $builder = new CreateDealRequestBuilder;

        $builder->setType($options['type']);
        $instance = $builder->build($this->getRequiredData('type'));

        if ($options['type'] === null || $options['type'] === '') {
            self::assertNull($instance->getType());
        } else {
            self::assertNotNull($instance->getType());
            self::assertEquals($options['type'], $instance->getType());
        }
    }

    /**
     * @dataProvider invalidDescriptionDataProvider
     */
    public function test_set_invalid_type(mixed $options): void
    {
        $this->expectException(InvalidArgumentException::class);
        $builder = new CreateDealRequestBuilder;
        $builder->setType($options);
    }

    /**
     * @dataProvider validDataProvider
     *
     * @throws Exception
     */
    public function test_set_fee_moment(mixed $options): void
    {
        $builder = new CreateDealRequestBuilder;

        $builder->setFeeMoment($options['fee_moment']);
        $instance = $builder->build($this->getRequiredData('fee_moment'));

        if ($options['fee_moment'] === null || $options['fee_moment'] === '') {
            self::assertNull($instance->getFeeMoment());
        } else {
            self::assertNotNull($instance->getFeeMoment());
            self::assertEquals($options['fee_moment'], $instance->getFeeMoment());
        }
    }

    /**
     * @dataProvider invalidDescriptionDataProvider
     */
    public function test_set_invalid_fee_moment(mixed $options): void
    {
        $this->expectException(InvalidArgumentException::class);
        $builder = new CreateDealRequestBuilder;
        $builder->setFeeMoment($options);
    }

    /**
     * @dataProvider validDataProvider
     *
     * @throws Exception
     */
    public function test_set_metadata(mixed $options): void
    {
        $builder = new CreateDealRequestBuilder;

        $instance = $builder->build($this->getRequiredData());
        self::assertNull($instance->getMetadata());

        $builder->setMetadata($options['metadata']);
        $instance = $builder->build($this->getRequiredData());

        if (empty($options['metadata'])) {
            self::assertNull($instance->getMetadata());
        } else {
            self::assertEquals($options['metadata'], $instance->getMetadata()->toArray());
        }
    }

    /**
     * @dataProvider invalidDataProvider
     */
    public function test_set_invalid_metadata(mixed $options): void
    {
        $this->expectException(InvalidArgumentException::class);
        $builder = new CreateDealRequestBuilder;
        $builder->setMetadata($options);
    }

    /**
     * @dataProvider validDataProvider
     *
     * @throws Exception
     */
    public function test_set_description(mixed $options): void
    {
        $builder = new CreateDealRequestBuilder;

        $builder->setDescription($options['description']);
        $instance = $builder->build($this->getRequiredData());

        if (empty($options['description'])) {
            self::assertNull($instance->getDescription());
        } else {
            self::assertEquals($options['description'], $instance->getDescription());
        }
    }

    /**
     * @dataProvider invalidDescriptionDataProvider
     */
    public function test_set_invalid_description(mixed $options): void
    {
        $this->expectException(InvalidArgumentException::class);
        $builder = new CreateDealRequestBuilder;
        $builder->setDescription($options);
    }

    /**
     * @throws Exception
     */
    public function test_set_invalid_length_description(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $builder = new CreateDealRequestBuilder;
        $description = Random::str(SafeDeal::MAX_LENGTH_DESCRIPTION + 1);
        $builder->setDescription($description);
    }

    /**
     * @throws Exception
     */
    public static function validDataProvider(): array
    {
        $result = [
            [
                [
                    'type' => Random::value(DealType::getValidValues()),
                    'fee_moment' => Random::value(FeeMoment::getValidValues()),
                    'description' => null,
                    'metadata' => null,
                ],
            ],
            [
                [
                    'type' => Random::value(DealType::getValidValues()),
                    'fee_moment' => Random::value(FeeMoment::getValidValues()),
                    'description' => Random::str(1, SafeDeal::MAX_LENGTH_DESCRIPTION),
                    'metadata' => [new Metadata],
                ],
            ],
        ];
        for ($i = 0; $i < 10; $i++) {
            $request = [
                'type' => Random::value(DealType::getValidValues()),
                'fee_moment' => Random::value(FeeMoment::getValidValues()),
                'description' => Random::str(1, SafeDeal::MAX_LENGTH_DESCRIPTION),
                'metadata' => [Random::str(1, 30) => Random::str(1, 128)],
            ];
            $result[] = [$request];
        }

        return $result;
    }

    public static function invalidDataProvider(): array
    {
        return [
            [false],
            [true],
            [new stdClass],
            [new SafeDeal],
        ];
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public static function invalidDescriptionDataProvider(): array
    {
        return [
            [Random::str(SafeDeal::MAX_LENGTH_DESCRIPTION + 1)],
        ];
    }

    /**
     * @param  null  $testingProperty
     *
     * @throws Exception
     */
    protected function getRequiredData($testingProperty = null): array
    {
        $result = [];

        if ($testingProperty !== 'type') {
            $result['type'] = Random::value(DealType::getValidValues());
        }

        if ($testingProperty !== 'fee_moment') {
            $result['fee_moment'] = Random::value(FeeMoment::getValidValues());
        }

        return $result;
    }
}
