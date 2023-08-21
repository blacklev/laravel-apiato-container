<?php

namespace App\Containers\DirectoryItemSection\DirectoryItem\Tasks;

use Exception;
use App\Ship\Exceptions\NotFoundException;
use App\Containers\DirectoryItemSection\DirectoryItem\Models\DirectoryItem;

/**
 * Class FindDirectoryItemByIdTask
 *
 * @package App\Containers\DirectoryItemSection\DirectoryItem\Tasks
 */
class FindDirectoryItemByIdTask extends DirectoryItemTask
{
    /**
     * Run action.
     *
     * @param   int $id
     *
     * @return  DirectoryItem
     *
     * @throws  NotFoundException
     */
    public function run(int $id): DirectoryItem
    {
        try {
            return $this->repository->find($id);
        } catch (Exception $exception) {
            throw new NotFoundException($exception->getMessage());
        }
    }
}
