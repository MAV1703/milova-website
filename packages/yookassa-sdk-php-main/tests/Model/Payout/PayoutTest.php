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

use Datetime;
use Exception;
use Tests\YooKassa\AbstractTestCase;
use YooKassa\Model\Metadata;
use YooKassa\Model\Payout\Payout;

/**
 * PayoutTest
 *
 * @category    ClassTest
 *
 * @author      cms@yoomoney.ru
 *
 * @link        https://yookassa.ru/developers/api
 */
class PayoutTest extends AbstractTestCase
{
    protected Payout $object;

    protected function getTestInstance(): Payout
    {
        return new Payout;
    }

    public function test_payout_class_exists(): void
    {
        $this->object = $this->getMockBuilder(Payout::class)->getMockForAbstractClass();
        $this->assertTrue(class_exists(Payout::class));
        $this->assertInstanceOf(Payout::class, $this->object);
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
     * Test property "amount"
     *
     * @dataProvider validAmountDataProvider
     *
     * @throws Exception
     */
    public function test_amount(mixed $value): void
    {
        $instance = $this->getTestInstance();
        $instance->setAmount($value);
        self::assertNotNull($instance->getAmount());
        self::assertNotNull($instance->amount);
        self::assertEquals($value, is_array($value) ? $instance->getAmount()->toArray() : $instance->getAmount());
        self::assertEquals($value, is_array($value) ? $instance->amount->toArray() : $instance->amount);
    }

    /**
     * Test invalid property "amount"
     *
     * @dataProvider invalidAmountDataProvider
     */
    public function test_invalid_amount(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setAmount($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validAmountDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_amount'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidAmountDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_amount'));
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
     * Test property "payout_destination"
     *
     * @dataProvider validPayoutDestinationDataProvider
     *
     * @throws Exception
     */
    public function test_payout_destination(mixed $value): void
    {
        $instance = $this->getTestInstance();
        $instance->setPayoutDestination($value);
        self::assertNotNull($instance->getPayoutDestination());
        self::assertNotNull($instance->payout_destination);
        self::assertEquals($value, is_array($value) ? $instance->getPayoutDestination()->toArray() : $instance->getPayoutDestination());
        self::assertEquals($value, is_array($value) ? $instance->payout_destination->toArray() : $instance->payout_destination);
    }

    /**
     * Test invalid property "payout_destination"
     *
     * @dataProvider invalidPayoutDestinationDataProvider
     */
    public function test_invalid_payout_destination(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setPayoutDestination($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validPayoutDestinationDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_payout_destination'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidPayoutDestinationDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_payout_destination'));
    }

