<?php

namespace App\Containers\DirectoryItemSection\DirectoryItem\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Containers\DirectoryItemSection\DirectoryItem\Models\PriceList;
use App\Containers\DirectoryItemSection\DirectoryItem\Models\DirectoryItem;
use App\Containers\DirectoryItemSection\DirectoryItem\Traits\TypeDirectoryItemHref;
use App\Containers\DirectoryItemSection\DirectoryItem\Models\DirectoryItemAlternativeField;

/**
 * Class DirectoryItemRepository
 *
 * @package App\Containers\DirectoryItemSection\DirectoryItem\Data\Repositories
 */
class DirectoryItemRepository extends Repository
{
    use TypeDirectoryItemHref;

    /**
     * Searchable fields.
     *
     * @var array
     */
    protected $fieldSearchable = [
        'id'                                            => '=',
        'position_collection_id'                        => '=',
        'position_type_id'                              => '=',
        'sku'                                           => '=',
        'title'                                         => 'like',
        'unit'                                          => '=',
        'count'                                         => '=',
        'weight'                                        => '=',
        'price'                                         => '=',
        'price_up'                                      => '=',
        'price_customer'                                => '=',
        'is_manual'                                     => '=',
        'is_explode'                                    => '=',
        'positionGroupDirectoryItem.position_group_id'  => 'in',
    ];

    /**
     * Save a new entity in repository.
     *
     * @param   array $attributes
     *
     * @return  DirectoryItem
     *
     * @throws  ValidatorException
     */
    public function create(array $attributes)
    {
        /** @var DirectoryItem $result */
        $result = parent::create($attributes);

        $this->syncPositionGroup($result, $attributes);
        $this->syncHrefRelated($result, $attributes);
        $this->syncHrefIncludesKit($result, $attributes);
        $this->syncPriceList($result, $attributes);
        $this->syncAlternativeField($result, $attributes);

        return $result;
    }

    /**
     * Update a entity in repository by id.
     *
     * @param   array $attributes
     * @param   string|int $id
     *
     * @return  DirectoryItem
     *
     * @throws  ValidatorException
     */
    public function update(array $attributes, $id)
    {
        /** @var DirectoryItem $result */
        $result = parent::update($attributes, $id);

        $this->syncPositionGroup($result, $attributes);
        $this->syncHrefRelated($result, $attributes);
        $this->syncHrefIncludesKit($result, $attributes);
        $this->syncPriceList($result, $attributes);
        $this->syncAlternativeField($result, $attributes);

        return $result;
    }

    /**
     * Delete a entity in repository by id.
     *
     * @param   $id
     *
     * @return  int
     */
    public function delete($id)
    {
        /** @var DirectoryItem $directoryItem */
        $directoryItem = $this->find($id);

        $result = parent::deleteWhere(['id' => $id]);

        $directoryItem->positionGroup()->detach();
        $directoryItem->hrefRelated()->wherePivot('type_id', '=', $this->getTypeRelated())->detach();
        $directoryItem->hrefIncludesKit()->wherePivot('type_id', '=', $this->getTypeKit())->detach();
        $directoryItem->priceList()->delete();
        $directoryItem->alternativeField()->delete();

        return $result;
    }

    /**
     * Sync the position group with directory item.
     *
     * @param   DirectoryItem $directoryItem
     *
     * @param   array $attributes
     */
    private function syncPositionGroup(DirectoryItem $directoryItem, array $attributes): void
    {
        if (array_key_exists('position_group_ids', $attributes)) {
            $directoryItem->positionGroup()->sync($attributes['position_group_ids']);
        }
    }

    /**
     * Sync the href related with directory item.
     *
     * @param   DirectoryItem $directoryItem
     *
     * @param   array $attributes
     */
    private function syncHrefRelated(DirectoryItem $directoryItem, array $attributes): void
    {
        if (array_key_exists('href_related_ids', $attributes)) {
            $directoryItem->hrefRelated()->wherePivot('type_id', '=', $this->getTypeRelated())
                ->syncWithPivotValues($attributes['href_related_ids'], ['type_id' => $this->getTypeRelated()]);
        }
    }

    /**
     * Sync the href includes kit with directory item.
     *
     * @param   DirectoryItem $directoryItem
     *
     * @param   array $attributes
     */
    private function syncHrefIncludesKit(DirectoryItem $directoryItem, array $attributes): void
    {
        if (array_key_exists('href_kit_ids', $attributes) && $directoryItem->position_collection_id == 1) {
            if ($directoryItem->position_type_id != 1) {
                $allowed = $this->select('id')->whereIn('id', $attributes['href_kit_ids'])
                    ->where('position_type_id', $directoryItem->position_type_id)->pluck('id')->toArray();

                foreach ($attributes['href_kit_ids'] as $key => $value) {
                    if (!in_array($value, $allowed)) {
                        unset($attributes['href_kit_ids'][$key]);
                    }
                }
            }

            $directoryItem->hrefIncludesKit()->wherePivot('type_id', '=', $this->getTypeKit())
                ->syncWithPivotValues($attributes['href_kit_ids'], ['type_id' => $this->getTypeKit()]);
        } elseif ($directoryItem->position_collection_id != 1) {
            $directoryItem->hrefIncludesKit()->wherePivot('type_id', '=', $this->getTypeKit())->detach();
        }
    }

    /**
     * Sync the price list with directory item.
     *
     * @param   DirectoryItem $directoryItem
     *
     * @param   array $attributes
     */
    private function syncPriceList(DirectoryItem $directoryItem, array $attributes): void
    {
        if (isset($attributes['price_list'])) {
            $arr = [];

            $directoryItem->priceList()->delete();

            foreach ($attributes['price_list'] as $attribute) {
                $arr[] = new PriceList($attribute);
            }

            $directoryItem->priceList()->saveMany($arr);
        }
    }

    /**
     * Sync the alternative field with directory item.
     *
     * @param   DirectoryItem $directoryItem
     *
     * @param   array $attributes
     */
    private function syncAlternativeField(DirectoryItem $directoryItem, array $attributes): void
    {
        if (isset($attributes['alternative_field'])) {
            $arr = [];

            $directoryItem->alternativeField()->delete();

            foreach ($attributes['alternative_field'] as $attribute) {
                $arr[] = new DirectoryItemAlternativeField($attribute);
            }

            $directoryItem->alternativeField()->saveMany($arr);
        }
    }
}
