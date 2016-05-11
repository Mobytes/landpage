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

/**
 * Publicaciones
 **/

Route::group(array('prefix' => Config::get('landpage::prefix', 'admin')), function()
{
    //Noticias
    Route::get('noticias', array(
        'as'     => 'landpage.noticias',
        'uses'   => 'Mobytes\Landpage\Controllers\NoticeController@index',
        'before' => 'auth.landpage'
    ));

    Route::post('noticias', array(
        'as'     => 'landpage.noticias.store',
        'uses'   => 'Mobytes\Landpage\Controllers\NoticeController@store',
        'before' => 'auth.landpage'
    ));

    Route::get('noticias/create', array(
        'as'     => 'landpage.noticias.create',
        'uses'   => 'Mobytes\Landpage\Controllers\NoticeController@create',
        'before' => 'auth.landpage'
    ));

    Route::get('noticias/{id}', array(
        'as'     => 'landpage.noticias.show',
        'uses'   => 'Mobytes\Landpage\Controllers\NoticeController@show',
        'before' => 'auth.landpage'
    ));

    Route::get('noticias/{id}/edit', array(
        'as'     => 'landpage.noticias.edit',
        'uses'   => 'Mobytes\Landpage\Controllers\NoticeController@edit',
        'before' => 'auth.landpage'
    ));

    Route::put('noticias/{id}', array(
        'as'     => 'landpage.noticias.update',
        'uses'   => 'Mobytes\Landpage\Controllers\NoticeController@update',
        'before' => 'auth.landpage'
    ));

    Route::delete('noticias/{id}', array(
        'as'     => 'landpage.noticias.destroy',
        'uses'   => 'Mobytes\Landpage\Controllers\NoticeController@destroy',
        'before' => 'auth.landpage'
    ));

    Route::post('noticias/upload', array(
        'as'     => 'landpage.noticias.upload',
        'uses'   => 'Mobytes\Landpage\Controllers\MediaController@uploadImageNotice',
        'before' => 'auth.landpage'
    ));

    //Publicaciones
    Route::get('publicaciones', array(
        'as'     => 'landpage.publicaciones',
        'uses'   => 'Mobytes\Landpage\Controllers\PublicationController@index',
        'before' => 'auth.landpage'
    ));

    Route::post('publicaciones', array(
        'as'     => 'landpage.publicaciones.store',
        'uses'   => 'Mobytes\Landpage\Controllers\PublicationController@store',
        'before' => 'auth.landpage'
    ));

    Route::get('publicaciones/create', array(
        'as'     => 'landpage.publicaciones.create',
        'uses'   => 'Mobytes\Landpage\Controllers\PublicationController@create',
        'before' => 'auth.landpage'
    ));

    Route::get('publicaciones/{id}', array(
        'as'     => 'landpage.publicaciones.show',
        'uses'   => 'Mobytes\Landpage\Controllers\PublicationController@show',
        'before' => 'auth.landpage'
    ));

    Route::get('publicaciones/{id}/edit', array(
        'as'     => 'landpage.publicaciones.edit',
        'uses'   => 'Mobytes\Landpage\Controllers\PublicationController@edit',
        'before' => 'auth.landpage'
    ));

    Route::put('publicaciones/{id}', array(
        'as'     => 'landpage.publicaciones.update',
        'uses'   => 'Mobytes\Landpage\Controllers\PublicationController@update',
        'before' => 'auth.landpage'
    ));

    Route::delete('publicaciones/{id}', array(
        'as'     => 'landpage.publicaciones.destroy',
        'uses'   => 'Mobytes\Landpage\Controllers\PublicationController@destroy',
        'before' => 'auth.landpage'
    ));

    Route::post('publicaciones/upload', array(
        'as'     => 'landpage.publicaciones.upload',
        'uses'   => 'Mobytes\Landpage\Controllers\MediaController@uploadImagePublication',
        'before' => 'auth.landpage'
    ));

    //Proyectos
    Route::get('proyectos', array(
        'as'     => 'landpage.proyectos',
        'uses'   => 'Mobytes\Landpage\Controllers\ProjectController@index',
        'before' => 'auth.landpage'
    ));

    Route::post('proyectos', array(
        'as'     => 'landpage.proyectos.store',
        'uses'   => 'Mobytes\Landpage\Controllers\ProjectController@store',
        'before' => 'auth.landpage'
    ));

    Route::get('proyectos/create', array(
        'as'     => 'landpage.proyectos.create',
        'uses'   => 'Mobytes\Landpage\Controllers\ProjectController@create',
        'before' => 'auth.landpage'
    ));

    Route::get('proyectos/{id}', array(
        'as'     => 'landpage.proyectos.show',
        'uses'   => 'Mobytes\Landpage\Controllers\ProjectController@show',
        'before' => 'auth.landpage'
    ));

    Route::get('proyectos/{id}/edit', array(
        'as'     => 'landpage.proyectos.edit',
        'uses'   => 'Mobytes\Landpage\Controllers\ProjectController@edit',
        'before' => 'auth.landpage'
    ));

    Route::put('proyectos/{id}', array(
        'as'     => 'landpage.proyectos.update',
        'uses'   => 'Mobytes\Landpage\Controllers\ProjectController@update',
        'before' => 'auth.landpage'
    ));

    Route::delete('proyectos/{id}', array(
        'as'     => 'landpage.proyectos.destroy',
        'uses'   => 'Mobytes\Landpage\Controllers\ProjectController@destroy',
        'before' => 'auth.landpage'
    ));

    Route::post('proyectos/upload', array(
        'as'     => 'landpage.proyectos.upload',
        'uses'   => 'Mobytes\Landpage\Controllers\MediaController@uploadImageFileProject',
        'before' => 'auth.landpage'
    ));

    //Organization
    Route::get('organizacion', array(
        'as'     => 'landpage.organizacion',
        'uses'   => 'Mobytes\Landpage\Controllers\OrganizationController@index',
        'before' => 'auth.landpage'
    ));

    Route::post('organizacion', array(
        'as'     => 'landpage.organizacion.store',
        'uses'   => 'Mobytes\Landpage\Controllers\OrganizationController@store',
        'before' => 'auth.landpage'
    ));

    //Objetivos
    Route::get('organizacion/objetivos', array(
        'as'     => 'landpage.objetivos',
        'uses'   => 'Mobytes\Landpage\Controllers\ObjectiveController@index',
        'before' => 'auth.landpage'
    ));

    Route::post('organizacion/objetivos', array(
        'as'     => 'landpage.objetivos.store',
        'uses'   => 'Mobytes\Landpage\Controllers\ObjectiveController@store',
        'before' => 'auth.landpage'
    ));

    Route::get('organizacion/objetivos/create', array(
        'as'     => 'landpage.objetivos.create',
        'uses'   => 'Mobytes\Landpage\Controllers\ObjectiveController@create',
        'before' => 'auth.landpage'
    ));

    Route::get('organizacion/objetivos/{id}', array(
        'as'     => 'landpage.objetivos.show',
        'uses'   => 'Mobytes\Landpage\Controllers\ObjectiveController@show',
        'before' => 'auth.landpage'
    ));

    Route::get('organizacion/objetivos/{id}/edit', array(
        'as'     => 'landpage.objetivos.edit',
        'uses'   => 'Mobytes\Landpage\Controllers\ObjectiveController@edit',
        'before' => 'auth.landpage'
    ));

    Route::put('organizacion/objetivos/{id}', array(
        'as'     => 'landpage.objetivos.update',
        'uses'   => 'Mobytes\Landpage\Controllers\ObjectiveController@update',
        'before' => 'auth.landpage'
    ));

    Route::delete('organizacion/objetivos/{id}', array(
        'as'     => 'landpage.objetivos.destroy',
        'uses'   => 'Mobytes\Landpage\Controllers\ObjectiveController@destroy',
        'before' => 'auth.landpage'
    ));
});

