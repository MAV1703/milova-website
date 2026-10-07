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

namespace Tests\YooKassa\Model\Receipt;

use Exception;
use Tests\YooKassa\AbstractTestCase;
use YooKassa\Model\Receipt\AdditionalUserProps;

/**
 * AdditionalUserPropsTest
 *
 * @category    ClassTest
 *
 * @author      cms@yoomoney.ru
 *
 * @link        https://yookassa.ru/developers/api
 */
class AdditionalUserPropsTest extends AbstractTestCase
{
    protected AdditionalUserProps $object;

    protected function getTestInstance(): AdditionalUserProps
    {
        return new AdditionalUserProps;
    }

    public function test_additional_user_props_class_exists(): void
    {
        $this->object = $this->getMockBuilder(AdditionalUserProps::class)->getMockForAbstractClass();
        $this->assertTrue(class_exists(AdditionalUserProps::class));
        $this->assertInstanceOf(AdditionalUserProps::class, $this->object);
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
        $instance->setName($value);
        self::assertNotNull($instance->getName());
        self::assertNotNull($instance->name);
        self::assertEquals($value, is_array($value) ? $instance->getName()->toArray() : $instance->getName());
        self::assertEquals($value, is_array($value) ? $instance->name->toArray() : $instance->name);
        self::assertLessThanOrEqual(64, is_string($instance->getName()) ? mb_strlen($instance->getName()) : $instance->getName());
        self::assertLessThanOrEqual(64, is_string($instance->name) ? mb_strlen($instance->name) : $instance->name);
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
     * Test property "value"
     *
     * @dataProvider validValueDataProvider
     *
     * @throws Exception
     */
    public function test_value(mixed $value): void
    {
        $instance = $this->getTestInstance();
        $instance->setValue($value);
        self::assertNotNull($instance->getValue());
        self::assertNotNull($instance->value);
        self::assertEquals($value, is_array($value) ? $instance->getValue()->toArray() : $instance->getValue());
        self::assertEquals($value, is_array($value) ? $instance->value->toArray() : $instance->value);
        self::assertLessThanOrEqual(234, is_string($instance->getValue()) ? mb_strlen($instance->getValue()) : $instance->getValue());
        self::assertLessThanOrEqual(234, is_string($instance->value) ? mb_strlen($instance->value) : $instance->value);
    }

    /**
     * Test invalid property "value"
     *
     * @dataProvider invalidValueDataProvider
     */
    public function test_invalid_value(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setValue($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validValueDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_value'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidValueDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_value'));
    }
}
