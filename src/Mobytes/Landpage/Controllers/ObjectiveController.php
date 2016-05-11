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

namespace Mobytes\Landpage\Controllers;

use View, Input, Config, Redirect;
use Mobytes\Landpage\core\CommandBus;
use Mobytes\Landpage\Objective\Repo\ObjectiveInterface;
use Mobytes\Landpage\Objective\Form\ObjectiveForm;
use Mobytes\Landpage\Objective\Command\ObjectiveCommand;
use Mobytes\Htmlext\TableBuilderTrait;

class ObjectiveController extends BaseController
{
    use CommandBus;

    use TableBuilderTrait;

    /**
     * @var int
     */
    private static $_ORGANIZATION_ID = 1;

    /**
     * @var
     */
    protected $objective;

    /**
     * @var
     */
    protected $form;

    public function __construct(ObjectiveInterface $objective, ObjectiveForm $form)
    {
        $this->beforeFilter('sentryAuth');
        $this->objective = $objective;
        $this->form = $form;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $objetivos = $this->objective->getAllByOrganization(self::$_ORGANIZATION_ID);

        $table = $this->table('Mobytes\Landpage\Objective\Table\ObjectiveTable',$objetivos);

        return View::make(Config::get('landpage::views.home.objetivos_index'), compact('table'));
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $objetivo = $this->objective->find($id);
        return View::make(Config::get('landpage::views.home.objetivos_show'), compact('objetivo'));
    }

    /*
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return View::make(Config::get('landpage::views.home.objetivos_create'));
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $objetivo = $this->objective->find($id);
        return View::make(Config::get('landpage::views.home.objetivos_edit'), compact('objetivo'));
    }

    /**
     *
     */
    public function store()
    {
        $attributes = Input::all();
        $attributes['organization_id'] = self::$_ORGANIZATION_ID;
        $this->form->validate($attributes);
        extract(Input::only('description'));
        $this->execute(new ObjectiveCommand(self::$_ORGANIZATION_ID, $description));
        return Redirect::route('landpage.objetivos')->withInput()->with('success', 'El objetivo se guardo correctamente');
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id)
    {
        $attributes = Input::all();
        $attributes['organization_id'] = self::$_ORGANIZATION_ID;
        $this->form->validate($attributes);
        $this->objective->update($id, $attributes);
        return Redirect::route('landpage.objetivos')->withInput()->with('success', 'El objetivo se actualizo correctamente');
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->objective->destroy($id);
        return Redirect::route('landpage.objetivos');
    }
}