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

namespace Tests\YooKassa\Model\Payout;

use Exception;
use Tests\YooKassa\AbstractTestCase;
use YooKassa\Model\Payout\PayoutDestinationBankCardCard;

/**
 * PayoutDestinationBankCardCardTest
 *
 * @category    ClassTest
 *
 * @author      cms@yoomoney.ru
 *
 * @link        https://yookassa.ru/developers/api
 */
class PayoutDestinationBankCardCardTest extends AbstractTestCase
{
    protected PayoutDestinationBankCardCard $object;

    protected function getTestInstance(): PayoutDestinationBankCardCard
    {
        return new PayoutDestinationBankCardCard;
    }

    public function test_payout_destination_bank_card_card_class_exists(): void
    {
        $this->object = $this->getMockBuilder(PayoutDestinationBankCardCard::class)->getMockForAbstractClass();
        $this->assertTrue(class_exists(PayoutDestinationBankCardCard::class));
        $this->assertInstanceOf(PayoutDestinationBankCardCard::class, $this->object);
    }

    /**
     * Test property "first6"
     *
     * @dataProvider validFirst6DataProvider
     *
     * @throws Exception
     */
    public function test_first6(mixed $value): void
    {
        $instance = $this->getTestInstance();
        $instance->setFirst6($value);
        self::assertNotNull($instance->getFirst6());
        self::assertNotNull($instance->first6);
        self::assertEquals($value, is_array($value) ? $instance->getFirst6()->toArray() : $instance->getFirst6());
        self::assertEquals($value, is_array($value) ? $instance->first6->toArray() : $instance->first6);
        self::assertMatchesRegularExpression('/[0-9]{6}/', $instance->getFirst6());
        self::assertMatchesRegularExpression('/[0-9]{6}/', $instance->first6);
    }

    /**
     * Test invalid property "first6"
     *
     * @dataProvider invalidFirst6DataProvider
     */
    public function test_invalid_first6(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setFirst6($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validFirst6DataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_first6'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidFirst6DataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_first6'));
    }

    /**
     * Test property "last4"
     *
     * @dataProvider validLast4DataProvider
     *
     * @throws Exception
     */
    public function test_last4(mixed $value): void
    {
        $instance = $this->getTestInstance();
        $instance->setLast4($value);
        self::assertNotNull($instance->getLast4());
        self::assertNotNull($instance->last4);
        self::assertEquals($value, $instance->getLast4());
        self::assertEquals($value, $instance->last4);
        self::assertMatchesRegularExpression('/[0-9]{4}/', $instance->getLast4());
        self::assertMatchesRegularExpression('/[0-9]{4}/', $instance->last4);
    }

    /**
     * Test invalid property "last4"
     *
     * @dataProvider invalidLast4DataProvider
     */
    public function test_invalid_last4(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setLast4($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validLast4DataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_last4'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidLast4DataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_last4'));
    }

    /**
     * Test property "card_type"
     *
     * @dataProvider validCardTypeDataProvider
     *
     * @throws Exception
     */
    public function test_card_type(mixed $value): void
    {
        $instance = $this->getTestInstance();
        $instance->setCardType($value);
        self::assertNotNull($instance->getCardType());
        self::assertNotNull($instance->card_type);
        self::assertEquals($value, is_array($value) ? $instance->getCardType()->toArray() : $instance->getCardType());
        self::assertEquals($value, is_array($value) ? $instance->card_type->toArray() : $instance->card_type);
    }

    /**
     * Test invalid property "card_type"
     *
     * @dataProvider invalidCardTypeDataProvider
     */
    public function test_invalid_card_type(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setCardType($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validCardTypeDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_card_type'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidCardTypeDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_card_type'));
    }

    /**
     * Test property "issuer_country"
     *
     * @dataProvider validIssuerCountryDataProvider
     *
     * @throws Exception
     */
    public function test_issuer_country(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getIssuerCountry());
        self::assertEmpty($instance->issuer_country);
        $instance->setIssuerCountry($value);
        self::assertEquals($value, is_array($value) ? $instance->getIssuerCountry()->toArray() : $instance->getIssuerCountry());
        self::assertEquals($value, is_array($value) ? $instance->issuer_country->toArray() : $instance->issuer_country);
        if (! empty($value)) {
            self::assertMatchesRegularExpression('/^[A-Z]{2}$/', $instance->getIssuerCountry());
            self::assertMatchesRegularExpression('/^[A-Z]{2}$/', $instance->issuer_country);
        }
    }

    /**
     * Test invalid property "issuer_country"
     *
     * @dataProvider invalidIssuerCountryDataProvider
     */
    public function test_invalid_issuer_country(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setIssuerCountry($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validIssuerCountryDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_issuer_country'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidIssuerCountryDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_issuer_country'));
    }

    /**
     * Test property "issuer_name"
     *
     * @dataProvider validIssuerNameDataProvider
     *
     * @throws Exception
     */
    public function test_issuer_name(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getIssuerName());
        self::assertEmpty($instance->issuer_name);
        $instance->setIssuerName($value);
        self::assertEquals($value, is_array($value) ? $instance->getIssuerName()->toArray() : $instance->getIssuerName());
        self::assertEquals($value, is_array($value) ? $instance->issuer_name->toArray() : $instance->issuer_name);
        if (! empty($value)) {
            self::assertNotNull($instance->getIssuerName());
            self::assertNotNull($instance->issuer_name);
        }
    }

    /**
     * Test invalid property "issuer_name"
     *
     * @dataProvider invalidIssuerNameDataProvider
     */
    public function test_invalid_issuer_name(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setIssuerName($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validIssuerNameDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_issuer_name'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidIssuerNameDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_issuer_name'));
    }
}
