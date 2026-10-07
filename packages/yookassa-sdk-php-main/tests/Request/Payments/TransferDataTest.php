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

use Exception;
use Tests\YooKassa\AbstractTestCase;
use YooKassa\Model\Metadata;
use YooKassa\Request\Payments\TransferData;

/**
 * TransferDataTest
 *
 * @category    ClassTest
 *
 * @author      cms@yoomoney.ru
 *
 * @link        https://yookassa.ru/developers/api
 */
class TransferDataTest extends AbstractTestCase
{
    protected TransferData $object;

    protected function getTestInstance(): TransferData
    {
        return new TransferData;
    }

    public function test_transfer_data_class_exists(): void
    {
        $this->object = $this->getMockBuilder(TransferData::class)->getMockForAbstractClass();
        $this->assertTrue(class_exists(TransferData::class));
        $this->assertInstanceOf(TransferData::class, $this->object);
    }

    /**
     * Test property "account_id"
     *
     * @dataProvider validAccountIdDataProvider
     *
     * @throws Exception
     */
    public function test_account_id(mixed $value): void
    {
        $instance = $this->getTestInstance();
        $instance->setAccountId($value);
        self::assertNotNull($instance->getAccountId());
        self::assertNotNull($instance->account_id);
        self::assertTrue($instance->hasAccountId());
        self::assertEquals($value, is_array($value) ? $instance->getAccountId()->toArray() : $instance->getAccountId());
        self::assertEquals($value, is_array($value) ? $instance->account_id->toArray() : $instance->account_id);
    }

    /**
     * Test invalid property "account_id"
     *
     * @dataProvider invalidAccountIdDataProvider
     */
    public function test_invalid_account_id(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setAccountId($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validAccountIdDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_account_id'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidAccountIdDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_account_id'));
    }

    /**
     * Test property "amount"
     *
     * @dataProvider validAmountDataProvider
     *
     * @throws Exception
     */
    public function test_amount(mixed $value): void
    {
        $instance = $this->getTestInstance();
        $instance->setAmount($value);
        self::assertNotNull($instance->getAmount());
        self::assertNotNull($instance->amount);
        self::assertTrue($instance->hasAmount());
        self::assertEquals($value, is_array($value) ? $instance->getAmount()->toArray() : $instance->getAmount());
        self::assertEquals($value, is_array($value) ? $instance->amount->toArray() : $instance->amount);
    }

    /**
     * Test invalid property "amount"
     *
     * @dataProvider invalidAmountDataProvider
     */
    public function test_invalid_amount(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setAmount($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validAmountDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_amount'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidAmountDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_amount'));
    }

    /**
     * Test property "platform_fee_amount"
     *
     * @dataProvider validPlatformFeeAmountDataProvider
     *
     * @throws Exception
     */
    public function test_platform_fee_amount(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getPlatformFeeAmount());
        self::assertEmpty($instance->platform_fee_amount);
        $instance->setPlatformFeeAmount($value);
        self::assertEquals($value, is_array($value) ? $instance->getPlatformFeeAmount()->toArray() : $instance->getPlatformFeeAmount());
        self::assertEquals($value, is_array($value) ? $instance->platform_fee_amount->toArray() : $instance->platform_fee_amount);
        if (! empty($value)) {
            self::assertTrue($instance->hasPlatformFeeAmount());
            self::assertNotNull($instance->getPlatformFeeAmount());
            self::assertNotNull($instance->platform_fee_amount);
        }
    }

    /**
     * Test invalid property "platform_fee_amount"
     *
     * @dataProvider invalidPlatformFeeAmountDataProvider
     */
    public function test_invalid_platform_fee_amount(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setPlatformFeeAmount($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validPlatformFeeAmountDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_platform_fee_amount'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidPlatformFeeAmountDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_platform_fee_amount'));
    }

    /**
     * Test property "description"
     *
     * @dataProvider validDescriptionDataProvider
     *
     * @throws Exception
     */
    public function test_description(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getDescription());
        self::assertEmpty($instance->description);
        $instance->setDescription($value);
        self::assertEquals($value, is_array($value) ? $instance->getDescription()->toArray() : $instance->getDescription());
        self::assertEquals($value, is_array($value) ? $instance->description->toArray() : $instance->description);
        if (! empty($value)) {
            self::assertTrue($instance->hasDescription());
            self::assertNotNull($instance->getDescription());
            self::assertNotNull($instance->description);
            self::assertLessThanOrEqual(128, is_string($instance->getDescription()) ? mb_strlen($instance->getDescription()) : $instance->getDescription());
            self::assertLessThanOrEqual(128, is_string($instance->description) ? mb_strlen($instance->description) : $instance->description);
        }
    }

    /**
     * Test invalid property "description"
     *
     * @dataProvider invalidDescriptionDataProvider
     */
    public function test_invalid_description(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setDescription($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validDescriptionDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_description'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidDescriptionDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_description'));
    }

    /**
     * Test property "metadata"
     *
     * @dataProvider validMetadataDataProvider
     *
     * @throws Exception
     */
    public function test_metadata(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getMetadata());
        self::assertEmpty($instance->metadata);
        $instance->setMetadata($value);
        if (! empty($value)) {
            self::assertTrue($instance->hasMetadata());
            self::assertNotNull($instance->getMetadata());
            self::assertNotNull($instance->metadata);
            foreach ($value as $key => $element) {
                if (! empty($element)) {
                    self::assertEquals($element, $instance->getMetadata()[$key]);
                    self::assertEquals($element, $instance->metadata[$key]);
                    self::assertIsObject($instance->getMetadata());
                    self::assertIsObject($instance->metadata);
                }
            }
            self::assertCount(count($value), $instance->getMetadata());
            self::assertCount(count($value), $instance->metadata);
            if ($instance->getMetadata() instanceof Metadata) {
                self::assertEquals($value, $instance->getMetadata()->toArray());
                self::assertEquals($value, $instance->metadata->toArray());
                self::assertCount(count($value), $instance->getMetadata());
                self::assertCount(count($value), $instance->metadata);
            }
        }
    }

    /**
     * Test invalid property "metadata"
     *
     * @dataProvider invalidMetadataDataProvider
     */
    public function test_invalid_metadata(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setMetadata($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validMetadataDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_metadata'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidMetadataDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_metadata'));
    }
}
