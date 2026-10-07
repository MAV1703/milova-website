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

namespace Tests\YooKassa\Model\Refund;

use Exception;
use Tests\YooKassa\AbstractTestCase;
use YooKassa\Model\Refund\Source;

/**
 * SourceTest
 *
 * @category    ClassTest
 *
 * @author      cms@yoomoney.ru
 *
 * @link        https://yookassa.ru/developers/api
 */
class SourceTest extends AbstractTestCase
{
    protected Source $object;

    protected function getTestInstance(): Source
    {
        return new Source;
    }

    public function test_source_class_exists(): void
    {
        $this->object = $this->getMockBuilder(Source::class)->getMockForAbstractClass();
        $this->assertTrue(class_exists(Source::class));
        $this->assertInstanceOf(Source::class, $this->object);
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
}
