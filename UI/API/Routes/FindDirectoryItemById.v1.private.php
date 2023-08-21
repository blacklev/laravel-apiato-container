<?php

/**
 * ERP system
 *
 * This file is part of the ERM system package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license    Proprietary
 * @copyright  Copyright (C) zemlechist.ru, All rights reserved.
 * @link       https://zemlechist.ru
 *
 * @apiGroup           DirectoryItem
 * @apiName            findDirectoryItemById
 *
 * @api                {GET} /v1/directory-items/:id Find directory item
 * @apiDescription     Find a directory item by its ID
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiUse             DirectoryItemSuccessSingleResponse
 */

use Illuminate\Support\Facades\Route;
use App\Containers\DirectoryItemSection\DirectoryItem\UI\API\Controllers\Controller;

Route::get('directory-items/{id}', [Controller::class, 'findDirectoryItemById'])
    ->name('api_directory_item_find_directory_item_by_id')
    ->middleware(['auth:api']);
