<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Defines the query parameters that can be included in a request to the
 * `ListCustomers` endpoint.
 */
class ListCustomersRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $cursor;

    /**
     * @var int|null
     */
    private $limit;

    /**
     * @var string|null
     */
    private $sortField;

    /**
     * @var string|null
     */
    private $sortOrder;

    /**
     * Returns Cursor.
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this cursor to retrieve the next set of results for your original query.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-
     * patterns/pagination).
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this cursor to retrieve the next set of results for your original query.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-
     * patterns/pagination).
     *
     * @maps cursor
     */
    public function setCursor(?string $cursor): void
    {
        $this->cursor = $cursor;
    }

    /**
     * Returns Limit.
     * The maximum number of results to return in a single page. This limit is advisory. The response might
     * contain more or fewer results.
     * If the specified limit is less than 1 or greater than 100, Square returns a `400 VALUE_TOO_LOW` or
     * `400 VALUE_TOO_HIGH` error. The default value is 100.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-
     * patterns/pagination).
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     * The maximum number of results to return in a single page. This limit is advisory. The response might
     * contain more or fewer results.
     * If the specified limit is less than 1 or greater than 100, Square returns a `400 VALUE_TOO_LOW` or
     * `400 VALUE_TOO_HIGH` error. The default value is 100.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-
     * patterns/pagination).
     *
     * @maps limit
     */
    public function setLimit(?int $limit): void
    {
        $this->limit = $limit;
    }

    /**
     * Returns Sort Field.
     * Specifies customer attributes as the sort key to customer profiles returned from a search.
     */
    public function getSortField(): ?string
    {
        return $this->sortField;
    }

    /**
     * Sets Sort Field.
     * Specifies customer attributes as the sort key to customer profiles returned from a search.
     *
     * @maps sort_field
     * @factory \Square\Models\CustomerSortField::checkValue
     */
    public function setSortField(?string $sortField): void
    {
        $this->sortField = $sortField;
    }

    /**
     * Returns Sort Order.
     * The order (e.g., chronological or alphabetical) in which results from a request are returned.
     */
    public function getSortOrder(): ?string
    {
        return $this->sortOrder;
    }

    /**
     * Sets Sort Order.
     * The order (e.g., chronological or alphabetical) in which results from a request are returned.
     *
     * @maps sort_order
     * @factory \Square\Models\SortOrder::checkValue
     */
    public function setSortOrder(?string $sortOrder): void
    {
        $this->sortOrder = $sortOrder;
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
        if (isset($this->cursor)) {
            $json['cursor']     = $this->cursor;
        }
        if (isset($this->limit)) {
            $json['limit']      = $this->limit;
        }
        if (isset($this->sortField)) {
            $json['sort_field'] = CustomerSortField::checkValue($this->sortField);
        }
        if (isset($this->sortOrder)) {
            $json['sort_order'] = SortOrder::checkValue($this->sortOrder);
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
