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

namespace Tests\YooKassa\Model\Deal;

use Exception;
use Tests\YooKassa\AbstractTestCase;
use YooKassa\Model\Deal\SettlementPayoutPayment;

/**
 * SettlementPayoutPaymentTest
 *
 * @category    ClassTest
 *
 * @author      cms@yoomoney.ru
 *
 * @link        https://yookassa.ru/developers/api
 */
class SettlementPayoutPaymentTest extends AbstractTestCase
{
    protected SettlementPayoutPayment $object;

    protected function getTestInstance(): SettlementPayoutPayment
    {
        return new SettlementPayoutPayment;
    }

    public function test_settlement_payout_payment_class_exists(): void
    {
        $this->object = $this->getMockBuilder(SettlementPayoutPayment::class)->getMockForAbstractClass();
        $this->assertTrue(class_exists(SettlementPayoutPayment::class));
        $this->assertInstanceOf(SettlementPayoutPayment::class, $this->object);
    }

    /**
     * Test property "type"
     *
     * @dataProvider validTypeDataProvider
     *
     * @throws Exception
     */
    public function test_type(mixed $value): void
    {
        $instance = $this->getTestInstance();
        $instance->setType($value);
        self::assertNotNull($instance->getType());
        self::assertNotNull($instance->type);
        self::assertEquals($value, is_array($value) ? $instance->getType()->toArray() : $instance->getType());
        self::assertEquals($value, is_array($value) ? $instance->type->toArray() : $instance->type);
    }

    /**
     * Test invalid property "type"
     *
     * @dataProvider invalidTypeDataProvider
     */
    public function test_invalid_type(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setType($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validTypeDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_type'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidTypeDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_type'));
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
}
