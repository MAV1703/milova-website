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
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use stdClass;
use YooKassa\Helpers\Random;
use YooKassa\Model\AmountInterface;
use YooKassa\Model\CurrencyCode;
use YooKassa\Model\MonetaryAmount;
use YooKassa\Model\Payment\PaymentMethodType;
use YooKassa\Model\Payout\Payout;
use YooKassa\Model\Payout\PayoutDestinationType;
use YooKassa\Request\Payouts\CreatePayoutRequestBuilder;
use YooKassa\Request\Payouts\IncomeReceiptData;
use YooKassa\Request\Payouts\PayoutDestinationData\PayoutDestinationDataFactory;
use YooKassa\Request\Payouts\PayoutSelfEmployedInfo;

/**
 * CreatePayoutRequestBuilderTest
 *
 * @category    ClassTest
 *
 * @author      cms@yoomoney.ru
 *
 * @link        https://yookassa.ru/developers/api
 */
class CreatePayoutRequestBuilderTest extends TestCase
{
    /**
     * @dataProvider validDataProvider
     *
     * @throws Exception
     */
    public function test_set_deal(mixed $options): void
    {
        $builder = new CreatePayoutRequestBuilder;
        $builder->setOptions($options);
        $instance = $builder->build();

        if (empty($options['deal'])) {
            self::assertNull($instance->getDeal());
        } else {
            self::assertNotNull($instance->getDeal());
            self::assertEquals($options['deal'], $instance->getDeal()->toArray());
        }
    }

    /**
     * @dataProvider validDataProvider
     *
     * @throws Exception
     */
    public function test_set_self_employed(mixed $options): void
    {
        $builder = new CreatePayoutRequestBuilder;
        $builder->setOptions($options);
        $instance = $builder->build();

        if (empty($options['self_employed'])) {
            self::assertNull($instance->getSelfEmployed());
        } else {
            self::assertNotNull($instance->getSelfEmployed());
            if (is_array($options['self_employed'])) {
                self::assertEquals($options['self_employed'], $instance->getSelfEmployed()->toArray());
            } else {
                self::assertEquals($options['self_employed'], $instance->getSelfEmployed());
            }
        }
    }

    /**
     * @dataProvider validDataProvider
     *
     * @throws Exception
     */
    public function test_set_receipt_data(mixed $options): void
    {
        $builder = new CreatePayoutRequestBuilder;
        $builder->setOptions($options);
        $instance = $builder->build();

        if (empty($options['receipt_data'])) {
            self::assertNull($instance->getReceiptData());
        } else {
            self::assertNotNull($instance->getReceiptData());
            if (is_array($options['receipt_data'])) {
                self::assertEquals($options['receipt_data'], $instance->getReceiptData()->toArray());
            } else {
                self::assertEquals($options['receipt_data'], $instance->getReceiptData());
            }
        }
    }

    /**
     * @dataProvider validDataProvider
     *
     * @throws Exception
     */
    public function test_set_amount(mixed $options): void
    {
        $builder = new CreatePayoutRequestBuilder;
        $builder->setOptions($options);
        $instance = $builder->build();
        self::assertNotNull($instance->getAmount());

        if ($options['amount'] instanceof AmountInterface) {
            self::assertEquals($options['amount']->getValue(), $instance->getAmount()->getValue());
        } else {
            self::assertEquals($options['amount']['value'], $instance->getAmount()->getValue());
        }

        if (! $options['amount'] instanceof AmountInterface) {
            $builder->setAmount([
                'value' => $options['amount']['value'],
                'currency' => 'EUR',
            ]);
            $builder->setPayoutToken($options['payoutDestinationData'] ? null : uniqid('', true));
            $builder->setPayoutDestinationData($options['payoutDestinationData']);
            $instance = $builder->build();
            self::assertEquals($options['amount']['value'], $instance->getAmount()->getValue());
        }
    }

    /**
     * @dataProvider invalidAmountDataProvider
     */
    public function test_set_invalid_amount(mixed $value): void
    {
        $this->expectException(InvalidArgumentException::class);
        $builder = new CreatePayoutRequestBuilder;
        $builder->setAmount($value);
    }

