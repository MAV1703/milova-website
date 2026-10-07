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
use YooKassa\Request\Payments\MerchantCustomerBankAccount;

/**
 * MerchantCustomerBankAccountTest
 *
 * @category    ClassTest
 *
 * @author      cms@yoomoney.ru
 *
 * @link        https://yookassa.ru/developers/api
 */
class MerchantCustomerBankAccountTest extends AbstractTestCase
{
    protected MerchantCustomerBankAccount $object;

    protected function getTestInstance(): MerchantCustomerBankAccount
    {
        return new MerchantCustomerBankAccount;
    }

    public function test_merchant_customer_bank_account_class_exists(): void
    {
        $this->object = $this->getMockBuilder(MerchantCustomerBankAccount::class)->getMockForAbstractClass();
        $this->assertTrue(class_exists(MerchantCustomerBankAccount::class));
        $this->assertInstanceOf(MerchantCustomerBankAccount::class, $this->object);
    }

    /**
     * Test property "account_number"
     *
     * @dataProvider validAccountNumberDataProvider
     *
     * @throws Exception
     */
    public function test_account_number(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getAccountNumber());
        self::assertEmpty($instance->account_number);
        $instance->setAccountNumber($value);
        self::assertEquals($value, is_array($value) ? $instance->getAccountNumber()->toArray() : $instance->getAccountNumber());
        self::assertEquals($value, is_array($value) ? $instance->account_number->toArray() : $instance->account_number);
        if (! empty($value)) {
            self::assertNotNull($instance->getAccountNumber());
            self::assertNotNull($instance->account_number);
            self::assertMatchesRegularExpression('/[0-9]{20}/', $instance->getAccountNumber());
            self::assertMatchesRegularExpression('/[0-9]{20}/', $instance->account_number);
        }
    }

    /**
     * Test invalid property "account_number"
     *
     * @dataProvider invalidAccountNumberDataProvider
     */
    public function test_invalid_account_number(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setAccountNumber($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validAccountNumberDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_account_number'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidAccountNumberDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_account_number'));
    }

    /**
     * Test property "bic"
     *
     * @dataProvider validBicDataProvider
     *
     * @throws Exception
     */
    public function test_bic(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getBic());
        self::assertEmpty($instance->bic);
        $instance->setBic($value);
        self::assertEquals($value, is_array($value) ? $instance->getBic()->toArray() : $instance->getBic());
        self::assertEquals($value, is_array($value) ? $instance->bic->toArray() : $instance->bic);
        if (! empty($value)) {
            self::assertNotNull($instance->getBic());
            self::assertNotNull($instance->bic);
            self::assertMatchesRegularExpression('/\\d{9}/', $instance->getBic());
            self::assertMatchesRegularExpression('/\\d{9}/', $instance->bic);
        }
    }

    /**
     * Test invalid property "bic"
     *
     * @dataProvider invalidBicDataProvider
     */
    public function test_invalid_bic(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setBic($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validBicDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_bic'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidBicDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_bic'));
    }
}
