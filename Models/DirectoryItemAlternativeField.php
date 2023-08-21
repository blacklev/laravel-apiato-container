<?php

namespace App\Containers\DirectoryItemSection\DirectoryItem\Models;

use App\Ship\Parents\Models\Model;

/**
 * Class DirectoryItemAlternativeField
 *
 * @property    int        $brand_id
 * @property    int        $directory_item_id
 * @property    string     $title
 *
 * @package     App\Containers\DirectoryItemSection\DirectoryItem\Models
 */
class DirectoryItemAlternativeField extends Model
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
        'brand_id',
        'directory_item_id',
        'title',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'brand_id'          => 'integer',
        'directory_item_id' => 'integer',
        'title'             => 'string',
    ];
}
