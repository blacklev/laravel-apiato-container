<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// @codingStandardsIgnoreStart

/**
 * Class CreatePriceListsTable
 */
class CreatePriceListsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->getTableName(), function (Blueprint $table) {
            $table->unsignedBigInteger('directory_item_id');
            $table->unsignedBigInteger('price_type_id');
            $table->unsignedBigInteger('price');
            $table->float('price_up', 7, 2);
            $table->unsignedBigInteger('price_customer');

            $table->foreign('directory_item_id')
                ->references('id')
                ->on(config('directoryItemSection-directoryItem.table.name'))
                ->onDelete('cascade');

            $table->foreign('price_type_id')
                ->references('id')
                ->on(config('directoryItemSection-priceType.table.name'))
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->getTableName());
    }

    /**
     * Get table name.
     *
     * @return string
     */
    public function getTableName(): string
    {
        return config('directoryItemSection-directoryItem.tableBelongs.priceLists');
    }
}
