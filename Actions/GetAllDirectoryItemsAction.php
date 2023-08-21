<?php

namespace App\Containers\DirectoryItemSection\DirectoryItem\Actions;

use App\Ship\Parents\Actions\Action;
use Illuminate\Pagination\LengthAwarePaginator;
use Apiato\Core\Exceptions\CoreInternalErrorException;
use Prettus\Repository\Exceptions\RepositoryException;
use App\Containers\DirectoryItemSection\DirectoryItem\Tasks\GetAllDirectoryItemsTask;

/**
 * Class GetAllDirectoryItemsAction
 *
 * @package App\Containers\DirectoryItemSection\DirectoryItem\Actions
 */
class GetAllDirectoryItemsAction extends Action
{
    /**
     * Action run.
     *
     * @return LengthAwarePaginator
     *
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): LengthAwarePaginator
    {
        return app(GetAllDirectoryItemsTask::class)->addRequestCriteria()->run();
    }
}
