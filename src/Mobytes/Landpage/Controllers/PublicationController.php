<?php

namespace Mobytes\Landpage\Controllers;

use View, Input, Redirect, Config;
use Mobytes\Landpage\core\CommandBus;
use Mobytes\Landpage\Publication\Repo\PublicationInterface;
use Mobytes\Landpage\Publication\Form\PublicationForm;
use Mobytes\Landpage\Publication\Form\PublicationUpdateForm;
use Mobytes\Landpage\Publication\Command\PublicationCommand;
use Mobytes\Htmlext\TableBuilderTrait;

class PublicationController extends BaseController
{
    use CommandBus;

    use TableBuilderTrait;

    /*
     * @var int
     */
    private static $_NOTICE = 2;

    private static $_MEDIA = 1;
    /*
     * @var int
     */
    private static $_PAGINATE = 7;

    /*
     * @var PublicationInterface
     */
    protected $publication;

    /*
     * @var PublicationForm
     */
    protected $form;

    /**
     * @var PublicationUpdateForm
     */
    protected $updateForm;

    /*
     * @var PublicationForm
     */
    protected $publicationForm;

    /*
     * @param PublicationInterface $publication
     * @param PublicationForm $form
     */
    public function __construct(PublicationInterface $publication, PublicationForm $form, PublicationUpdateForm $updateForm)
    {
        $this->beforeFilter('sentryAuth');
        $this->publication = $publication;
        $this->form = $form;
        $this->updateForm = $updateForm;
    }

    /*
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $publicaciones = $this->publication->getAllByType(self::$_NOTICE);

        $table = $this->table('Mobytes\Landpage\Publication\Table\PublicationTable',$publicaciones);

        return View::make(Config::get('landpage::views.home.publicaciones_index'), compact('table'));
    }

    /*
     * @return \Illuminate\View\View
     */
    public function create(){
        return View::make(Config::get('landpage::views.home.publicaciones_create'));
    }

    /*
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $publicacion = $this->publication->find($id);
        return View::make(Config::get('landpage::views.home.publicaciones_edit'), compact('publicacion'));
    }

    public function store()
    {
        $attributes = Input::all();
        $attributes['type_publication_id'] = self::$_NOTICE;
        $this->form->validate($attributes);
        extract(Input::only('titulo', 'subtitulo', 'contenido', 'tags', 'media'));
        $estado = 0; $cliente = ''; $date_start = null; $date_end = null;
        $this->execute(new PublicationCommand(self::$_NOTICE, $titulo, $subtitulo, $contenido, $tags, $media, $cliente, $estado, $date_start, $date_end));
        return Redirect::route('landpage.publicaciones')->withInput()->with('success', 'La publicacion se guardo correctamente');
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $publicacion = $this->publication->find($id);

        return View::make(Config::get('landpage::views.home.publicaciones_show'), compact('publicacion'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id)
    {
        $attributes = Input::all();
        $this->updateForm->validate($attributes);
        $this->publication->update($id, $attributes);
        return Redirect::route('landpage.publicaciones')->withInput()->with('success', 'La publicacion se actualizo correctamente');
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        $this->publication->destroy($id);
        return Redirect::route('landpage.publicaciones');
    }
}