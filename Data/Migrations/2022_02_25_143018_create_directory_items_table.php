<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// @codingStandardsIgnoreStart

/**
 * Class CreateDirectoryItemsTable
 */
class CreateDirectoryItemsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->getTableName(), function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('position_collection_id')->nullable();
            $table->unsignedBigInteger('position_type_id')->nullable();
            $table->string('sku', config('directoryItemSection-directoryItem.table.fields.sku.maxLength'));
            $table->string('title', config('directoryItemSection-directoryItem.table.fields.title.maxLength'));
            $table->string('unit', config('directoryItemSection-directoryItem.table.fields.unit.maxLength'));
            $table->float(
                'count',
                config('directoryItemSection-directoryItem.table.fields.count.maxLengthLeft'),
                config('directoryItemSection-directoryItem.table.fields.count.maxLengthRight')
            )->unsigned();
            $table->float('weight',
                config('directoryItemSection-directoryItem.table.fields.weight.maxLengthLeft'),
                config('directoryItemSection-directoryItem.table.fields.weight.maxLengthRight')
            )->unsigned()->nullable();
            $table->unsignedBigInteger('price');
            $table->float('price_up',
                config('directoryItemSection-directoryItem.table.fields.price_up.maxLengthLeft'),
                config('directoryItemSection-directoryItem.table.fields.price_up.maxLengthRight')
            )->unsigned();
            $table->unsignedBigInteger('price_customer');
            $table->boolean('is_manual')->default(0);
            $table->boolean('is_explode')->default(0);
            $table->json('attribute');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('position_collection_id')->references('id')
                ->on(config('directoryItemSection-positionCollection.table.name'))
                ->onDelete('set null');;

            $table->foreign('position_type_id')->references('id')
                ->on(config('directoryItemSection-positionType.table.name'))
                ->onDelete('set null');;
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
        return config('directoryItemSection-directoryItem.table.name');
    }
}