/*
|--------------------------------------------------------------------------
| Admin auth filter
|--------------------------------------------------------------------------
| You need to give your routes a name before using this filter.
| I assume you are using resource. so the route for the UsersController index method
| will be admin.users.index then the filter will look for permission on users.view
| You can provide your own rule by passing a argument to the filter
|
*/
Route::filter('auth.landpage', function($route, $request, $userRule = null)
{
    if (! Sentry::check())
    {
        Session::put('url.intended', URL::full());
        return Redirect::route('cpanel.login');
    }

    // no special route name passed, use the current name route
    if ( is_null($userRule) )
    {
        list($prefix, $module, $rule) = array_pad(explode('.', Route::currentRouteName()), 3, 'index' );
        switch ($rule)
        {
            case 'index':
            case 'show':
                $userRule = $module.'.view';
                break;
            case 'create':
            case 'store':
                $userRule = $module.'.create';
                break;
            case 'edit':
            case 'update':
                $userRule = $module.'.update';
                break;
            case 'destroy':
                $userRule = $module.'.delete';
                break;
            default:
                $userRule = Route::currentRouteName();
                break;
        }
    }
    // no access to the request page and request page not the root admin page
    if ( ! Sentry::hasAccess($userRule) and $userRule !== 'cpanel.view' )
    {
        return Redirect::route('cpanel.home')
            ->with('error', Lang::get('cpanel::permissions.access_denied'));
    }
    // no access to the request page and request page is the root admin page
    else if( ! Sentry::hasAccess($userRule) and $userRule === 'cpanel.view' )
    {
        //can't see the admin home page go back to home site page
        return Redirect::to('/')
            ->with('error', Lang::get('cpanel::permissions.access_denied'));
    }

});