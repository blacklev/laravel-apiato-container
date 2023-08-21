<?php

namespace App\Containers\DirectoryItemSection\DirectoryItem\Tasks;

use Exception;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Containers\DirectoryItemSection\DirectoryItem\Models\DirectoryItem;
use App\Containers\DirectoryItemSection\DirectoryItem\Dto\UpdateDirectoryItemDto;

/**
 * Class UpdateDirectoryItemTask
 *
 * @package App\Containers\DirectoryItemSection\DirectoryItem\Tasks
 */
class UpdateDirectoryItemTask extends DirectoryItemTask
{
    /**
     * Run action.
     *
     * @param   UpdateDirectoryItemDto $data
     *
     * @return  DirectoryItem
     *
     * @throws  UpdateResourceFailedException
     */
    public function run(UpdateDirectoryItemDto $data): DirectoryItem
    {
        try {
            return $this->repository->update($data->toArray(true), $data->id);
        } catch (Exception $exception) {
            throw new UpdateResourceFailedException($exception->getMessage());
        }
    }
}
