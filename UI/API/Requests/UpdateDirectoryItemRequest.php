<?php

namespace App\Containers\DirectoryItemSection\DirectoryItem\UI\API\Requests;

use App\Ship\Helpers\Classes\Rule;

/**
 * Class UpdateDirectoryItemRequest
 *
 * @package App\Containers\DirectoryItemSection\DirectoryItem\UI\API\Requests
 */
class UpdateDirectoryItemRequest extends CreateDirectoryItemRequest
{
    /**
     * Id's that needs decoding before applying the validation rules.
     */
    protected array $decode = [
        'id',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     */
    protected array $urlParameters = [
        'id',
    ];

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return array_merge(
            ['id' => config('directoryItemSection-directoryItem.rules.id')],
            parent::rules()
        );
    }

    /**
     * Get position collection id.
     *
     * @return array
     */
    protected function getRulesPositionCollectionId(): array
    {
        return Rule::removeRequiredRule(parent::getRulesPositionCollectionId());
    }

    /**
     * Get position type id.
     *
     * @return array
     */
    protected function getRulesPositionTypeId(): array
    {
        return Rule::removeRequiredRule(parent::getRulesPositionTypeId());
    }

    /**
     * Get sku.
     *
     * @return array
     */
    protected function getRulesSku(): array
    {
        return Rule::removeRequiredRule(parent::getRulesSku());
    }

    /**
     * Get title.
     *
     * @return array
     */
    protected function getRulesTitle(): array
    {
        return Rule::removeRequiredRule(parent::getRulesTitle());
    }

    /**
     * Get unit.
     *
     * @return array
     */
    protected function getRulesUnit(): array
    {
        return Rule::removeRequiredRule(parent::getRulesUnit());
    }

    /**
     * Get count.
     *
     * @return array
     */
    protected function getRulesCount(): array
    {
        return Rule::removeRequiredRule(parent::getRulesCount());
    }

    /**
     * Get price.
     *
     * @return array
     */
    protected function getRulesPrice(): array
    {
        return Rule::removeRequiredRule(parent::getRulesPrice());
    }

    /**
     * Get price up.
     *
     * @return array
     */
    protected function getRulesPriceUp(): array
    {
        return Rule::removeRequiredRule(parent::getRulesPriceUp());
    }

    /**
     * Get price customer.
     *
     * @return array
     */
    protected function getRulesPriceCustomer(): array
    {
        return Rule::removeRequiredRule(parent::getRulesPriceCustomer());
    }
}
