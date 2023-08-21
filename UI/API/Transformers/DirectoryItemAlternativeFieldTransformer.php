<?php

namespace App\Containers\DirectoryItemSection\DirectoryItem\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer;
use App\Containers\DirectoryItemSection\DirectoryItem\Models\DirectoryItemAlternativeField;

/**
 * Class DirectoryItemAlternativeFieldTransformer
 *
 * @package App\Containers\DirectoryItemSection\DirectoryItem\UI\API\Transformers
 */
class DirectoryItemAlternativeFieldTransformer extends Transformer
{
    /**
     * Transform data.
     *
     * @param   DirectoryItemAlternativeField $directoryItemAlternativeField
     *
     * @return  array
     */
    public function transform(DirectoryItemAlternativeField $directoryItemAlternativeField): array
    {
        return [
            'object'            => $directoryItemAlternativeField->getResourceKey(),
            'brand_id'          => $directoryItemAlternativeField->brand_id,
            'directory_item_id' => $directoryItemAlternativeField->directory_item_id,
            'title'             => $directoryItemAlternativeField->title,
        ];
    }
}
