<?php

namespace App\Containers\DirectoryItemSection\DirectoryItem\Tasks;

use App\Ship\Parents\Tasks\Task;
use App\Containers\DirectoryItemSection\DirectoryItem\Data\Repositories\DirectoryItemRepository;

/**
 * Class DirectoryItemTask
 *
 * @package App\Containers\DirectoryItemSection\DirectoryItem\Tasks
 */
abstract class DirectoryItemTask extends Task
{
    /**
     * Hold repository.
     *
     * @var DirectoryItemRepository
     */
    protected DirectoryItemRepository $repository;

    /**
     * CreateDirectoryItemTask constructor.
     *
     * @param DirectoryItemRepository $repository
     */
    public function __construct(DirectoryItemRepository $repository)
    {
        $this->repository = $repository;
    }
}
