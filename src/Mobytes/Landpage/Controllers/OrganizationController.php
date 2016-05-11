<?php

namespace Mobytes\Landpage\Controllers;

use View, Input, Config, Redirect;
use Mobytes\Landpage\Organization\Repo\OrganizationInterface;
use Mobytes\Landpage\Organization\Form\OrganizationForm;

/**
 * Class OrganizationController
 * @package Mobytes\Landpage\Controllers
 */
class OrganizationController extends BaseController
{
    /**
     * @var int
     */
    private static $_EMPRESA_ID = 1;
    /**
     * @var OrganizationInterface
     */
    protected $organization;

    /**
     * @var OrganizationForm
     */
    protected $form;

    /**
     * @param OrganizationInterface $organization
     * @param OrganizationForm $form
     */
    public function __construct(OrganizationInterface $organization, OrganizationForm $form)
    {
        $this->beforeFilter('sentryAuth');
        $this->organization = $organization;
        $this->form = $form;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $organizacion = $this->organization->find(self::$_EMPRESA_ID);
        return View::make(Config::get('landpage::views.home.organizacion_index'), compact('organizacion'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $attributes = Input::all();
        $this->form->validate($attributes);
        $this->organization->update(self::$_EMPRESA_ID, $attributes);
        return Redirect::route('landpage.organizacion')->withInput()->with('success', 'Se guardaron los datos correctamente');
    }
}