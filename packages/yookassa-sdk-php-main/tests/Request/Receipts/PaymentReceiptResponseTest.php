<?php

namespace Tests\YooKassa\Request\Receipts;

use InvalidArgumentException;
use TypeError;
use YooKassa\Helpers\Random;
use YooKassa\Model\Receipt\Settlement;
use YooKassa\Model\Receipt\SettlementInterface;
use YooKassa\Request\Receipts\AbstractReceiptResponse;
use YooKassa\Request\Receipts\PaymentReceiptResponse;
use YooKassa\Request\Receipts\ReceiptResponseItem;
use YooKassa\Request\Receipts\ReceiptResponseItemInterface;
use YooKassa\Validator\Exceptions\InvalidPropertyValueException;

/**
 * @internal
 */
class PaymentReceiptResponseTest extends AbstractTestReceiptResponse
{
    protected string $type = 'payment';

    /**
     * @dataProvider validDataProvider
     */
    public function test_specific_properties(array $options): void
    {
        $instance = $this->getTestInstance($options);
        self::assertEquals($options['payment_id'], $instance->getPaymentId());
    }

    /**
     * @dataProvider invalidDataProvider
     */
    public function test_invalid_specific_properties(array $options): void
    {
        $this->expectException(InvalidPropertyValueException::class);
        $instance = $this->getTestInstance($options);
        $instance->setPaymentId($options['payment_id']);
    }

    /**
     * @dataProvider validDataProvider
     */
    public function test_gets_valid_data(array $options): void
    {
        $instance = $this->getTestInstance($options);

        if (! is_null($options['fiscal_document_number'])) {
            self::assertNotNull($instance->getFiscalDocumentNumber());
        }
        self::assertEquals($options['fiscal_document_number'], $instance->getFiscalDocumentNumber());

        self::assertNotNull($instance->getFiscalStorageNumber());
        self::assertEquals($options['fiscal_storage_number'], $instance->getFiscalStorageNumber());

        self::assertNotNull($instance->getFiscalAttribute());
        self::assertEquals($options['fiscal_attribute'], $instance->getFiscalAttribute());

        self::assertNotNull($instance->getFiscalProviderId());
        self::assertEquals($options['fiscal_provider_id'], $instance->getFiscalProviderId());

        self::assertNotNull($instance->getRegisteredAt());
        self::assertEquals($options['registered_at'], $instance->getRegisteredAt()->format(YOOKASSA_DATE));

        self::assertNotNull($instance->getItems());
        foreach ($instance->getItems() as $item) {
            self::assertInstanceOf(ReceiptResponseItemInterface::class, $item);
        }
        $instance->getItems()->clear();
        foreach ($options['items'] as $key => $option) {
            $instance->addItem(new ReceiptResponseItem($option));
            self::assertEquals($option, $instance->getItems()->get($key)->toArray());
            self::assertInstanceOf(ReceiptResponseItemInterface::class, $instance->getItems()->get($key));
        }

        self::assertNotNull($instance->getSettlements());
        foreach ($instance->getSettlements() as $settlements) {
            self::assertInstanceOf(SettlementInterface::class, $settlements);
        }

        $instance->getSettlements()->clear();
        foreach ($options['settlements'] as $key => $option) {
            $instance->addSettlement(new Settlement($option));
            self::assertEquals($option, $instance->getSettlements()->get($key)->toArray());
            self::assertInstanceOf(SettlementInterface::class, $instance->getSettlements()->get($key));
        }

        self::assertNotNull($instance->getOnBehalfOf());
        self::assertEquals($options['on_behalf_of'], $instance->getOnBehalfOf());

        self::assertTrue($instance->notEmpty());

        $instance = $this->getTestInstance();
        self::assertIsObject($instance->getItems());
        self::assertIsObject($instance->getSettlements());
        self::assertIsObject($instance->getReceiptIndustryDetails());
    }

    public function test_set_fiscal_document_number(): void
    {
        $instance = $this->getTestInstance([]);
        $instance->setFiscalDocumentNumber(null);

        self::assertNull($instance->getFiscalStorageNumber());
    }

    public function test_set_tax_system_code(): void
    {
        $instance = $this->getTestInstance([]);
        $instance->setTaxSystemCode(null);

        self::assertNull($instance->getTaxSystemCode());
    }

    public function test_invalid_id_data(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $instance = $this->getTestInstance([]);
        $instance->setId(Random::str(AbstractReceiptResponse::LENGTH_RECEIPT_ID + 1));
    }

    public function test_invalid_type_data(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $instance = $this->getTestInstance([]);
        $instance->setType(Random::str(10));
    }

    public function test_invalid_status_id_data(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $instance = $this->getTestInstance([]);
        $instance->setStatus(Random::str(10));
    }

    /**
     * @dataProvider invalidItemsDataProvider
     */
    public function test_invalid_items_data(mixed $value, string $exceptionClassName): void
    {
        $instance = $this->getTestInstance([]);

        $this->expectException($exceptionClassName);
        $instance->setItems($value);
    }

    /**
     * @dataProvider invalidSettlementsDataProvider
     */
    public function test_invalid_settlements_data(mixed $value, string $exceptionClassName): void
    {
        $instance = $this->getTestInstance([]);

        $this->expectException($exceptionClassName);
        $instance->setSettlements($value);
    }

    /**
     * @dataProvider invalidBoolNullDataProvider
     */
    public function test_invalid_on_behalf_of_data(mixed $options): void
    {
        $this->expectException(TypeError::class);
        $instance = $this->getTestInstance([]);
        $instance->setOnBehalfOf($options);
    }

    protected function getTestInstance(mixed $options = null): PaymentReceiptResponse
    {
        return new PaymentReceiptResponse($options);
    }

    protected function addSpecificProperties(mixed $options, mixed $i): array
    {
        $array = [
            Random::str(30),
            Random::str(40),
        ];
        $options['payment_id'] = ! $this->valid
            ? (Random::value($array))
            : Random::value([null, '', Random::str(PaymentReceiptResponse::LENGTH_PAYMENT_ID)]);

        return $options;
    }
}