    /**
     * Test property "description"
     *
     * @dataProvider validDescriptionDataProvider
     *
     * @throws Exception
     */
    public function test_description(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getDescription());
        self::assertEmpty($instance->description);
        $instance->setDescription($value);
        self::assertEquals($value, is_array($value) ? $instance->getDescription()->toArray() : $instance->getDescription());
        self::assertEquals($value, is_array($value) ? $instance->description->toArray() : $instance->description);
        if (! empty($value)) {
            self::assertNotNull($instance->getDescription());
            self::assertNotNull($instance->description);
            self::assertLessThanOrEqual(128, is_string($instance->getDescription()) ? mb_strlen($instance->getDescription()) : $instance->getDescription());
            self::assertLessThanOrEqual(128, is_string($instance->description) ? mb_strlen($instance->description) : $instance->description);
        }
    }

    /**
     * Test invalid property "description"
     *
     * @dataProvider invalidDescriptionDataProvider
     */
    public function test_invalid_description(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setDescription($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validDescriptionDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_description'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidDescriptionDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_description'));
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
            self::assertEquals(new Datetime($value), $instance->getCreatedAt());
            self::assertEquals(new Datetime($value), $instance->created_at);
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
     * Test property "deal"
     *
     * @dataProvider validDealDataProvider
     *
     * @throws Exception
     */
    public function test_deal(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getDeal());
        self::assertEmpty($instance->deal);
        $instance->setDeal($value);
        self::assertEquals($value, is_array($value) ? $instance->getDeal()->toArray() : $instance->getDeal());
        self::assertEquals($value, is_array($value) ? $instance->deal->toArray() : $instance->deal);
        if (! empty($value)) {
            self::assertNotNull($instance->getDeal());
            self::assertNotNull($instance->deal);
        }
    }

    /**
     * Test invalid property "deal"
     *
     * @dataProvider invalidDealDataProvider
     */
    public function test_invalid_deal(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setDeal($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validDealDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_deal'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidDealDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_deal'));
    }

    /**
     * Test property "self_employed"
     *
     * @dataProvider validSelfEmployedDataProvider
     *
     * @throws Exception
     */
    public function test_self_employed(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getSelfEmployed());
        self::assertEmpty($instance->self_employed);
        $instance->setSelfEmployed($value);
        self::assertEquals($value, is_array($value) ? $instance->getSelfEmployed()->toArray() : $instance->getSelfEmployed());
        self::assertEquals($value, is_array($value) ? $instance->self_employed->toArray() : $instance->self_employed);
        if (! empty($value)) {
            self::assertNotNull($instance->getSelfEmployed());
            self::assertNotNull($instance->self_employed);
        }
    }

    /**
     * Test invalid property "self_employed"
     *
     * @dataProvider invalidSelfEmployedDataProvider
     */
    public function test_invalid_self_employed(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setSelfEmployed($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validSelfEmployedDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_self_employed'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidSelfEmployedDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_self_employed'));
    }

    /**
     * Test property "receipt"
     *
     * @dataProvider validReceiptDataProvider
     *
     * @throws Exception
     */
    public function test_receipt(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getReceipt());
        self::assertEmpty($instance->receipt);
        $instance->setReceipt($value);
        self::assertEquals($value, is_array($value) ? $instance->getReceipt()->toArray() : $instance->getReceipt());
        self::assertEquals($value, is_array($value) ? $instance->receipt->toArray() : $instance->receipt);
        if (! empty($value)) {
            self::assertNotNull($instance->getReceipt());
            self::assertNotNull($instance->receipt);
        }
    }

    /**
     * Test invalid property "receipt"
     *
     * @dataProvider invalidReceiptDataProvider
     */
    public function test_invalid_receipt(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setReceipt($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validReceiptDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_receipt'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidReceiptDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_receipt'));
    }

    /**
     * Test property "cancellation_details"
     *
     * @dataProvider validCancellationDetailsDataProvider
     *
     * @throws Exception
     */
    public function test_cancellation_details(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getCancellationDetails());
        self::assertEmpty($instance->cancellation_details);
        $instance->setCancellationDetails($value);
        self::assertEquals($value, is_array($value) ? $instance->getCancellationDetails()->toArray() : $instance->getCancellationDetails());
        self::assertEquals($value, is_array($value) ? $instance->cancellation_details->toArray() : $instance->cancellation_details);
        if (! empty($value)) {
            self::assertNotNull($instance->getCancellationDetails());
            self::assertNotNull($instance->cancellation_details);
        }
    }

    /**
     * Test invalid property "cancellation_details"
     *
     * @dataProvider invalidCancellationDetailsDataProvider
     */
    public function test_invalid_cancellation_details(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setCancellationDetails($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validCancellationDetailsDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_cancellation_details'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidCancellationDetailsDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_cancellation_details'));
    }

    /**
     * Test property "metadata"
     *
     * @dataProvider validMetadataDataProvider
     *
     * @throws Exception
     */
    public function test_metadata(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getMetadata());
        self::assertEmpty($instance->metadata);
        $instance->setMetadata($value);
        if (! empty($value)) {
            self::assertNotNull($instance->getMetadata());
            self::assertNotNull($instance->metadata);
            foreach ($value as $key => $element) {
                if (! empty($element)) {
                    self::assertEquals($element, $instance->getMetadata()[$key]);
                    self::assertEquals($element, $instance->metadata[$key]);
                    self::assertIsObject($instance->getMetadata());
                    self::assertIsObject($instance->metadata);
                }
            }
            self::assertCount(count($value), $instance->getMetadata());
            self::assertCount(count($value), $instance->metadata);
            if ($instance->getMetadata() instanceof Metadata) {
                self::assertEquals($value, $instance->getMetadata()->toArray());
                self::assertEquals($value, $instance->metadata->toArray());
                self::assertCount(count($value), $instance->getMetadata());
                self::assertCount(count($value), $instance->metadata);
            }
        }
    }

    /**
     * Test invalid property "metadata"
     *
     * @dataProvider invalidMetadataDataProvider
     */
    public function test_invalid_metadata(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setMetadata($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validMetadataDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_metadata'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidMetadataDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_metadata'));
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
