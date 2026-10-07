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

namespace Tests\YooKassa\Request\Payments\ConfirmationAttributes;

use Exception;
use Tests\YooKassa\AbstractTestCase;
use YooKassa\Request\Payments\ConfirmationAttributes\ConfirmationAttributesRedirect;
use YooKassa\Validator\Exceptions\InvalidPropertyValueTypeException;

/**
 * ConfirmationAttributesRedirectTest
 *
 * @category    ClassTest
 *
 * @author      cms@yoomoney.ru
 *
 * @link        https://yookassa.ru/developers/api
 */
class ConfirmationAttributesRedirectTest extends AbstractTestCase
{
    protected ConfirmationAttributesRedirect $object;

    protected function getTestInstance(): ConfirmationAttributesRedirect
    {
        return new ConfirmationAttributesRedirect;
    }

    public function test_confirmation_attributes_redirect_class_exists(): void
    {
        $this->object = $this->getMockBuilder(ConfirmationAttributesRedirect::class)->getMockForAbstractClass();
        $this->assertTrue(class_exists(ConfirmationAttributesRedirect::class));
        $this->assertInstanceOf(ConfirmationAttributesRedirect::class, $this->object);
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
        self::assertContains($instance->getType(), ['redirect']);
        self::assertContains($instance->type, ['redirect']);
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
     * Test property "enforce"
     *
     * @dataProvider validEnforceDataProvider
     *
     * @throws Exception
     */
    public function test_enforce(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getEnforce());
        self::assertEmpty($instance->enforce);
        $instance->setEnforce($value);
        self::assertEquals($value, is_array($value) ? $instance->getEnforce()->toArray() : $instance->getEnforce());
        self::assertEquals($value, is_array($value) ? $instance->enforce->toArray() : $instance->enforce);
        if (! empty($value)) {
            self::assertNotNull($instance->getEnforce());
            self::assertNotNull($instance->enforce);
            self::assertIsBool($instance->getEnforce());
            self::assertIsBool($instance->enforce);
            self::assertIsBool($instance->getEnforce());
            self::assertIsBool($instance->enforce);
        }
    }

    /**
     * Test invalid property "enforce"
     *
     * @dataProvider invalidEnforceDataProvider
     */
    public function test_invalid_enforce(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException(InvalidPropertyValueTypeException::class);
        $instance->setEnforce($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validEnforceDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_enforce'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidEnforceDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_enforce'));
    }

    /**
     * Test property "return_url"
     *
     * @dataProvider validReturnUrlDataProvider
     *
     * @throws Exception
     */
    public function test_return_url(mixed $value): void
    {
        $instance = $this->getTestInstance();
        $instance->setReturnUrl($value);
        self::assertNotNull($instance->getReturnUrl());
        self::assertNotNull($instance->return_url);
        self::assertEquals($value, is_array($value) ? $instance->getReturnUrl()->toArray() : $instance->getReturnUrl());
        self::assertEquals($value, is_array($value) ? $instance->return_url->toArray() : $instance->return_url);
        self::assertLessThanOrEqual(2048, is_string($instance->getReturnUrl()) ? mb_strlen($instance->getReturnUrl()) : $instance->getReturnUrl());
        self::assertLessThanOrEqual(2048, is_string($instance->return_url) ? mb_strlen($instance->return_url) : $instance->return_url);
    }

    /**
     * Test invalid property "return_url"
     *
     * @dataProvider invalidReturnUrlDataProvider
     */
    public function test_invalid_return_url(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setReturnUrl($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validReturnUrlDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_return_url'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidReturnUrlDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_return_url'));
    }

    /**
     * Test property "locale"
     *
     * @dataProvider validLocaleDataProvider
     *
     * @throws Exception
     */
    public function test_locale(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getLocale());
        self::assertEmpty($instance->locale);
        $instance->setLocale($value);
        self::assertEquals($value, is_array($value) ? $instance->getLocale()->toArray() : $instance->getLocale());
        self::assertEquals($value, is_array($value) ? $instance->locale->toArray() : $instance->locale);
        if (! empty($value)) {
            self::assertNotNull($instance->getLocale());
            self::assertNotNull($instance->locale);
        }
    }

    /**
     * Test invalid property "locale"
     *
     * @dataProvider invalidLocaleDataProvider
     */
    public function test_invalid_locale(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setLocale($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validLocaleDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_locale'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidLocaleDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_locale'));
    }
}
