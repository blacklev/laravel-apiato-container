<?php

namespace App\Containers\DirectoryItemSection\DirectoryItem\Dto;

use App\Ship\Parents\Dto\Dto;

/**
 * Class CreateDirectoryItemDto
 *
 * @package App\Containers\DirectoryItemSection\DirectoryItem\Dto
 *
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class CreateDirectoryItemDto extends Dto
{
    public ?int $position_collection_id;
    public ?int $position_type_id;
    public ?string $sku;
    public ?string $title;
    public ?string $unit;
    public ?float $count;
    public ?float $weight;
    public ?float $price;
    public ?float $price_up;
    public ?float $price_customer;
    public bool $is_manual = false;
    public bool $is_explode = false;
    public array $attribute = [];
    public array $position_group_ids = [];
    public array $price_list = [];
    public array $href_kit_ids = [];
    public array $href_related_ids = [];
    public array $alternative_field = [];
}