    /**
     * @dataProvider validDataProvider
     *
     * @throws Exception
     */
    public function test_set_payout_token(mixed $options): void
    {
        $builder = new CreatePayoutRequestBuilder;
        $builder->setOptions($options);
        $instance = $builder->build();

        if (empty($options['payoutToken'])) {
            self::assertNull($instance->getPayoutToken());
        } else {
            self::assertNotNull($instance->getPayoutToken());
            self::assertEquals($options['payoutToken'], $instance->getPayoutToken());
        }
    }

    /**
     * @dataProvider validDataProvider
     *
     * @throws Exception
     */
    public function test_set_payment_method_id(mixed $options): void
    {
        $builder = new CreatePayoutRequestBuilder;
        $builder->setOptions($options);
        $instance = $builder->build();

        if (empty($options['paymentMethodId'])) {
            self::assertNull($instance->getPaymentMethodId());
        } else {
            self::assertNotNull($instance->getPaymentMethodId());
            self::assertEquals($options['paymentMethodId'], $instance->getPaymentMethodId());
        }
    }

    /**
     * @dataProvider validDataProvider
     *
     * @throws Exception
     */
    public function test_set_payout_destination_data(mixed $options): void
    {
        $builder = new CreatePayoutRequestBuilder;
        $builder->setOptions($options);
        $instance = $builder->build();

        if (empty($options['payoutDestinationData'])) {
            self::assertNull($instance->getPayoutDestinationData());
        } else {
            self::assertNotNull($instance->getPayoutDestinationData());
            if (is_array($options['payoutDestinationData'])) {
                self::assertEquals($options['payoutDestinationData'], $instance->getPayoutDestinationData()->toArray());
            } else {
                self::assertEquals($options['payoutDestinationData'], $instance->getPayoutDestinationData());
            }
        }
    }

    /**
     * @dataProvider validDataProvider
     *
     * @throws Exception
     */
    public function test_set_metadata(mixed $options): void
    {
        $builder = new CreatePayoutRequestBuilder;
        $builder->setOptions($options);
        $instance = $builder->build();

        if (empty($options['metadata'])) {
            self::assertNull($instance->getMetadata());
        } else {
            self::assertEquals($options['metadata'], $instance->getMetadata()->toArray());
        }
    }

    public function invalidRecipientDataProvider(): array
    {
        return [
            [null],
            [true],
            [false],
            [1],
            [1.1],
            ['test'],
            [new stdClass],
        ];
    }

    /**
     * @throws Exception
     */
    public static function validDataProvider(): array
    {
        $payoutDestinationData = self::payoutDestinationData();

        $result = [
            [
                [
                    'description' => null,
                    'amount' => new MonetaryAmount(Random::int(1, 1000)),
                    'currency' => Random::value(CurrencyCode::getValidValues()),
                    'payoutToken' => null,
                    'paymentMethodId' => null,
                    'payoutDestinationData' => Random::value($payoutDestinationData),
                    'confirmation' => null,
                    'metadata' => null,
                    'deal' => [
                        'id' => Random::str(36, 50),
                    ],
                    'self_employed' => null,
                    'receipt_data' => null,
                ],
            ],
            [
                [
                    'description' => '',
                    'amount' => new MonetaryAmount(Random::int(1, 1000)),
                    'currency' => Random::value(CurrencyCode::getValidValues()),
                    'payoutToken' => uniqid('', true),
                    'paymentMethodId' => '',
                    'payoutDestinationData' => null,
                    'metadata' => [[]],
                    'deal' => [
                        'id' => Random::str(36, 50),
                    ],
                    'self_employed' => new PayoutSelfEmployedInfo([
                        'id' => Random::str(36, 50),
                    ]),
                    'receipt_data' => new IncomeReceiptData([
                        'service_name' => Random::str(36, 50),
                        'amount' => new MonetaryAmount(Random::int(1, 99)),
                    ]),
                ],
            ],
        ];
        for ($i = 0; $i < 10; $i++) {
            $even = $i % 3;
            $request = [
                'description' => uniqid('', true),
                'amount' => ['value' => Random::int(1, 99)],
                'currency' => CurrencyCode::RUB,
                'paymentMethodId' => $even === 0 ? uniqid('', true) : null,
                'payoutToken' => $even === 1 ? uniqid('', true) : null,
                'payoutDestinationData' => $even === 2 ? Random::value($payoutDestinationData) : null,
                'metadata' => ['test' => 'test'],
                'deal' => [
                    'id' => Random::str(36, 50),
                ],
                'self_employed' => new PayoutSelfEmployedInfo([
                    'id' => Random::str(36, 50),
                ]),
                'receipt_data' => [
                    'service_name' => Random::str(36, 50),
                    'amount' => ['value' => Random::int(1, 99), 'currency' => CurrencyCode::RUB],
                ],
            ];
            $result[] = [$request];
        }

        return $result;
    }

