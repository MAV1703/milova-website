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

namespace Tests\YooKassa\Model\Payment;

use Exception;
use Tests\YooKassa\AbstractTestCase;
use YooKassa\Model\Payment\ThreeDSecure;

/**
 * ThreeDSecureTest
 *
 * @category    ClassTest
 *
 * @author      cms@yoomoney.ru
 *
 * @link        https://yookassa.ru/developers/api
 */
class ThreeDSecureTest extends AbstractTestCase
{
    protected ThreeDSecure $object;

    protected function getTestInstance(): ThreeDSecure
    {
        return new ThreeDSecure;
    }

    public function test_three_d_secure_class_exists(): void
    {
        $this->object = $this->getMockBuilder(ThreeDSecure::class)->getMockForAbstractClass();
        $this->assertTrue(class_exists(ThreeDSecure::class));
        $this->assertInstanceOf(ThreeDSecure::class, $this->object);
    }

    /**
     * Test property "applied"
     *
     * @dataProvider validAppliedDataProvider
     *
     * @throws Exception
     */
    public function test_applied(mixed $value): void
    {
        $instance = $this->getTestInstance();
        $instance->setApplied($value);
        self::assertNotNull($instance->getApplied());
        self::assertNotNull($instance->applied);
        self::assertEquals($value, is_array($value) ? $instance->getApplied()->toArray() : $instance->getApplied());
        self::assertEquals($value, is_array($value) ? $instance->applied->toArray() : $instance->applied);
        self::assertIsBool($instance->getApplied());
        self::assertIsBool($instance->applied);
    }

    /**
     * Test invalid property "applied"
     *
     * @dataProvider invalidAppliedDataProvider
     */
    public function test_invalid_applied(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setApplied($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validAppliedDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_applied'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidAppliedDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_applied'));
    }
}
