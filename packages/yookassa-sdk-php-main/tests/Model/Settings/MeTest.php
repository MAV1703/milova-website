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

namespace Tests\YooKassa\Model\Settings;

use Exception;
use InvalidArgumentException;
use Tests\YooKassa\AbstractTestCase;
use YooKassa\Model\Settings\Me;
use YooKassa\Validator\Exceptions\InvalidPropertyValueTypeException;

/**
 * MeTest
 *
 * @category    ClassTest
 *
 * @author      cms@yoomoney.ru
 *
 * @link        https://yookassa.ru/developers/api
 */
class MeTest extends AbstractTestCase
{
    protected Me $object;

    protected function getTestInstance(): Me
    {
        return new Me;
    }

    public function test_me_class_exists(): void
    {
        $this->object = $this->getMockBuilder(Me::class)->getMockForAbstractClass();
        $this->assertTrue(class_exists(Me::class));
        $this->assertInstanceOf(Me::class, $this->object);
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
        return [
            [null, InvalidArgumentException::class],
            ['', InvalidArgumentException::class],
        ];
    }

    /**
     * Test property "status"
     *
     * @dataProvider validStatusDataProvider
     *
     * @throws Exception
     */
    public function test_status(mixed $value): void
    {
        $instance = $this->getTestInstance();
        $instance->setStatus($value);
        self::assertNotNull($instance->getStatus());
        self::assertNotNull($instance->status);
        self::assertEquals($value, is_array($value) ? $instance->getStatus()->toArray() : $instance->getStatus());
        self::assertEquals($value, is_array($value) ? $instance->status->toArray() : $instance->status);
        self::assertContains($instance->getStatus(), ['enabled', 'disabled']);
        self::assertContains($instance->status, ['enabled', 'disabled']);
    }

