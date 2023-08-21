<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// @codingStandardsIgnoreStart

/**
 * Class CreateDirectoryItemHrefsTable
 */
class CreateDirectoryItemHrefsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->getTableName(), function (Blueprint $table) {
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('directory_item_id');
            $table->unsignedBigInteger('directory_item_to_id');

            $table->foreign('directory_item_id')
                ->references('id')
                ->on(config('directoryItemSection-directoryItem.table.name'))
                ->onDelete('cascade');

            $table->foreign('directory_item_to_id')
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
        return config('directoryItemSection-directoryItem.tableBelongs.hrefs');
    }
}
