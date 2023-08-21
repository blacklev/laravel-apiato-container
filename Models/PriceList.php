<?php

namespace App\Containers\DirectoryItemSection\DirectoryItem\Models;

use App\Ship\Database\Casts\Price;
use App\Ship\Parents\Models\Model;

/**
 * Class PriceList
 *
 * @property    int    $price_type_id
 * @property    int    $directory_item_id
 * @property    int    $price
 * @property    float  $price_up
 * @property    int    $price_customer
 *
 * @package     App\Containers\DirectoryItemSection\DirectoryItem\Models
 */
class PriceList extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'directory_item_id',
        'price_type_id',
        'price',
        'price_up',
        'price_customer',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'directory_item_id' => 'integer',
        'price_type_id'     => 'integer',
        'price'             => Price::class,
        'price_up'          => 'float',
        'price_customer'    => Price::class,
    ];
}
