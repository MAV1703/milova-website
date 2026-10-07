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

namespace Tests\YooKassa\Model\Payment\PaymentMethod;

use Exception;
use Tests\YooKassa\AbstractTestCase;
use YooKassa\Model\Payment\PaymentMethod\PaymentMethodSbp;

/**
 * PaymentMethodSbpTest
 *
 * @category    ClassTest
 *
 * @author      cms@yoomoney.ru
 *
 * @link        https://yookassa.ru/developers/api
 */
class PaymentMethodSbpTest extends AbstractTestCase
{
    protected PaymentMethodSbp $object;

    protected function getTestInstance(): PaymentMethodSbp
    {
        return new PaymentMethodSbp;
    }

    public function test_payment_method_sbp_class_exists(): void
    {
        $this->object = $this->getMockBuilder(PaymentMethodSbp::class)->getMockForAbstractClass();
        $this->assertTrue(class_exists(PaymentMethodSbp::class));
        $this->assertInstanceOf(PaymentMethodSbp::class, $this->object);
    }

    /**
     * Test property "type"
     *
     * @throws Exception
     */
    public function test_type(): void
    {
        $instance = $this->getTestInstance();
        self::assertContains($instance->getType(), ['sbp']);
        self::assertContains($instance->type, ['sbp']);
        self::assertNotNull($instance->getType());
        self::assertNotNull($instance->type);
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
    public function invalidTypeDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_type'));
    }

    /**
     * Test property "sbp_operation_id"
     *
     * @dataProvider validSbpOperationIdDataProvider
     *
     * @throws Exception
     */
    public function test_sbp_operation_id(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getSbpOperationId());
        self::assertEmpty($instance->sbp_operation_id);
        $instance->setSbpOperationId($value);
        self::assertEquals($value, $instance->getSbpOperationId());
        self::assertEquals($value, $instance->sbp_operation_id);
        if (! empty($value)) {
            self::assertNotNull($instance->getSbpOperationId());
            self::assertNotNull($instance->sbp_operation_id);
        }
    }

    /**
     * Test invalid property "sbp_operation_id"
     *
     * @dataProvider invalidSbpOperationIdDataProvider
     */
    public function test_invalid_sbp_operation_id(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setSbpOperationId($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validSbpOperationIdDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_sbp_operation_id'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidSbpOperationIdDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_sbp_operation_id'));
    }

    /**
     * Test property "payer_bank_details"
     *
     * @dataProvider validPayerBankDetailsDataProvider
     *
     * @throws Exception
     */
    public function test_payer_bank_details(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getPayerBankDetails());
        self::assertEmpty($instance->payer_bank_details);
        $instance->setPayerBankDetails($value);
        self::assertEquals($value, is_array($value) ? $instance->getPayerBankDetails()->toArray() : $instance->getPayerBankDetails());
        self::assertEquals($value, is_array($value) ? $instance->payer_bank_details->toArray() : $instance->payer_bank_details);
        if (! empty($value)) {
            self::assertNotNull($instance->getPayerBankDetails());
            self::assertNotNull($instance->payer_bank_details);
        }
    }

    /**
     * Test invalid property "payer_bank_details"
     *
     * @dataProvider invalidPayerBankDetailsDataProvider
     */
    public function test_invalid_payer_bank_details(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setPayerBankDetails($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validPayerBankDetailsDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_payer_bank_details'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidPayerBankDetailsDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_payer_bank_details'));
    }
}
