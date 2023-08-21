<?php

namespace App\Containers\DirectoryItemSection\DirectoryItem\Data\Factories;

use App\Ship\Parents\Factories\Factory;
use App\Containers\DirectoryItemSection\PositionType\Models\PositionType;
use App\Containers\DirectoryItemSection\DirectoryItem\Models\DirectoryItem;
use App\Containers\DirectoryItemSection\PositionCollection\Models\PositionCollection;

/**
 * Class DirectoryItemFactory
 *
 * @package App\Containers\DirectoryItemSection\DirectoryItem\Data\Factories
 */
class DirectoryItemFactory extends Factory
{
    /**
     * Hold model.
     *
     * @var string
     */
    protected $model = DirectoryItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        /** @var PositionCollection $positionCollection */
        $positionCollection = PositionCollection::factory()->create();

        /** @var PositionType $positionType */
        $positionType = PositionType::factory()->create();

        return [
            'position_collection_id'    => $positionCollection->id,
            'position_type_id'          => $positionType->id,
            'sku'                       => $this->faker->uuid(),
            'title'                     => $this->faker->name,
            'unit'                      => 'pc',
            'count'                     => 1.2,
            'weight'                    => 1.2,
            'price'                     => $this->faker->randomNumber(),
            'price_up'                  => rand(1, 100),
            'price_customer'            => $this->faker->randomNumber(),
            'is_manual'                 => false,
            'is_explode'                => false,
            'attribute'                 => [],
        ];
    }
}
