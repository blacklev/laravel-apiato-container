<?php

namespace App\Containers\DirectoryItemSection\DirectoryItem\UI\API\Requests;

use App\Ship\Requests\ApiRequest;

/**
 * Class CreateDirectoryItemRequest
 *
 * @package App\Containers\DirectoryItemSection\DirectoryItem\UI\API\Requests
 */
class CreateDirectoryItemRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'position_collection_id' => $this->getRulesPositionCollectionId(),
            'position_type_id' => $this->getRulesPositionTypeId(),
            'sku' => $this->getRulesSku(),
            'title' => $this->getRulesTitle(),
            'unit' => $this->getRulesUnit(),
            'count' => $this->getRulesCount(),
            'weight' => config('directoryItemSection-directoryItem.rules.weight'),
            'price' => $this->getRulesPrice(),
            'price_up' => $this->getRulesPriceUp(),
            'price_customer' => $this->getRulesPriceCustomer(),
            'is_manual' => config('directoryItemSection-directoryItem.rules.is_manual'),
            'is_explode' => config('directoryItemSection-directoryItem.rules.is_explode'),
            'attribute' => config('directoryItemSection-directoryItem.rules.attribute'),

            'position_group_ids' => config('directoryItemSection-directoryItem.rules.position_group_ids'),
            'position_group_ids.*' => config('directoryItemSection-directoryItem.rules.position_group_id'),

            'price_list' => config('directoryItemSection-directoryItem.rules.price_list'),
            'price_list.*.price_type_id' => config('directoryItemSection-directoryItem.rules.price_type_id'),
            'price_list.*.price' => config('directoryItemSection-directoryItem.rules.price'),
            'price_list.*.price_up' => config('directoryItemSection-directoryItem.rules.price_up'),
            'price_list.*.price_customer' => config('directoryItemSection-directoryItem.rules.price_customer'),

            'href_kit_ids' => config('directoryItemSection-directoryItem.rules.href_kit_ids'),
            'href_kit_ids.*' => config('directoryItemSection-directoryItem.rules.directory_item_id'),

            'href_related_ids' => config('directoryItemSection-directoryItem.rules.href_related_ids'),
            'href_related_ids.*' => config('directoryItemSection-directoryItem.rules.directory_item_id'),

            'alternative_field' => config('directoryItemSection-directoryItem.rules.alternative_field'),
            'alternative_field.*.brand_id' => config('directoryItemSection-directoryItem.rules.brand_id'),
            'alternative_field.*.title' => config('directoryItemSection-directoryItem.rules.title'),
        ];
    }

    /**
     * Get position collection id.
     *
     * @return array
     */
    protected function getRulesPositionCollectionId(): array
    {
        return config('directoryItemSection-directoryItem.rules.position_collection_id');
    }

    /**
     * Get position type id.
     *
     * @return array
     */
    protected function getRulesPositionTypeId(): array
    {
        return config('directoryItemSection-directoryItem.rules.position_type_id');
    }

    /**
     * Get sku.
     *
     * @return array
     */
    protected function getRulesSku(): array
    {
        return config('directoryItemSection-directoryItem.rules.sku');
    }

    /**
     * Get title.
     *
     * @return array
     */
    protected function getRulesTitle(): array
    {
        return config('directoryItemSection-directoryItem.rules.title');
    }

    /**
     * Get unit.
     *
     * @return array
     */
    protected function getRulesUnit(): array
    {
        return config('directoryItemSection-directoryItem.rules.unit');
    }

    /**
     * Get count.
     *
     * @return array
     */
    protected function getRulesCount(): array
    {
        return config('directoryItemSection-directoryItem.rules.count');
    }

    /**
     * Get price.
     *
     * @return array
     */
    protected function getRulesPrice(): array
    {
        return config('directoryItemSection-directoryItem.rules.price');
    }

    /**
     * Get price up.
     *
     * @return array
     */
    protected function getRulesPriceUp(): array
    {
        return config('directoryItemSection-directoryItem.rules.price_up');
    }

    /**
     * Get price customer.
     *
     * @return array
     */
    protected function getRulesPriceCustomer(): array
    {
        return config('directoryItemSection-directoryItem.rules.price_customer');
    }
}
