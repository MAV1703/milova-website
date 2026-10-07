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
use YooKassa\Model\Payment\PaymentMethod\PaymentMethodElectronicCertificate;

/**
 * PaymentMethodElectronicCertificateTest
 *
 * @category    ClassTest
 *
 * @author      cms@yoomoney.ru
 *
 * @link        https://yookassa.ru/developers/api
 */
class PaymentMethodElectronicCertificateTest extends AbstractTestCase
{
    protected PaymentMethodElectronicCertificate $object;

    protected function getTestInstance(): PaymentMethodElectronicCertificate
    {
        return new PaymentMethodElectronicCertificate;
    }

    public function test_payment_method_electronic_certificate_class_exists(): void
    {
        $this->object = $this->getMockBuilder(PaymentMethodElectronicCertificate::class)->getMockForAbstractClass();
        $this->assertTrue(class_exists(PaymentMethodElectronicCertificate::class));
        $this->assertInstanceOf(PaymentMethodElectronicCertificate::class, $this->object);
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
        self::assertContains($instance->getType(), ['electronic_certificate']);
        self::assertContains($instance->type, ['electronic_certificate']);
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
     * Test property "card"
     *
     * @dataProvider validCardDataProvider
     *
     * @throws Exception
     */
    public function test_card(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getCard());
        self::assertEmpty($instance->card);
        $instance->setCard($value);
        self::assertEquals($value, is_array($value) ? $instance->getCard()->toArray() : $instance->getCard());
        self::assertEquals($value, is_array($value) ? $instance->card->toArray() : $instance->card);
        if (! empty($value)) {
            self::assertNotNull($instance->getCard());
            self::assertNotNull($instance->card);
        }
    }

    /**
     * Test invalid property "card"
     *
     * @dataProvider invalidCardDataProvider
     */
    public function test_invalid_card(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setCard($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validCardDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_card'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidCardDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_card'));
    }

    /**
     * Test property "electronic_certificate"
     *
     * @dataProvider validElectronicCertificateDataProvider
     *
     * @throws Exception
     */
    public function test_electronic_certificate(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getElectronicCertificate());
        self::assertEmpty($instance->electronic_certificate);
        $instance->setElectronicCertificate($value);
        self::assertEquals($value, is_array($value) ? $instance->getElectronicCertificate()->toArray() : $instance->getElectronicCertificate());
        self::assertEquals($value, is_array($value) ? $instance->electronic_certificate->toArray() : $instance->electronic_certificate);
        if (! empty($value)) {
            self::assertNotNull($instance->getElectronicCertificate());
            self::assertNotNull($instance->electronic_certificate);
        }
    }

    /**
     * Test invalid property "electronic_certificate"
     *
     * @dataProvider invalidElectronicCertificateDataProvider
     */
    public function test_invalid_electronic_certificate(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setElectronicCertificate($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validElectronicCertificateDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_electronic_certificate'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidElectronicCertificateDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_electronic_certificate'));
    }

    /**
     * Test property "articles"
     *
     * @dataProvider validArticlesDataProvider
     *
     * @throws Exception
     */
    public function test_articles(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getArticles());
        self::assertEmpty($instance->articles);
        self::assertIsObject($instance->getArticles());
        self::assertIsObject($instance->articles);
        self::assertCount(0, $instance->getArticles());
        self::assertCount(0, $instance->articles);
        $instance->setArticles($value);
        if (! empty($value)) {
            self::assertNotNull($instance->getArticles());
            self::assertNotNull($instance->articles);
            foreach ($value as $key => $element) {
                if (is_array($element) && ! empty($element)) {
                    self::assertEquals($element, $instance->getArticles()[$key]->toArray());
                    self::assertEquals($element, $instance->articles[$key]->toArray());
                    self::assertIsArray($instance->getArticles()[$key]->toArray());
                    self::assertIsArray($instance->articles[$key]->toArray());
                }
                if (is_object($element) && ! empty($element)) {
                    self::assertEquals($element, $instance->getArticles()->get($key));
                    self::assertIsObject($instance->getArticles()->get($key));
                    self::assertIsObject($instance->articles->get($key));
                    self::assertIsObject($instance->getArticles());
                    self::assertIsObject($instance->articles);
                }
            }
            self::assertCount(count($value), $instance->getArticles());
            self::assertCount(count($value), $instance->articles);
        }
    }

    /**
     * Test invalid property "articles"
     *
     * @dataProvider invalidArticlesDataProvider
     */
    public function test_invalid_articles(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setArticles($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validArticlesDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_articles'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidArticlesDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_articles'));
    }
}