    /**
     * Test invalid property "status"
     *
     * @dataProvider invalidStatusDataProvider
     */
    public function test_invalid_status(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setStatus($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validStatusDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_status'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidStatusDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_status'));
    }

    /**
     * Test property "test"
     *
     * @dataProvider validTestDataProvider
     *
     * @throws Exception
     */
    public function test_test(mixed $value): void
    {
        $instance = $this->getTestInstance();
        $instance->setTest($value);
        self::assertNotNull($instance->getTest());
        self::assertNotNull($instance->test);
        self::assertEquals($value, is_array($value) ? $instance->getTest()->toArray() : $instance->getTest());
        self::assertEquals($value, is_array($value) ? $instance->test->toArray() : $instance->test);
        self::assertIsBool($instance->getTest());
        self::assertIsBool($instance->test);
    }

    /**
     * Test invalid property "test"
     *
     * @dataProvider invalidTestDataProvider
     */
    public function test_invalid_test(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException(InvalidPropertyValueTypeException::class);
        $instance->setTest($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validTestDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_test'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidTestDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_test'));
    }

    /**
     * Test property "fiscalization"
     *
     * @dataProvider validFiscalizationDataProvider
     *
     * @throws Exception
     */
    public function test_fiscalization(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getFiscalization());
        self::assertEmpty($instance->fiscalization);
        $instance->setFiscalization($value);
        self::assertEquals($value, is_array($value) ? $instance->getFiscalization()->toArray() : $instance->getFiscalization());
        self::assertEquals($value, is_array($value) ? $instance->fiscalization->toArray() : $instance->fiscalization);
        if (! empty($value)) {
            self::assertNotNull($instance->getFiscalization());
            self::assertNotNull($instance->fiscalization);
        }
    }

    /**
     * Test invalid property "fiscalization"
     *
     * @dataProvider invalidFiscalizationDataProvider
     */
    public function test_invalid_fiscalization(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setFiscalization($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validFiscalizationDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_fiscalization'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidFiscalizationDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_fiscalization'));
    }

    /**
     * Test property "fiscalization_enabled"
     *
     * @dataProvider validFiscalizationEnabledDataProvider
     *
     * @throws Exception
     */
    public function test_fiscalization_enabled(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getFiscalizationEnabled());
        self::assertEmpty($instance->fiscalization_enabled);
        $instance->setFiscalizationEnabled($value);
        self::assertEquals($value, is_array($value) ? $instance->getFiscalizationEnabled()->toArray() : $instance->getFiscalizationEnabled());
        self::assertEquals($value, is_array($value) ? $instance->fiscalization_enabled->toArray() : $instance->fiscalization_enabled);
        if (! empty($value)) {
            self::assertNotNull($instance->getFiscalizationEnabled());
            self::assertNotNull($instance->fiscalization_enabled);
            self::assertIsBool($instance->getFiscalizationEnabled());
            self::assertIsBool($instance->fiscalization_enabled);
        }
    }

    /**
     * Test invalid property "fiscalization_enabled"
     *
     * @dataProvider invalidFiscalizationEnabledDataProvider
     */
    public function test_invalid_fiscalization_enabled(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException(InvalidPropertyValueTypeException::class);
        $instance->setFiscalizationEnabled($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validFiscalizationEnabledDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_fiscalization_enabled'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidFiscalizationEnabledDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_fiscalization_enabled'));
    }

    /**
     * Test property "payment_methods"
     *
     * @dataProvider validPaymentMethodsDataProvider
     *
     * @throws Exception
     */
    public function test_payment_methods(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getPaymentMethods());
        self::assertEmpty($instance->payment_methods);
        $instance->setPaymentMethods($value);
        if (! empty($value)) {
            self::assertNotNull($instance->getPaymentMethods());
            self::assertNotNull($instance->payment_methods);
            foreach ($value as $key => $element) {
                if (is_array($element) && ! empty($element)) {
                    self::assertEquals($element, $instance->getPaymentMethods()[$key]->toArray());
                    self::assertEquals($element, $instance->payment_methods[$key]->toArray());
                    self::assertIsArray($instance->getPaymentMethods()[$key]->toArray());
                    self::assertIsArray($instance->payment_methods[$key]->toArray());
                }
                if (is_object($element) && ! empty($element)) {
                    self::assertEquals($element, $instance->getPaymentMethods()->get($key));
                    self::assertIsObject($instance->getPaymentMethods()->get($key));
                    self::assertIsObject($instance->payment_methods->get($key));
                }
            }
            self::assertCount(count($value), $instance->getPaymentMethods());
            self::assertCount(count($value), $instance->payment_methods);
        }
    }

    /**
     * Test invalid property "payment_methods"
     *
     * @dataProvider invalidPaymentMethodsDataProvider
     */
    public function test_invalid_payment_methods(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setPaymentMethods($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validPaymentMethodsDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_payment_methods'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidPaymentMethodsDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_payment_methods'));
    }

    /**
     * Test property "itn"
     *
     * @dataProvider validItnDataProvider
     *
     * @throws Exception
     */
    public function test_itn(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getItn());
        self::assertEmpty($instance->itn);
        $instance->setItn($value);
        self::assertEquals($value, is_array($value) ? $instance->getItn()->toArray() : $instance->getItn());
        self::assertEquals($value, is_array($value) ? $instance->itn->toArray() : $instance->itn);
        if (! empty($value)) {
            self::assertNotNull($instance->getItn());
            self::assertNotNull($instance->itn);
        }
    }

    /**
     * Test invalid property "itn"
     *
     * @dataProvider invalidItnDataProvider
     */
    public function test_invalid_itn(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setItn($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validItnDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_itn'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidItnDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_itn'));
    }

    /**
     * Test property "payout_methods"
     *
     * @dataProvider validPayoutMethodsDataProvider
     *
     * @throws Exception
     */
    public function test_payout_methods(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getPayoutMethods());
        self::assertEmpty($instance->payout_methods);
        $instance->setPayoutMethods($value);
        if (! empty($value)) {
            self::assertNotNull($instance->getPayoutMethods());
            self::assertNotNull($instance->payout_methods);
            foreach ($value as $key => $element) {
                if (is_array($element) && ! empty($element)) {
                    self::assertEquals($element, $instance->getPayoutMethods()[$key]->toArray());
                    self::assertEquals($element, $instance->payout_methods[$key]->toArray());
                    self::assertIsArray($instance->getPayoutMethods()[$key]->toArray());
                    self::assertIsArray($instance->payout_methods[$key]->toArray());
                }
                if (is_object($element) && ! empty($element)) {
                    self::assertEquals($element, $instance->getPayoutMethods()->get($key));
                    self::assertIsObject($instance->getPayoutMethods()->get($key));
                    self::assertIsObject($instance->payout_methods->get($key));
                }
            }
            self::assertCount(count($value), $instance->getPayoutMethods());
            self::assertCount(count($value), $instance->payout_methods);
        }
    }

    /**
     * Test invalid property "payout_methods"
     *
     * @dataProvider invalidPayoutMethodsDataProvider
     */
    public function test_invalid_payout_methods(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setPayoutMethods($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validPayoutMethodsDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_payout_methods'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidPayoutMethodsDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_payout_methods'));
    }

    /**
     * Test property "name"
     *
     * @dataProvider validNameDataProvider
     *
     * @throws Exception
     */
    public function test_name(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getName());
        self::assertEmpty($instance->name);
        $instance->setName($value);
        self::assertEquals($value, is_array($value) ? $instance->getName()->toArray() : $instance->getName());
        self::assertEquals($value, is_array($value) ? $instance->name->toArray() : $instance->name);
        if (! empty($value)) {
            self::assertNotNull($instance->getName());
            self::assertNotNull($instance->name);
        }
    }

    /**
     * Test invalid property "name"
     *
     * @dataProvider invalidNameDataProvider
     */
    public function test_invalid_name(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setName($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validNameDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_name'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidNameDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_name'));
    }

    /**
     * Test property "payout_balance"
     *
     * @dataProvider validPayoutBalanceDataProvider
     *
     * @throws Exception
     */
    public function test_payout_balance(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getPayoutBalance());
        self::assertEmpty($instance->payout_balance);
        $instance->setPayoutBalance($value);
        self::assertEquals($value, is_array($value) ? $instance->getPayoutBalance()->toArray() : $instance->getPayoutBalance());
        self::assertEquals($value, is_array($value) ? $instance->payout_balance->toArray() : $instance->payout_balance);
        if (! empty($value)) {
            self::assertNotNull($instance->getPayoutBalance());
            self::assertNotNull($instance->payout_balance);
        }
    }

    /**
     * Test invalid property "payout_balance"
     *
     * @dataProvider invalidPayoutBalanceDataProvider
     */
    public function test_invalid_payout_balance(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setPayoutBalance($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validPayoutBalanceDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_payout_balance'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidPayoutBalanceDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_payout_balance'));
    }
}
