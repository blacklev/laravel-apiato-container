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
 * @apiName            deleteDirectoryItem
 *
 * @api                {DELETE} /v1/directory-items/:id Delete directory item
 * @apiDescription     Delete directory item by ID
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiSuccessExample  {json}  Success-Response:
HTTP/1.1 204 No content
 */

use Illuminate\Support\Facades\Route;
use App\Containers\DirectoryItemSection\DirectoryItem\UI\API\Controllers\Controller;

Route::delete('directory-items/{id}', [Controller::class, 'deleteDirectoryItem'])
    ->name('api_directory_item_delete_directory_item')
    ->middleware(['auth:api']);
