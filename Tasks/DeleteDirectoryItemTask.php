<?php

namespace App\Containers\DirectoryItemSection\DirectoryItem\Tasks;

use Exception;
use App\Ship\Exceptions\DeleteResourceFailedException;

/**
 * Class DeleteDirectoryItemTask
 *
 * @package App\Containers\DirectoryItemSection\DirectoryItem\Tasks
 */
class DeleteDirectoryItemTask extends DirectoryItemTask
{
    /**
     * Run action.
     *
     * @param   int $id
     *
     * @return  int|null
     *
     * @throws  DeleteResourceFailedException
     */
    public function run(int $id): ?int
    {
        try {
            return $this->repository->delete($id);
        } catch (Exception $exception) {
            throw new DeleteResourceFailedException($exception->getMessage());
        }
    }
}
