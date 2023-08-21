<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// @codingStandardsIgnoreStart

/**
 * Class CreatePositionGroupDirectoryItemTable
 */
class CreatePositionGroupDirectoryItemsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->getTableName(), function (Blueprint $table) {
            $table->unsignedBigInteger('directory_item_id');
            $table->unsignedBigInteger('position_group_id');

            $table->foreign('directory_item_id')
                ->references('id')
                ->on(config('directoryItemSection-directoryItem.table.name'))
                ->onDelete('cascade');

            $table->foreign('position_group_id')
                ->references('id')
                ->on(config('directoryItemSection-positionGroup.table.name'))
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
        return config('directoryItemSection-directoryItem.tableBelongs.positionGroupDirectoryItems');
    }
}
