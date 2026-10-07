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

namespace Tests\YooKassa\Model\SelfEmployed;

use Datetime;
use Exception;
use Tests\YooKassa\AbstractTestCase;
use YooKassa\Model\SelfEmployed\SelfEmployed;

/**
 * SelfEmployedTest
 *
 * @category    ClassTest
 *
 * @author      cms@yoomoney.ru
 *
 * @link        https://yookassa.ru/developers/api
 */
class SelfEmployedTest extends AbstractTestCase
{
    protected SelfEmployed $object;

    protected function getTestInstance(): SelfEmployed
    {
        return new SelfEmployed;
    }

    public function test_self_employed_class_exists(): void
    {
        $this->object = $this->getMockBuilder(SelfEmployed::class)->getMockForAbstractClass();
        $this->assertTrue(class_exists(SelfEmployed::class));
        $this->assertInstanceOf(SelfEmployed::class, $this->object);
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
        self::assertContains($instance->getStatus(), ['pending', 'confirmed', 'canceled', 'unregistered']);
        self::assertContains($instance->status, ['pending', 'confirmed', 'canceled', 'unregistered']);
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
     * Test property "created_at"
     *
     * @dataProvider validCreatedAtDataProvider
     *
     * @throws Exception
     */
    public function test_created_at(mixed $value): void
    {
        $instance = $this->getTestInstance();
        $instance->setCreatedAt($value);
        self::assertNotNull($instance->getCreatedAt());
        self::assertNotNull($instance->created_at);
        if ($value instanceof Datetime) {
            self::assertEquals($value, $instance->getCreatedAt());
            self::assertEquals($value, $instance->created_at);
        } else {
            self::assertEquals(! empty($value) ? new Datetime($value) : $value, $instance->getCreatedAt());
            self::assertEquals(! empty($value) ? new Datetime($value) : $value, $instance->created_at);
        }
    }

    /**
     * Test invalid property "created_at"
     *
     * @dataProvider invalidCreatedAtDataProvider
     */
    public function test_invalid_created_at(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setCreatedAt($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validCreatedAtDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_created_at'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidCreatedAtDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_created_at'));
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
            self::assertMatchesRegularExpression("/^\d{12}$/", $instance->getItn());
            self::assertMatchesRegularExpression("/^\d{12}$/", $instance->itn);
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
     * Test property "phone"
     *
     * @dataProvider validPhoneDataProvider
     *
     * @throws Exception
     */
    public function test_phone(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getPhone());
        self::assertEmpty($instance->phone);
        $instance->setPhone($value);
        self::assertEquals($value, is_array($value) ? $instance->getPhone()->toArray() : $instance->getPhone());
        self::assertEquals($value, is_array($value) ? $instance->phone->toArray() : $instance->phone);
        if (! empty($value)) {
            self::assertNotNull($instance->getPhone());
            self::assertNotNull($instance->phone);
            self::assertMatchesRegularExpression('/^[0-9]{4,15}$/', $instance->getPhone());
            self::assertMatchesRegularExpression('/^[0-9]{4,15}$/', $instance->phone);
        }
    }

    /**
     * Test invalid property "phone"
     *
     * @dataProvider invalidPhoneDataProvider
     */
    public function test_invalid_phone(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setPhone($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validPhoneDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_phone'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidPhoneDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_phone'));
    }

    /**
     * Test property "confirmation"
     *
     * @dataProvider validConfirmationDataProvider
     *
     * @throws Exception
     */
    public function test_confirmation(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getConfirmation());
        self::assertEmpty($instance->confirmation);
        $instance->setConfirmation($value);
        self::assertEquals($value, is_array($value) ? $instance->getConfirmation()->toArray() : $instance->getConfirmation());
        self::assertEquals($value, is_array($value) ? $instance->confirmation->toArray() : $instance->confirmation);
        if (! empty($value)) {
            self::assertNotNull($instance->getConfirmation());
            self::assertNotNull($instance->confirmation);
        }
    }

    /**
     * Test invalid property "confirmation"
     *
     * @dataProvider invalidConfirmationDataProvider
     */
    public function test_invalid_confirmation(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setConfirmation($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validConfirmationDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_confirmation'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidConfirmationDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_confirmation'));
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

        $this->expectException($exceptionClass);
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
}
