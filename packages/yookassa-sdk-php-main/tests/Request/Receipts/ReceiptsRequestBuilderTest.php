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

namespace Tests\YooKassa\Request\Receipts;

use PHPUnit\Framework\TestCase;
use YooKassa\Helpers\Random;
use YooKassa\Model\Payment\ReceiptRegistrationStatus;
use YooKassa\Model\Refund\RefundStatus;
use YooKassa\Request\Receipts\ReceiptsRequest;
use YooKassa\Request\Receipts\ReceiptsRequestBuilder;

/**
 * ReceiptsRequestBuilderTest
 *
 * @category    ClassTest
 *
 * @author      cms@yoomoney.ru
 *
 * @link        https://yookassa.ru/developers/api
 */
class ReceiptsRequestBuilderTest extends TestCase
{
    /**
     * @dataProvider validDataProvider
     */
    public function test_set_refund_id(mixed $value): void
    {
        $builder = new ReceiptsRequestBuilder;
        $builder->setRefundId($value['refundId']);
        $instance = $builder->build();
        if (empty($value)) {
            self::assertFalse($instance->hasRefundId());
        } else {
            self::assertTrue($instance->hasRefundId());
            self::assertInstanceOf(ReceiptsRequest::class, $instance);
            self::assertEquals($value['refundId'], $instance->getRefundId());
        }
    }

    /**
     * @dataProvider validDataProvider
     */
    public function test_set_payment_id(mixed $value): void
    {
        $builder = new ReceiptsRequestBuilder;
        $builder->setPaymentId($value['paymentId']);
        $instance = $builder->build();
        if (empty($value)) {
            self::assertFalse($instance->hasPaymentId());
        } else {
            self::assertTrue($instance->hasPaymentId());
            self::assertInstanceOf(ReceiptsRequest::class, $instance);
            self::assertEquals($value['paymentId'], $instance->getPaymentId());
        }
    }

    /**
     * @dataProvider validDataProvider
     */
    public function test_set_status(mixed $value): void
    {
        $builder = new ReceiptsRequestBuilder;
        $builder->setStatus($value['status']);
        $instance = $builder->build();
        if (empty($value)) {
            self::assertFalse($instance->hasStatus());
        } else {
            self::assertTrue($instance->hasStatus());
            self::assertInstanceOf(ReceiptsRequest::class, $instance);
            self::assertEquals($value['status'], $instance->getStatus());
        }
    }

    /**
     * @dataProvider validDataProvider
     */
    public function test_set_limit(mixed $value): void
    {
        $builder = new ReceiptsRequestBuilder;
        $builder->setLimit($value['limit']);
        $instance = $builder->build();
        if (empty($value)) {
            self::assertFalse($instance->hasLimit());
        } else {
            self::assertTrue($instance->hasLimit());
            self::assertInstanceOf(ReceiptsRequest::class, $instance);
            self::assertEquals($value['limit'], $instance->getLimit());
        }
    }

    /**
     * @dataProvider validDataProvider
     */
    public function test_set_cursor(mixed $value): void
    {
        $builder = new ReceiptsRequestBuilder;
        $builder->setCursor($value['cursor']);
        $instance = $builder->build();
        if (empty($value)) {
            self::assertFalse($instance->hasCursor());
        } else {
            self::assertTrue($instance->hasCursor());
            self::assertInstanceOf(ReceiptsRequest::class, $instance);
            self::assertEquals($value['cursor'], $instance->getCursor());
        }
    }

    /**
     * @dataProvider validDataProvider
     */
    public function test_set_created_at_gt(mixed $value): void
    {
        $builder = new ReceiptsRequestBuilder;
        $builder->setCreatedAtGt($value['createdAtGt']);
        $instance = $builder->build();
        if (empty($value['createdAtGt'])) {
            self::assertFalse($instance->hasCreatedAtGt());
        } else {
            self::assertTrue($instance->hasCreatedAtGt());
            self::assertInstanceOf(ReceiptsRequest::class, $instance);
            self::assertEquals($value['createdAtGt'], $instance->getCreatedAtGt()->format(YOOKASSA_DATE));
        }
    }

