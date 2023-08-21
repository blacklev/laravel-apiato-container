<?php

namespace App\Containers\DirectoryItemSection\DirectoryItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Containers\DirectoryItemSection\DirectoryItem\Models\DirectoryItem;
use App\Containers\DirectoryItemSection\DirectoryItem\Dto\CreateDirectoryItemDto;
use App\Containers\DirectoryItemSection\DirectoryItem\Tasks\CreateDirectoryItemTask;

/**
 * Class CreateDirectoryItemAction
 *
 * @package App\Containers\DirectoryItemSection\DirectoryItem\Actions
 */
class CreateDirectoryItemAction extends Action
{
    /**
     * Action run.
     *
     * @param   CreateDirectoryItemDto $data
     *
     * @return  DirectoryItem
     *
     * @throws  CreateResourceFailedException
     */
    public function run(CreateDirectoryItemDto $data): DirectoryItem
    {
        return app(CreateDirectoryItemTask::class)->run($data);
    }
}
