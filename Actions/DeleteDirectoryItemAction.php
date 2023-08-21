<?php

namespace App\Containers\DirectoryItemSection\DirectoryItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Containers\DirectoryItemSection\DirectoryItem\Tasks\DeleteDirectoryItemTask;

/**
 * Class DeleteDirectoryItemAction
 *
 * @package App\Containers\DirectoryItemSection\DirectoryItem\Actions
 */
class DeleteDirectoryItemAction extends Action
{
    /**
     * Action run.
     *
     * @param   int $id
     *
     * @return  int|null
     *
     * @throws  DeleteResourceFailedException
     */
    public function run(int $id): ?int
    {
        return app(DeleteDirectoryItemTask::class)->run($id);
    }
}
