<?php
/*
 *
 *  * Copyright (C) 2015 eveR Vásquez.
 *  *
 *  * Licensed under the Apache License, Version 2.0 (the "License");
 *  * you may not use this file except in compliance with the License.
 *  * You may obtain a copy of the License at
 *  *
 *  *      http://www.apache.org/licenses/LICENSE-2.0
 *  *
 *  * Unless required by applicable law or agreed to in writing, software
 *  * distributed under the License is distributed on an "AS IS" BASIS,
 *  * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  * See the License for the specific language governing permissions and
 *  * limitations under the License.
 *
 */

Route::get('home', array(
    'as'     => 'landpage.home',
    'uses'   => 'Mobytes\Landpage\Controllers\LandPageController@home'
));

//Route::post('permissions', array(
//    'as'     => 'cpanel.permissions.store',
//    'uses'   => 'Stevemo\Cpanel\Controllers\PermissionsController@store',
//    'before' => 'auth.cpanel'
//));