<?php

namespace App\Containers\DirectoryItemSection\DirectoryItem\UI\API\Transformers;

use League\Fractal\Resource\Item;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\NullResource;
use App\Ship\Parents\Transformers\Transformer;
use App\Containers\DirectoryItemSection\DirectoryItem\Models\DirectoryItem;
use App\Containers\DirectoryItemSection\PositionType\UI\API\Transformers\PositionTypeTransformer;
use App\Containers\DirectoryItemSection\PositionGroup\UI\API\Transformers\PositionGroupTransformer;
use App\Containers\DirectoryItemSection\PositionCollection\UI\API\Transformers\PositionCollectionTransformer;

/**
 * Class DirectoryItemTransformer
 *
 * @package App\Containers\DirectoryItemSection\DirectoryItem\UI\API\Transformers
 */
class DirectoryItemTransformer extends Transformer
{
    /**
     * Resources that can be included if requested.
     *
     * @var  array
     */
    protected array $availableIncludes = [
        'positionCollection',
        'positionType',
        'positionGroup',
        'priceList',
        'hrefInKit',
        'hrefIncludesKit',
        'hrefRelated',
        'alternativeField',
    ];

    /**
     * Transform data.
     *
     * @param   DirectoryItem $directoryItem
     *
     * @return  array
     */
    public function transform(DirectoryItem $directoryItem): array
    {
        $response = [
            'object'                    => $directoryItem->getResourceKey(),
            'id'                        => $directoryItem->getHashedKey(),
            'position_collection_id'    => $directoryItem->position_collection_id,
            'position_type_id'          => $directoryItem->position_type_id,
            'sku'                       => $directoryItem->sku,
            'title'                     => $directoryItem->title,
            'unit'                      => $directoryItem->unit,
            'count'                     => $directoryItem->count,
            'weight'                    => $directoryItem->weight,
            'price'                     => $directoryItem->price,
            'price_up'                  => $directoryItem->price_up,
            'price_customer'            => $directoryItem->price_customer,
            'is_manual'                 => $directoryItem->is_manual,
            'is_explode'                => $directoryItem->is_explode,
            'attribute'                 => $directoryItem->attribute,
            'created_at'                => $directoryItem->created_at->timestamp,
            'updated_at'                => $directoryItem->updated_at->timestamp,
        ];

        return $this->ifAdmin([
            'real_id'       => $directoryItem->id,
        ], $response);
    }

    /**
     * Include position collection.
     *
     * @param   DirectoryItem $directoryItem
     *
     * @return  NullResource|Item
     */
    public function includePositionCollection(DirectoryItem $directoryItem): NullResource|Item
    {
        return $this->single($directoryItem->positionCollection, new PositionCollectionTransformer());
    }

    /**
     * Include position type.
     *
     * @param   DirectoryItem $directoryItem
     *
     * @return  NullResource|Item
     */
    public function includePositionType(DirectoryItem $directoryItem): NullResource|Item
    {
        return $this->single($directoryItem->positionType, new PositionTypeTransformer());
    }

    /**
     * Include position group directory item.
     *
     * @param   DirectoryItem $directoryItem
     *
     * @return  Collection
     */
    public function includePositionGroup(DirectoryItem $directoryItem): Collection
    {
        return $this->collection(
            $directoryItem->positionGroup,
            new PositionGroupTransformer()
        );
    }

    /**
     * Include price list.
     *
     * @param   DirectoryItem $directoryItem
     *
     * @return  Collection
     */
    public function includePriceList(DirectoryItem $directoryItem): Collection
    {
        return $this->collection(
            $directoryItem->priceList,
            new PriceListTransformer()
        );
    }

    /**
     * Include directory item href in kit.
     *
     * @param   DirectoryItem $directoryItem
     *
     * @return  Collection
     */
    public function includeHrefInKit(DirectoryItem $directoryItem): Collection
    {
        return $this->collection(
            $directoryItem->hrefInKit,
            new self()
        );
    }

    /**
     * Include directory item href includes kit.
     *
     * @param   DirectoryItem $directoryItem
     *
     * @return  Collection
     */
    public function includeHrefIncludesKit(DirectoryItem $directoryItem): Collection
    {
        return $this->collection(
            $directoryItem->hrefIncludesKit,
            new self()
        );
    }

    /**
     * Include directory item href related.
     *
     * @param   DirectoryItem $directoryItem
     *
     * @return  Collection
     */
    public function includeHrefRelated(DirectoryItem $directoryItem): Collection
    {
        return $this->collection(
            $directoryItem->hrefRelated,
            new self()
        );
    }

    /**
     * Include directory item alternative field.
     *
     * @param   DirectoryItem $directoryItem
     *
     * @return  Collection
     */
    public function includeAlternativeField(DirectoryItem $directoryItem): Collection
    {
        return $this->collection(
            $directoryItem->alternativeField,
            new DirectoryItemAlternativeFieldTransformer()
        );
    }
}
