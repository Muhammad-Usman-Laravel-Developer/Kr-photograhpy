<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Specifies how searched customers profiles are sorted, including the sort key and sort order.
 */
class CustomerSort implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $field;

    /**
     * @var string|null
     */
    private $order;

    /**
     * Returns Field.
     * Specifies customer attributes as the sort key to customer profiles returned from a search.
     */
    public function getField(): ?string
    {
        return $this->field;
    }

    /**
     * Sets Field.
     * Specifies customer attributes as the sort key to customer profiles returned from a search.
     *
     * @maps field
     * @factory \Square\Models\CustomerSortField::checkValue
     */
    public function setField(?string $field): void
    {
        $this->field = $field;
    }

    /**
     * Returns Order.
     * The order (e.g., chronological or alphabetical) in which results from a request are returned.
     */
    public function getOrder(): ?string
    {
        return $this->order;
    }

    /**
     * Sets Order.
     * The order (e.g., chronological or alphabetical) in which results from a request are returned.
     *
     * @maps order
     * @factory \Square\Models\SortOrder::checkValue
     */
    public function setOrder(?string $order): void
    {
        $this->order = $order;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->field)) {
            $json['field'] = CustomerSortField::checkValue($this->field);
        }
        if (isset($this->order)) {
            $json['order'] = SortOrder::checkValue($this->order);
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
