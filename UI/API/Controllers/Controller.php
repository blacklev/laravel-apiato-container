<?php

namespace App\Containers\DirectoryItemSection\DirectoryItem\UI\API\Controllers;

use Illuminate\Http\JsonResponse;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\CreateResourceFailedException;
use Apiato\Core\Exceptions\CoreInternalErrorException;
use Prettus\Repository\Exceptions\RepositoryException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\DirectoryItemSection\DirectoryItem\Dto\CreateDirectoryItemDto;
use App\Containers\DirectoryItemSection\DirectoryItem\Dto\UpdateDirectoryItemDto;
use App\Containers\DirectoryItemSection\DirectoryItem\Actions\CreateDirectoryItemAction;
use App\Containers\DirectoryItemSection\DirectoryItem\Actions\UpdateDirectoryItemAction;
use App\Containers\DirectoryItemSection\DirectoryItem\Actions\DeleteDirectoryItemAction;
use App\Containers\DirectoryItemSection\DirectoryItem\Actions\GetAllDirectoryItemsAction;
use App\Containers\DirectoryItemSection\DirectoryItem\Actions\FindDirectoryItemByIdAction;
use App\Containers\DirectoryItemSection\DirectoryItem\UI\API\Requests\UpdateDirectoryItemRequest;
use App\Containers\DirectoryItemSection\DirectoryItem\UI\API\Requests\CreateDirectoryItemRequest;
use App\Containers\DirectoryItemSection\DirectoryItem\UI\API\Requests\DeleteDirectoryItemRequest;
use App\Containers\DirectoryItemSection\DirectoryItem\UI\API\Requests\GetAllDirectoryItemsRequest;
use App\Containers\DirectoryItemSection\DirectoryItem\UI\API\Requests\FindDirectoryItemByIdRequest;
use App\Containers\DirectoryItemSection\DirectoryItem\UI\API\Transformers\DirectoryItemTransformer;

/**
 * Class Controller
 *
 * @package App\Containers\DirectoryItemSection\DirectoryItem\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * Action create directory item.
     *
     * @param   CreateDirectoryItemRequest $request
     *
     * @return  JsonResponse
     *
     * @throws  InvalidTransformerException
     * @throws  CreateResourceFailedException
     */
    public function createDirectoryItem(CreateDirectoryItemRequest $request): JsonResponse
    {
        $data = new CreateDirectoryItemDto($request->all());
        $directoryItem = app(CreateDirectoryItemAction::class)->run($data);
        return $this->created($this->transform($directoryItem, DirectoryItemTransformer::class));
    }

    /**
     * Action find directory item by id.
     *
     * @param   FindDirectoryItemByIdRequest $request
     *
     * @return  JsonResponse
     *
     * @throws  InvalidTransformerException
     * @throws  NotFoundException
     */
    public function findDirectoryItemById(FindDirectoryItemByIdRequest $request): JsonResponse
    {
        $directoryItem = app(FindDirectoryItemByIdAction::class)->run((int) $request->id);
        return $this->json($this->transform($directoryItem, DirectoryItemTransformer::class));
    }

    /**
     * Action get all directory items.
     *
     * @param   GetAllDirectoryItemsRequest $request
     *
     * @return  JsonResponse
     *
     * @throws  CoreInternalErrorException
     * @throws  InvalidTransformerException
     * @throws  RepositoryException
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter) $request used but not visible
     */
    public function getAllDirectoryItems(GetAllDirectoryItemsRequest $request): JsonResponse
    {
        $directoryItems = app(GetAllDirectoryItemsAction::class)->run();
        return $this->json($this->transform($directoryItems, DirectoryItemTransformer::class));
    }

    /**
     * Action update directory item.
     *
     * @param   UpdateDirectoryItemRequest $request
     *
     * @return  JsonResponse
     *
     * @throws  InvalidTransformerException
     * @throws  UpdateResourceFailedException
     */
    public function updateDirectoryItem(UpdateDirectoryItemRequest $request): JsonResponse
    {
        $data = new UpdateDirectoryItemDto($request->all());
        $directoryItem = app(UpdateDirectoryItemAction::class)->run($data);
        return $this->json($this->transform($directoryItem, DirectoryItemTransformer::class));
    }

    /**
     * Action delete directory item.
     *
     * @param   DeleteDirectoryItemRequest $request
     *
     * @return  JsonResponse
     *
     * @throws  DeleteResourceFailedException
     */
    public function deleteDirectoryItem(DeleteDirectoryItemRequest $request): JsonResponse
    {
        app(DeleteDirectoryItemAction::class)->run((int) $request->id);
        return $this->noContent();
    }
}
