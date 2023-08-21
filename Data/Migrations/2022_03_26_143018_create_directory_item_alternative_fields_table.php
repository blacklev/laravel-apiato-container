<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// @codingStandardsIgnoreStart

/**
 * Class CreateDirectoryItemAlternativeFieldsTable
 */
class CreateDirectoryItemAlternativeFieldsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->getTableName(), function (Blueprint $table) {
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('directory_item_id');
            $table->string('title', 50);

            $table->foreign('brand_id')
                ->references('id')
                ->on(config('directoryItemSection-brand.table.name'))
                ->onDelete('cascade');

            $table->foreign('directory_item_id')
                ->references('id')
                ->on(config('directoryItemSection-directoryItem.table.name'))
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
        return config('directoryItemSection-directoryItem.tableBelongs.alternativeFields');
    }
}