    public static function payoutDestinationData(): array
    {
        return [
            [
                'type' => PaymentMethodType::YOO_MONEY,
                'account_number' => Random::str(11, 33, '0123456789'),
            ],
            [
                'type' => PaymentMethodType::BANK_CARD,
                'card' => [
                    'number' => Random::str(16, 16, '0123456789'),
                ],
            ],
            [
                'type' => PaymentMethodType::SBP,
                'phone' => Random::str(4, 15, '0123456789'),
                'bank_id' => Random::str(4, 12, '0123456789'),
            ],
        ];
    }

    public static function invalidAmountDataProvider(): array
    {
        return [
            [-1],
            [true],
            [false],
            [new stdClass],
            [0],
        ];
    }

    /**
     * @dataProvider validDataProvider
     *
     * @throws Exception
     */
    public function test_set_description(mixed $options): void
    {
        $builder = new CreatePayoutRequestBuilder;
        $builder->setOptions($options);
        $instance = $builder->build();

        if (empty($options['description'])) {
            self::assertNull($instance->getDescription());
        } else {
            self::assertEquals($options['description'], $instance->getDescription());
        }
    }

    public function test_set_invalid_length_description(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $builder = new CreatePayoutRequestBuilder;
        $description = Random::str(Payout::MAX_LENGTH_DESCRIPTION + 1);
        $builder->setDescription($description);
    }

    /**
     * @throws Exception
     */
    public static function invalidDealDataProvider(): array
    {
        return [
            [true],
            [false],
            [new stdClass],
            [0],
            [7],
            [Random::int(-100, -1)],
            [Random::int(7, 100)],
        ];
    }

    /**
     * @dataProvider invalidDealDataProvider
     */
    public function test_set_invalid_deal(mixed $value): void
    {
        $this->expectException(InvalidArgumentException::class);
        $builder = new CreatePayoutRequestBuilder;
        $builder->setDeal($value);
    }

    /**
     * @throws Exception
     */
    public static function invalidSelfEmployedProvider(): array
    {
        return [
            [true],
            [false],
            [new stdClass],
            [0],
            [7],
            [Random::int(-100, -1)],
            [Random::int(7, 100)],
        ];
    }

    /**
     * @dataProvider invalidSelfEmployedProvider
     */
    public function test_set_invalid_self_employed(mixed $value): void
    {
        $this->expectException(InvalidArgumentException::class);
        $builder = new CreatePayoutRequestBuilder;
        $builder->setSelfEmployed($value);
    }

    /**
     * @param  null  $testingProperty
     *
     * @throws Exception
     */
    protected function getRequiredData($testingProperty = null): array
    {
        $result = [];
        $even = Random::bool();
        if ($testingProperty !== 'amount') {
            $result['amount'] = new MonetaryAmount(Random::int(1, 1000));
        }
        if ($testingProperty !== 'payoutToken') {
            $result['payoutToken'] = $even ? Random::str(36, 50) : null;
        }
        $factory = new PayoutDestinationDataFactory;
        if ($testingProperty !== 'payoutDestinationData') {
            $type = Random::value(PayoutDestinationType::getValidValues());
            $payoutDestination = self::payoutDestinationData();
            $result['payoutDestinationData'] = $even ? null : $factory->factory($type);
        }

        return $result;
    }
}
