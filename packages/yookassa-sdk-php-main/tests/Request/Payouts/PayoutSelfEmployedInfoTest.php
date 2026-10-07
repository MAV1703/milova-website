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

namespace Tests\YooKassa\Request\Payouts;

use Exception;
use Tests\YooKassa\AbstractTestCase;
use YooKassa\Request\Payouts\PayoutSelfEmployedInfo;

/**
 * PayoutSelfEmployedInfoTest
 *
 * @category    ClassTest
 *
 * @author      cms@yoomoney.ru
 *
 * @link        https://yookassa.ru/developers/api
 */
class PayoutSelfEmployedInfoTest extends AbstractTestCase
{
    protected PayoutSelfEmployedInfo $object;

    protected function getTestInstance(): PayoutSelfEmployedInfo
    {
        return new PayoutSelfEmployedInfo;
    }

    public function test_payout_self_employed_info_class_exists(): void
    {
        $this->object = $this->getMockBuilder(PayoutSelfEmployedInfo::class)->getMockForAbstractClass();
        $this->assertTrue(class_exists(PayoutSelfEmployedInfo::class));
        $this->assertInstanceOf(PayoutSelfEmployedInfo::class, $this->object);
    }

    /**
     * Test property "id"
     *
     * @dataProvider validIdDataProvider
     *
     * @throws Exception
     */
    public function test_id(mixed $value): void
    {
        $instance = $this->getTestInstance();
        $instance->setId($value);
        self::assertNotNull($instance->getId());
        self::assertNotNull($instance->id);
        self::assertEquals($value, is_array($value) ? $instance->getId()->toArray() : $instance->getId());
        self::assertEquals($value, is_array($value) ? $instance->id->toArray() : $instance->id);
        self::assertLessThanOrEqual(50, is_string($instance->getId()) ? mb_strlen($instance->getId()) : $instance->getId());
        self::assertLessThanOrEqual(50, is_string($instance->id) ? mb_strlen($instance->id) : $instance->id);
        self::assertGreaterThanOrEqual(36, is_string($instance->getId()) ? mb_strlen($instance->getId()) : $instance->getId());
        self::assertGreaterThanOrEqual(36, is_string($instance->id) ? mb_strlen($instance->id) : $instance->id);
    }

    /**
     * Test invalid property "id"
     *
     * @dataProvider invalidIdDataProvider
     */
    public function test_invalid_id(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setId($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validIdDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_id'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidIdDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_id'));
    }
}
