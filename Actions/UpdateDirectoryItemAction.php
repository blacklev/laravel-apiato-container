<?php

namespace App\Containers\DirectoryItemSection\DirectoryItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Containers\DirectoryItemSection\DirectoryItem\Models\DirectoryItem;
use App\Containers\DirectoryItemSection\DirectoryItem\Dto\UpdateDirectoryItemDto;
use App\Containers\DirectoryItemSection\DirectoryItem\Tasks\UpdateDirectoryItemTask;

/**
 * Class UpdateDirectoryItemAction
 *
 * @package App\Containers\DirectoryItemSection\DirectoryItem\Actions
 */
class UpdateDirectoryItemAction extends Action
{
    /**
     * Action run.
     *
     * @param   UpdateDirectoryItemDto $data
     *
     * @return  DirectoryItem
     *
     * @throws  UpdateResourceFailedException
     */
    public function run(UpdateDirectoryItemDto $data): DirectoryItem
    {
        return app(UpdateDirectoryItemTask::class)->run($data);
    }
}
