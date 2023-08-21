<?php

use App\Ship\Rules\NumericFloat;

$tableName = 'directory_items';

$maxLength = [
    'sku' => 255,
    'title' => 50,
    'unit' => 50,
    'count' => [9, 2],
    'weight' => [9, 6],
    'price_up' => [5, 2],
];

return [
    'table' => [
        'name' => $tableName,
        'fields' => [
            'sku' => [
                'maxLength' => $maxLength['sku'],
            ],
            'title' => [
                'maxLength' => $maxLength['title'],
            ],
            'unit' => [
                'maxLength' => $maxLength['unit'],
            ],
            'count' => [
                'maxLengthLeft'  => $maxLength['count'][0] + $maxLength['count'][1],
                'maxLengthRight' => $maxLength['count'][1],
            ],
            'weight' => [
                'maxLengthLeft'  => $maxLength['weight'][0] + $maxLength['weight'][1],
                'maxLengthRight' => $maxLength['weight'][1],
            ],
            'price_up' => [
                'maxLengthLeft'  => $maxLength['price_up'][0] + $maxLength['price_up'][1],
                'maxLengthRight' => $maxLength['price_up'][1],
            ],
        ],
    ],
    'tableBelongs' => [
        'alternativeFields'             => 'directory_item_alternative_fields',
        'hrefs'                         => 'directory_item_hrefs',
        'positionGroupDirectoryItems'   => 'position_group_directory_items',
        'priceLists'                    => 'price_lists',
    ],
    'rules' => [
        'id' => [
            'required',
            'exists:' . $tableName . ',id'
        ],
        'position_collection_id' => [
            'required',
            'exists:position_collections,id'
        ],
        'position_type_id' => [
            'required',
            'exists:position_types,id'
        ],
        'sku' => [
            'required',
            'min:2',
            'max:' . $maxLength['sku']
        ],
        'title' => [
            'required',
            'min:2',
            'max:' . $maxLength['title']
        ],
        'unit' => [
            'required',
            'min:2',
            'max:' . $maxLength['unit']
        ],
        'count' => [
            'required',
            'numeric',
            new NumericFloat($maxLength['count'][0], $maxLength['count'][1])
        ],
        'weight' => [
            'nullable',
            'numeric',
            new NumericFloat($maxLength['weight'][0], $maxLength['weight'][1])
        ],
        'price' => [
            'required',
            'numeric'
        ],
        'price_up' => [
            'required',
            'numeric',
            new NumericFloat($maxLength['price_up'][0], $maxLength['price_up'][1])
        ],
        'price_customer' => [
            'required',
            'numeric'
        ],
        'is_manual' => ['boolean'],
        'is_explode' => ['boolean'],
        'attribute' => [
            'nullable',
            'array'
        ],
        'position_group_ids' => [
            'nullable',
            'array'
        ],
        'position_group_id' => [
            'required',
            'exists:position_groups,id'
        ],
        'price_list' => [
            'nullable',
            'array'
        ],
        'price_type_id' => [
            'required',
            'exists:price_types,id'
        ],
        'href_kit_ids' => [
            'nullable',
            'array'
        ],
        'href_related_ids' => [
            'nullable',
            'array'
        ],
        'directory_item_id' => [
            'required',
            'different:id',
            'exists:' . $tableName . ',id'
        ],
        'alternative_field' => [
            'nullable',
            'array'
        ],
        'brand_id' => [
            'nullable',
            'exists:brands,id'
        ],
    ],
];
