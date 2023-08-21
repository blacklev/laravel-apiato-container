<?php

namespace App\Containers\DirectoryItemSection\DirectoryItem\Tasks;

use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class GetAllDirectoryItemsTask
 *
 * @package App\Containers\DirectoryItemSection\DirectoryItem\Tasks
 */
class GetAllDirectoryItemsTask extends DirectoryItemTask
{
    /**
     * Run action.
     *
     * @return LengthAwarePaginator
     */
    public function run(): LengthAwarePaginator
    {
        return $this->repository->paginate();
    }
}
