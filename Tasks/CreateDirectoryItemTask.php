<?php

namespace App\Containers\DirectoryItemSection\DirectoryItem\Tasks;

use Exception;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Containers\DirectoryItemSection\DirectoryItem\Models\DirectoryItem;
use App\Containers\DirectoryItemSection\DirectoryItem\Dto\CreateDirectoryItemDto;

/**
 * Class CreateDirectoryItemTask
 *
 * @package App\Containers\DirectoryItemSection\DirectoryItem\Tasks
 */
class CreateDirectoryItemTask extends DirectoryItemTask
{
    /**
     * Run action.
     *
     * @param   CreateDirectoryItemDto $data
     *
     * @return  DirectoryItem
     *
     * @throws  CreateResourceFailedException
     */
    public function run(CreateDirectoryItemDto $data): DirectoryItem
    {
        try {
            return $this->repository->create($data->toArray());
        } catch (Exception $exception) {
            throw new CreateResourceFailedException($exception->getMessage());
        }
    }
}
