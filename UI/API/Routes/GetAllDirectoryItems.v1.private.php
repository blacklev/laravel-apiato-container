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
 * @apiName            getAllDirectoryItems
 *
 * @api                {GET} /v1/directory-items Get all directory items
 * @apiDescription     Get all directory items
 *                     You can search for directory item by
 *                     `position_collection_id, position_type_id, sku, title, unit, count, weight, price, price_up,
 *                     price_customer, is_manual, is_explode, position_group_id, created_at and ID`.
 *                     Example: `?search=test title` or `?search=2022-01-31`.
 *                     You can specify the field as follow
 *                     `?search=title:Test title`
 *                      or `?search=created_at:2022-01-31`.
 *                     You can search by multiple fields as follow: `?search=created_at:2022-01-30:2022-01-31`.
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiUse             GeneralSuccessMultipleResponse
 */

use Illuminate\Support\Facades\Route;
use App\Containers\DirectoryItemSection\DirectoryItem\UI\API\Controllers\Controller;

Route::get('directory-items', [Controller::class, 'getAllDirectoryItems'])
    ->name('api_directory_item_get_all_directory_items')
    ->middleware(['auth:api']);
