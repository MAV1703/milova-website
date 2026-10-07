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

use Exception;
use Tests\YooKassa\AbstractTestCase;
use YooKassa\Model\Payout\PayoutCancellationDetails;

/**
 * PayoutCancellationDetailsTest
 *
 * @category    ClassTest
 *
 * @author      cms@yoomoney.ru
 *
 * @link        https://yookassa.ru/developers/api
 */
class PayoutCancellationDetailsTest extends AbstractTestCase
{
    protected PayoutCancellationDetails $object;

    protected function getTestInstance(): PayoutCancellationDetails
    {
        return new PayoutCancellationDetails;
    }

    public function test_payout_cancellation_details_class_exists(): void
    {
        $this->object = $this->getMockBuilder(PayoutCancellationDetails::class)->getMockForAbstractClass();
        $this->assertTrue(class_exists(PayoutCancellationDetails::class));
        $this->assertInstanceOf(PayoutCancellationDetails::class, $this->object);
    }

    /**
     * Test property "party"
     *
     * @dataProvider validPartyDataProvider
     *
     * @throws Exception
     */
    public function test_party(mixed $value): void
    {
        $instance = $this->getTestInstance();
        $instance->setParty($value);
        self::assertNotNull($instance->getParty());
        self::assertNotNull($instance->party);
        self::assertEquals($value, is_array($value) ? $instance->getParty()->toArray() : $instance->getParty());
        self::assertEquals($value, is_array($value) ? $instance->party->toArray() : $instance->party);
        self::assertContains($instance->getParty(), ['yoo_money', 'payout_network']);
        self::assertContains($instance->party, ['yoo_money', 'payout_network']);
    }

    /**
     * Test invalid property "party"
     *
     * @dataProvider invalidPartyDataProvider
     */
    public function test_invalid_party(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setParty($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validPartyDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_party'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidPartyDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_party'));
    }

    /**
     * Test property "reason"
     *
     * @dataProvider validReasonDataProvider
     *
     * @throws Exception
     */
    public function test_reason(mixed $value): void
    {
        $instance = $this->getTestInstance();
        $instance->setReason($value);
        self::assertNotNull($instance->getReason());
        self::assertNotNull($instance->reason);
        self::assertEquals($value, is_array($value) ? $instance->getReason()->toArray() : $instance->getReason());
        self::assertEquals($value, is_array($value) ? $instance->reason->toArray() : $instance->reason);
        self::assertContains($instance->getReason(), ['insufficient_funds', 'fraud_suspected', 'one_time_limit_exceeded', 'periodic_limit_exceeded', 'rejected_by_payee', 'general_decline', 'issuer_unavailable', 'recipient_not_found', 'recipient_check_failed', 'identification_required']);
        self::assertContains($instance->reason, ['insufficient_funds', 'fraud_suspected', 'one_time_limit_exceeded', 'periodic_limit_exceeded', 'rejected_by_payee', 'general_decline', 'issuer_unavailable', 'recipient_not_found', 'recipient_check_failed', 'identification_required']);
    }

    /**
     * Test invalid property "reason"
     *
     * @dataProvider invalidReasonDataProvider
     */
    public function test_invalid_reason(mixed $value, string $exceptionClass): void
    {
        $instance = $this->getTestInstance();

        $this->expectException($exceptionClass);
        $instance->setReason($value);
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function validReasonDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getValidDataProviderByType($instance->getValidator()->getRulesByPropName('_reason'));
    }

    /**
     * @return array[]
     *
     * @throws Exception
     */
    public function invalidReasonDataProvider(): array
    {
        $instance = $this->getTestInstance();

        return $this->getInvalidDataProviderByType($instance->getValidator()->getRulesByPropName('_reason'));
    }
}
