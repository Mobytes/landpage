<?php

namespace Mobytes\Landpage\Controllers;

use View, Input, Config, Redirect;
use Mobytes\Landpage\core\CommandBus;
use Mobytes\Landpage\Publication\Repo\PublicationInterface;
use Mobytes\Landpage\Publication\Form\PublicationForm;
use Mobytes\Landpage\Publication\Form\PublicationUpdateForm;
use Mobytes\Landpage\Publication\Command\PublicationCommand;
use Mobytes\Htmlext\TableBuilderTrait;
use Carbon\Carbon;


/**
 * Class ProjectController
 * @package Mobytes\Landpage\Controllers
 */
class ProjectController extends BaseController
{
    use CommandBus;

    use TableBuilderTrait;

    /**
     * @var int
     */
    private static $_PUBLICATION = 3;

    /**
     * @var int
     */
    private static $_PAGINATE = 7;

    /**
     * @autor eveR V�squez
     * @link http://evervasquez.me
     * @var PublicationInterface
     */
    protected $publication;

    /**
     * @autor eveR V�squez
     * @link http://evervasquez.me
     * @var PublicationForm
     */
    protected $form;


    /**
     * @var PublicationUpdateForm
     */
    protected $updateForm;

    /**
     * @autor eveR V�squez
     * @link http://evervasquez.me
     * @var
     */
    protected $publicationForm;


    /**
     * @param PublicationInterface $publication
     * @param PublicationForm $form
     * @param PublicationUpdateForm $updateForm
     */
    public function __construct(PublicationInterface $publication, PublicationForm $form, PublicationUpdateForm $updateForm)
    {
        $this->beforeFilter('sentryAuth');
        $this->publication = $publication;
        $this->form = $form;
        $this->updateForm = $updateForm;
    }

    public function index()
    {
        $proyectos = $this->publication->getAllByType(self::$_PUBLICATION);

        $table = $this->table('Mobytes\Landpage\Publication\Table\ProjectTable',$proyectos);

        return View::make(Config::get('landpage::views.home.proyectos_index'), compact('table'));
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $proyecto = $this->publication->find($id);
        //echo "<pre>"; print_r($noticia->toArray()); exit;
        return View::make(Config::get('landpage::views.home.proyectos_show'), compact('proyecto'));
    }

    /*
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return View::make(Config::get('landpage::views.home.proyectos_create'));
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $proyecto = $this->publication->find($id);
        //echo "<pre>"; print_r($proyecto->toArray()); exit;
        return View::make(Config::get('landpage::views.home.proyectos_edit'), compact('proyecto'));
    }

    /**
     *
     */
    public function store()
    {
        $attributes = Input::all();
        //echo "<pre>"; print_r($attributes); exit;
        $attributes['type_publication_id'] = self::$_PUBLICATION;
        $this->form->validate($attributes);
        $estado = (!Input::has('estado')) ? '0' : '1';
        $date_start = (Input::has('date_start') != '') ? Carbon::createFromFormat('d-m-Y',Input::get('date_start'))->format('Y-m-d') : null;
        $date_end = (Input::has('date_end') != '') ? Carbon::createFromFormat('d-m-Y',Input::get('date_end'))->format('Y-m-d') : null;
        extract(Input::only('titulo', 'subtitulo', 'contenido', 'tags', 'media','cliente'));
        $this->execute(new PublicationCommand(self::$_PUBLICATION, $titulo, $subtitulo, $contenido, $tags, $media, $cliente, $estado, $date_start, $date_end));
        return Redirect::route('landpage.proyectos')->withInput()->with('success', 'El proyecto se guardo correctamente');
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id)
    {
        $attributes = Input::all();
        $this->updateForm->validate($attributes);
        $attributes['estado'] = (!Input::has('estado')) ? '0' : '1';
        $attributes['date_start'] = (Input::has('date_start') != '') ? Carbon::createFromFormat('d-m-Y',Input::get('date_start'))->format('Y-m-d') : null;
        $attributes['date_end'] = (Input::has('date_end') != '') ? Carbon::createFromFormat('d-m-Y',Input::get('date_end'))->format('Y-m-d') : null;
        $this->publication->update($id, $attributes);
        return Redirect::route('landpage.proyectos')->withInput()->with('success', 'El proyecto se actualizo correctamente');
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->publication->destroy($id);
        return Redirect::route('landpage.proyectos');
    }
}