    /**
     * @dataProvider validDataProvider
     */
    public function test_set_created_at_gte(mixed $value): void
    {
        $builder = new ReceiptsRequestBuilder;
        $builder->setCreatedAtGte($value['createdAtGte']);
        $instance = $builder->build();
        if (empty($value['createdAtGte'])) {
            self::assertFalse($instance->hasCreatedAtGte());
        } else {
            self::assertTrue($instance->hasCreatedAtGte());
            self::assertInstanceOf(ReceiptsRequest::class, $instance);
            self::assertEquals($value['createdAtGte'], $instance->getCreatedAtGte()->format(YOOKASSA_DATE));
        }
    }

    /**
     * @dataProvider validDataProvider
     */
    public function test_set_created_at_lt(mixed $value): void
    {
        $builder = new ReceiptsRequestBuilder;
        $builder->setCreatedAtLt($value['createdAtLt']);
        $instance = $builder->build();
        if (empty($value['createdAtLt'])) {
            self::assertFalse($instance->hasCreatedAtLt());
        } else {
            self::assertTrue($instance->hasCreatedAtLt());
            self::assertInstanceOf(ReceiptsRequest::class, $instance);
            self::assertEquals($value['createdAtLt'], $instance->getCreatedAtLt()->format(YOOKASSA_DATE));
        }
    }

    /**
     * @dataProvider validDataProvider
     */
    public function test_set_created_at_lte(mixed $value): void
    {
        $builder = new ReceiptsRequestBuilder;
        $builder->setCreatedAtLte($value['createdAtLte']);
        $instance = $builder->build();
        if (empty($value['createdAtLte'])) {
            self::assertFalse($instance->hasCreatedAtLte());
        } else {
            self::assertTrue($instance->hasCreatedAtLte());
            self::assertInstanceOf(ReceiptsRequest::class, $instance);
            self::assertEquals($value['createdAtLte'], $instance->getCreatedAtLte()->format(YOOKASSA_DATE));
        }
    }

    public static function validDataProvider(): array
    {
        $result = [
            [
                [
                    'paymentId' => '216749da-000f-50be-b000-096747fad91e',
                    'refundId' => '216749f7-0016-50be-b000-078d43a63ae4',
                    'status' => RefundStatus::SUCCEEDED,
                    'limit' => 100,
                    'cursor' => '37a5c87d-3984-51e8-a7f3-8de646d39ec15',
                    'createdAtGte' => date(YOOKASSA_DATE, Random::int(1, time())),
                    'createdAtGt' => date(YOOKASSA_DATE, Random::int(1, time())),
                    'createdAtLte' => date(YOOKASSA_DATE, Random::int(1, time())),
                    'createdAtLt' => date(YOOKASSA_DATE, Random::int(1, time())),
                ],
            ],
        ];
        for ($i = 0; $i < 8; $i++) {
            $receipts = [
                'paymentId' => Random::str(36),
                'refundId' => Random::str(36),
                'createdAtGte' => ($i === 0 ? null : ($i === 1 ? '' : date(YOOKASSA_DATE, Random::int(1, time())))),
                'createdAtGt' => ($i === 0 ? null : ($i === 1 ? '' : date(YOOKASSA_DATE, Random::int(1, time())))),
                'createdAtLte' => ($i === 0 ? null : ($i === 1 ? '' : date(YOOKASSA_DATE, Random::int(1, time())))),
                'createdAtLt' => ($i === 0 ? null : ($i === 1 ? '' : date(YOOKASSA_DATE, Random::int(1, time())))),
                'status' => Random::value(ReceiptRegistrationStatus::getValidValues()),
                'cursor' => uniqid('', true),
                'limit' => Random::int(1, ReceiptsRequest::MAX_LIMIT_VALUE),
            ];
            $result[] = [$receipts];
        }

        return $result;
    }
}
