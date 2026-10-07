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
use YooKassa\Helpers\Random;
use YooKassa\Model\Deal\PayoutDealInfo;
use YooKassa\Model\Metadata;
use YooKassa\Model\MonetaryAmount;
use YooKassa\Request\Payouts\CreatePayoutRequest;
use YooKassa\Request\Payouts\CreatePayoutRequestBuilder;
use YooKassa\Request\Payouts\IncomeReceiptData;
use YooKassa\Request\Payouts\PayoutDestinationData\PayoutDestinationDataBankCard;
use YooKassa\Request\Payouts\PayoutDestinationData\PayoutDestinationDataFactory;
use YooKassa\Request\Payouts\PayoutPersonalData;
use YooKassa\Request\Payouts\PayoutSelfEmployedInfo;

/**
 * CreatePayoutRequestTest
 *
 * @category    ClassTest
 *
 * @author      cms@yoomoney.ru
 *
 * @link        https://yookassa.ru/developers/api
 */
class CreatePayoutRequestTest extends AbstractTestCase
{
    protected CreatePayoutRequest $object;

    protected function getTestInstance(): CreatePayoutRequest
    {
        return new CreatePayoutRequest;
    }

    public function test_create_payout_request_class_exists(): void
    {
        $this->object = $this->getMockBuilder(CreatePayoutRequest::class)->getMockForAbstractClass();
        $this->assertTrue(class_exists(CreatePayoutRequest::class));
        $this->assertInstanceOf(CreatePayoutRequest::class, $this->object);
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
        self::assertTrue($instance->hasAmount());
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
     * Test property "payout_destination_data"
     *
     * @dataProvider validPayoutDestinationDataDataProvider
     *
     * @throws Exception
     */
    public function test_payout_destination_data(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getPayoutDestinationData());
        self::assertEmpty($instance->payout_destination_data);
        $instance->setPayoutDestinationData($value);
        if (is_array($value)) {
            $value = (new PayoutDestinationDataFactory)->factoryFromArray($value);
        }
        self::assertEquals($value, is_array($value) ? $instance->getPayoutDestinationData()->toArray() : $instance->getPayoutDestinationData());
        self::assertEquals($value, is_array($value) ? $instance->payout_destination_data->toArray() : $instance->payout_destination_data);
        if (! empty($value)) {
            self::assertTrue($instance->hasPayoutDestinationData());
            self::assertNotNull($instance->getPayoutDestinationData());
            self::assertNotNull($instance->payout_destination_data);
        }
    }

