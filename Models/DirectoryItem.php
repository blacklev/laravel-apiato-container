<?php

namespace App\Containers\DirectoryItemSection\DirectoryItem\Models;

use Illuminate\Support\Carbon;
use App\Ship\Database\Casts\JSON;
use App\Ship\Parents\Models\Model;
use App\Ship\Database\Casts\Price;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Containers\DirectoryItemSection\PositionType\Models\PositionType;
use App\Containers\DirectoryItemSection\PositionGroup\Models\PositionGroup;
use App\Containers\DirectoryItemSection\DirectoryItem\Traits\TypeDirectoryItemHref;
use App\Containers\DirectoryItemSection\PositionCollection\Models\PositionCollection;

/**
 * Class DirectoryItem
 *
 * @property    int                            $id
 * @property    int                            $position_collection_id
 * @property    int                            $position_type_id
 * @property    string                         $sku
 * @property    string                         $title
 * @property    string                         $unit
 * @property    float                          $count
 * @property    float                          $weight
 * @property    int                            $price
 * @property    float                          $price_up
 * @property    int                            $price_customer
 * @property    bool                           $is_manual
 * @property    bool                           $is_explode
 * @property    JSON                           $attribute
 * @property    Carbon                         $created_at
 * @property    Carbon                         $updated_at
 * @property    Carbon                         $deleted_at
 * @property    PositionCollection             $positionCollection;
 * @property    PositionType                   $positionType;
 * @property    PositionGroup                  $positionGroup
 * @property    PriceList                      $priceList
 * @property    DirectoryItem                  $hrefInKit
 * @property    DirectoryItem                  $hrefIncludesKit
 * @property    DirectoryItem                  $hrefRelated
 * @property    DirectoryItemAlternativeField  $alternativeField
 *
 * @package     App\Containers\DirectoryItemSection\DirectoryItem\Models
 */
class DirectoryItem extends Model
{
    use SoftDeletes;
    use TypeDirectoryItemHref;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'position_collection_id',
        'position_type_id',
        'sku',
        'title',
        'unit',
        'count',
        'weight',
        'price',
        'price_up',
        'price_customer',
        'is_manual',
        'is_explode',
        'attribute',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'id'                     => 'integer',
        'position_collection_id' => 'integer',
        'position_type_id'       => 'integer',
        'sku'                    => 'string',
        'title'                  => 'string',
        'unit'                   => 'string',
        'count'                  => 'float',
        'weight'                 => 'float',
        'price'                  => Price::class,
        'price_up'               => 'float',
        'price_customer'         => Price::class,
        'is_manual'              => 'boolean',
        'is_explode'             => 'boolean',
        'attribute'              => JSON::class,
    ];

    /**
     * Setup position collection as belongs to.
     *
     * @return BelongsTo
     */
    public function positionCollection(): BelongsTo
    {
        return $this->belongsTo(PositionCollection::class, 'position_collection_id', 'id');
    }

    /**
     * Setup position type as belongs to.
     *
     * @return BelongsTo
     */
    public function positionType(): BelongsTo
    {
        return $this->belongsTo(PositionType::class, 'position_type_id', 'id');
    }

    /**
     * Setup position group directory item as belongs to many.
     *
     * @return BelongsToMany
     */
    public function positionGroup(): BelongsToMany
    {
        return $this->belongsToMany(
            PositionGroup::class,
            config('directoryItemSection-directoryItem.tableBelongs.positionGroupDirectoryItems'),
            'directory_item_id',
            'position_group_id'
        );
    }

    /**
     * Setup price list as has many.
     *
     * @return HasMany
     */
    public function priceList(): HasMany
    {
        return $this->hasMany(PriceList::class, 'directory_item_id', 'id');
    }

    /**
     * Setup directory item href in kit as belongs to many.
     *
     * @return  BelongsToMany
     */
    public function hrefInKit(): BelongsToMany
    {
        return $this->belongsToMany(
            self::class,
            config('directoryItemSection-directoryItem.tableBelongs.hrefs'),
            'directory_item_id',
            'directory_item_to_id'
        )->where(
            config('directoryItemSection-directoryItem.tableBelongs.hrefs') . '.type_id',
            '=',
            $this->getTypeKit()
        );
    }

    /**
     * Setup directory item href includes kit as belongs to many.
     *
     * @return  BelongsToMany
     */
    public function hrefIncludesKit(): BelongsToMany
    {
        return $this->belongsToMany(
            self::class,
            config('directoryItemSection-directoryItem.tableBelongs.hrefs'),
            'directory_item_to_id',
            'directory_item_id'
        )->where(
            config('directoryItemSection-directoryItem.tableBelongs.hrefs') . '.type_id',
            '=',
            $this->getTypeKit()
        );
    }

    /**
     * Setup directory item href related as belongs to many.
     *
     * @return  BelongsToMany
     */
    public function hrefRelated(): BelongsToMany
    {
        return $this->belongsToMany(
            self::class,
            config('directoryItemSection-directoryItem.tableBelongs.hrefs'),
            'directory_item_to_id',
            'directory_item_id'
        )->where(
            config('directoryItemSection-directoryItem.tableBelongs.hrefs') . '.type_id',
            '=',
            $this->getTypeRelated()
        );
    }

    /**
     * Setup directory item alternative field as has many.
     *
     * @return HasMany
     */
    public function alternativeField(): HasMany
    {
        return $this->hasMany(DirectoryItemAlternativeField::class, 'directory_item_id', 'id');
    }
}
