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

namespace Tests\YooKassa\Request\Payments\PaymentData;

use Exception;
use Tests\YooKassa\AbstractTestCase;
use YooKassa\Request\Payments\PaymentData\PaymentDataB2bSberbank;

/**
 * PaymentDataB2bSberbankTest
 *
 * @category    ClassTest
 *
 * @author      cms@yoomoney.ru
 *
 * @link        https://yookassa.ru/developers/api
 */
class PaymentDataB2bSberbankTest extends AbstractTestCase
{
    protected PaymentDataB2bSberbank $object;

    protected function getTestInstance(): PaymentDataB2bSberbank
    {
        return new PaymentDataB2bSberbank;
    }

    public function test_payment_data_b2b_sberbank_class_exists(): void
    {
        $this->object = $this->getMockBuilder(PaymentDataB2bSberbank::class)->getMockForAbstractClass();
        $this->assertTrue(class_exists(PaymentDataB2bSberbank::class));
        $this->assertInstanceOf(PaymentDataB2bSberbank::class, $this->object);
    }

    /**
     * Test property "type"
     *
     * @throws Exception
     */
    public function test_type(): void
    {
        $instance = $this->getTestInstance();
        self::assertNotNull($instance->getType());
        self::assertNotNull($instance->type);
        self::assertContains($instance->getType(), ['b2b_sberbank']);
        self::assertContains($instance->type, ['b2b_sberbank']);
    }

    /**
     * Test property "payment_purpose"
     *
     * @dataProvider validPaymentPurposeDataProvider
     *
     * @throws Exception
     */
    public function test_payment_purpose(mixed $value): void
    {
        $instance = $this->getTestInstance();
        $instance->setPaymentPurpose($value);
        self::assertNotNull($instance->getPaymentPurpose());
        self::assertNotNull($instance->payment_purpose);
        self::assertEquals($value, is_array($value) ? $instance->getPaymentPurpose()->toArray() : $instance->getPaymentPurpose());
        self::assertEquals($value, is_array($value) ? $instance->payment_purpose->toArray() : $instance->payment_purpose);
        self::assertMatchesRegularExpression('/.{1,210}/', $instance->getPaymentPurpose());
        self::assertMatchesRegularExpression('/.{1,210}/', $instance->payment_purpose);
    }

    /**
     * Test invalid property "payment_purpose"
     *
     * @dataProvider invalidPaymentPurposeDataProvider
     */
    public function test_invalid_payment_purpose(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setPaymentPurpose($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validPaymentPurposeDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_payment_purpose'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidPaymentPurposeDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_payment_purpose'));
    }

    /**
     * Test property "vat_data"
     *
     * @dataProvider validVatDataDataProvider
     *
     * @throws Exception
     */
    public function test_vat_data(mixed $value): void
    {
        $instance = $this->getTestInstance();
        $instance->setVatData($value);
        self::assertNotNull($instance->getVatData());
        self::assertNotNull($instance->vat_data);
        self::assertEquals($value, is_array($value) ? $instance->getVatData()->toArray() : $instance->getVatData());
        self::assertEquals($value, is_array($value) ? $instance->vat_data->toArray() : $instance->vat_data);
    }

    /**
     * Test invalid property "vat_data"
     *
     * @dataProvider invalidVatDataDataProvider
     */
    public function test_invalid_vat_data(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setVatData($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validVatDataDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_vat_data'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidVatDataDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_vat_data'));
    }
}
