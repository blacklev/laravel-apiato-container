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
 * @apiName            createDirectoryItem
 * @api                {POST} /v1/directory-items Create directory item
 * @apiDescription     Create new directory item.
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {Number}                             position_collection_id
 * @apiParam           {Number}                             position_type_id
 * @apiParam           {String{2..255}}                     sku
 * @apiParam           {String{2..50}}                      title
 * @apiParam           {String{2..50}}                      unit
 * @apiParam           {Float{0.00, 999999999.99}}          count
 * @apiParam           {Float{0.000000, 999999999.999999}}  [weight="null"]
 * @apiParam           {Number}                             price
 * @apiParam           {Float{0.00, 99999.99}}              price_up
 * @apiParam           {Number}                             price_customer
 * @apiParam           {Boolean="false,true"}               [is_manual="false"]
 * @apiParam           {Boolean="false,true"}               [is_explode="false"]
 * @apiParam           {Array}                              [attribute]
 *
 * @apiUse             DirectoryItemSuccessSingleResponse
 */

use Illuminate\Support\Facades\Route;
use App\Containers\DirectoryItemSection\DirectoryItem\UI\API\Controllers\Controller;

Route::post('directory-items', [Controller::class, 'createDirectoryItem'])
    ->name('api_directory_item_create_directory_item')
    ->middleware(['auth:api']);