    /**
     * Test invalid property "payout_destination_data"
     *
     * @dataProvider invalidPayoutDestinationDataDataProvider
     */
    public function test_invalid_payout_destination_data(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setPayoutDestinationData($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validPayoutDestinationDataDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_payout_destination_data'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidPayoutDestinationDataDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_payout_destination_data'));
    }

    /**
     * Test property "payout_token"
     *
     * @dataProvider validPayoutTokenDataProvider
     *
     * @throws Exception
     */
    public function test_payout_token(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getPayoutToken());
        self::assertEmpty($instance->payout_token);
        $instance->setPayoutToken($value);
        self::assertEquals($value, is_array($value) ? $instance->getPayoutToken()->toArray() : $instance->getPayoutToken());
        self::assertEquals($value, is_array($value) ? $instance->payout_token->toArray() : $instance->payout_token);
        if (! empty($value)) {
            self::assertTrue($instance->hasPayoutToken());
            self::assertNotNull($instance->getPayoutToken());
            self::assertNotNull($instance->payout_token);
        }
    }

    /**
     * Test invalid property "payout_token"
     *
     * @dataProvider invalidPayoutTokenDataProvider
     */
    public function test_invalid_payout_token(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setPayoutToken($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validPayoutTokenDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_payout_token'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidPayoutTokenDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_payout_token'));
    }

    /**
     * Test property "payment_method_id"
     *
     * @dataProvider validPaymentMethodIdDataProvider
     *
     * @throws Exception
     */
    public function test_payment_method_id(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getPaymentMethodId());
        self::assertEmpty($instance->payment_method_id);
        $instance->setPaymentMethodId($value);
        self::assertEquals($value, is_array($value) ? $instance->getPaymentMethodId()->toArray() : $instance->getPaymentMethodId());
        self::assertEquals($value, is_array($value) ? $instance->payment_method_id->toArray() : $instance->payment_method_id);
        if (! empty($value)) {
            self::assertTrue($instance->hasPaymentMethodId());
            self::assertNotNull($instance->getPaymentMethodId());
            self::assertNotNull($instance->payment_method_id);
        }
    }

    /**
     * Test invalid property "payment_method_id"
     *
     * @dataProvider invalidPaymentMethodIdDataProvider
     */
    public function test_invalid_payment_method_id(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setPaymentMethodId($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validPaymentMethodIdDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_payment_method_id'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidPaymentMethodIdDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_payment_method_id'));
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
            self::assertTrue($instance->hasDescription());
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
            self::assertTrue($instance->hasDeal());
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
            self::assertTrue($instance->hasSelfEmployed());
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
     * Test property "receipt_data"
     *
     * @dataProvider validReceiptDataDataProvider
     *
     * @throws Exception
     */
    public function test_receipt_data(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getReceiptData());
        self::assertEmpty($instance->receipt_data);
        $instance->setReceiptData($value);
        self::assertEquals($value, is_array($value) ? $instance->getReceiptData()->toArray() : $instance->getReceiptData());
        self::assertEquals($value, is_array($value) ? $instance->receipt_data->toArray() : $instance->receipt_data);
        if (! empty($value)) {
            self::assertTrue($instance->hasReceiptData());
            self::assertNotNull($instance->getReceiptData());
            self::assertNotNull($instance->receipt_data);
        }
    }

    /**
     * Test invalid property "receipt_data"
     *
     * @dataProvider invalidReceiptDataDataProvider
     */
    public function test_invalid_receipt_data(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setReceiptData($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validReceiptDataDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_receipt_data'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidReceiptDataDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_receipt_data'));
    }

    /**
     * Test property "personal_data"
     *
     * @dataProvider validPersonalDataDataProvider
     *
     * @throws Exception
     */
    public function test_personal_data(mixed $value): void
    {
        $instance = $this->getTestInstance();
        self::assertEmpty($instance->getPersonalData());
        self::assertEmpty($instance->personal_data);
        self::assertIsObject($instance->getPersonalData());
        self::assertIsObject($instance->personal_data);
        self::assertCount(0, $instance->getPersonalData());
        self::assertCount(0, $instance->personal_data);
        $instance->setPersonalData($value);
        if (! empty($value)) {
            self::assertTrue($instance->hasPersonalData());
            self::assertNotNull($instance->getPersonalData());
            self::assertNotNull($instance->personal_data);
            foreach ($value as $key => $element) {
                if (is_array($element) && ! empty($element)) {
                    self::assertEquals($element, $instance->getPersonalData()[$key]->toArray());
                    self::assertEquals($element, $instance->personal_data[$key]->toArray());
                    self::assertIsArray($instance->getPersonalData()[$key]->toArray());
                    self::assertIsArray($instance->personal_data[$key]->toArray());
                }
                if (is_object($element) && ! empty($element)) {
                    self::assertEquals($element, $instance->getPersonalData()->get($key));
                    self::assertIsObject($instance->getPersonalData()->get($key));
                    self::assertIsObject($instance->personal_data->get($key));
                    self::assertIsObject($instance->getPersonalData());
                    self::assertIsObject($instance->personal_data);
                }
            }
            self::assertCount(count($value), $instance->getPersonalData());
            self::assertCount(count($value), $instance->personal_data);
            self::assertLessThanOrEqual(2, $instance->getPersonalData()->count());
            self::assertLessThanOrEqual(2, $instance->personal_data->count());
            self::assertGreaterThanOrEqual(1, $instance->getPersonalData()->count());
            self::assertGreaterThanOrEqual(1, $instance->personal_data->count());
        }
    }

    /**
     * Test invalid property "personal_data"
     *
     * @dataProvider invalidPersonalDataDataProvider
     */
    public function test_invalid_personal_data(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setPersonalData($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validPersonalDataDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_personal_data'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidPersonalDataDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_personal_data'));
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
            self::assertTrue($instance->hasMetadata());
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

    public function test_validate(): void
    {
        $instance = new CreatePayoutRequest;

        self::assertFalse($instance->validate());

        $amount = new MonetaryAmount(1);
        $instance->setAmount($amount);
        self::assertFalse($instance->validate());

        $instance->setAmount(new MonetaryAmount(10));
        self::assertFalse($instance->validate());

        $instance->setPayoutToken(null);
        self::assertFalse($instance->validate());
        $instance->setDescription('test');
        self::assertFalse($instance->validate());
        $instance->setDeal(new PayoutDealInfo(['id' => Random::str(36, 50)]));
        self::assertFalse($instance->validate());
        $instance->setAmount(new MonetaryAmount(1));
        self::assertFalse($instance->validate());

        $instance->setPayoutToken(Random::str(10));
        $instance->setPaymentMethodId('test');
        self::assertFalse($instance->validate());
        $instance->setPersonalData([new PayoutPersonalData(['id' => Random::str(36, 50)])]);
        self::assertFalse($instance->validate());
        $instance->setReceiptData(new IncomeReceiptData(['service_name' => Random::str(1, 50)]));
        self::assertFalse($instance->validate());
        $instance->setSelfEmployed(new PayoutSelfEmployedInfo(['id' => Random::str(36, 50)]));
        self::assertFalse($instance->validate());

        $instance->setPayoutToken(Random::str(10));
        $instance->setPayoutDestinationData(new PayoutDestinationDataBankCard);
        self::assertFalse($instance->validate());
        $instance->setPayoutToken(null);
        $instance->setPaymentMethodId(null);
        self::assertTrue($instance->validate());
    }

    /**
     * Test valid method "builder"
     */
    public function test_builder(): void
    {
        $builder = CreatePayoutRequest::builder();
        self::assertInstanceOf(CreatePayoutRequestBuilder::class, $builder);
    }
}
