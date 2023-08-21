<?php

namespace App\Containers\DirectoryItemSection\DirectoryItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Exceptions\NotFoundException;
use App\Containers\DirectoryItemSection\DirectoryItem\Models\DirectoryItem;
use App\Containers\DirectoryItemSection\DirectoryItem\Tasks\FindDirectoryItemByIdTask;

/**
 * Class FindDirectoryItemByIdAction
 *
 * @package App\Containers\DirectoryItemSection\DirectoryItem\Actions
 */
class FindDirectoryItemByIdAction extends Action
{
    /**
     * Action run.
     *
     * @param   int $id
     *
     * @return  DirectoryItem
     *
     * @throws  NotFoundException
     */
    public function run(int $id): DirectoryItem
    {
        return app(FindDirectoryItemByIdTask::class)->run($id);
    }
}
