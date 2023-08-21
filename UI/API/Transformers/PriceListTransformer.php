<?php

namespace App\Containers\DirectoryItemSection\DirectoryItem\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer;
use App\Containers\DirectoryItemSection\DirectoryItem\Models\PriceList;

/**
 * Class PriceListTransformer
 *
 * @package App\Containers\DirectoryItemSection\DirectoryItem\UI\API\Transformers
 */
class PriceListTransformer extends Transformer
{
    /**
     * Transform data.
     *
     * @param   PriceList $priceList
     *
     * @return  array
     */
    public function transform(PriceList $priceList): array
    {
        return [
            'object'            => $priceList->getResourceKey(),
            'price_type_id'     => $priceList->price_type_id,
            'directory_item_id' => $priceList->directory_item_id,
            'price'             => $priceList->price,
            'price_up'          => $priceList->price_up,
            'price_customer'    => $priceList->price_customer,
        ];
    }
}
