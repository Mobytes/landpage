<?php

namespace Mobytes\Landpage\Controllers;

use View, Input, Config, Redirect;
use Mobytes\Landpage\core\CommandBus;
use Mobytes\Landpage\Publication\Repo\PublicationInterface;
use Mobytes\Landpage\Publication\Form\PublicationForm;
use Mobytes\Landpage\Publication\Form\PublicationUpdateForm;
use Mobytes\Landpage\Publication\Command\PublicationCommand;
use Mobytes\Htmlext\TableBuilderTrait;

/**
 * Class NoticeController
 * @package Mobytes\Landpage\Controllers
 */
class NoticeController extends BaseController
{
    use CommandBus;

    use TableBuilderTrait;

    /**
     * @autor eveR Vásquez
     * @link http://evervasquez.me
     * @var int
     */
    private static $_NOTICE = 1;

    /**
     * @autor eveR Vásquez
     * @link http://evervasquez.me
     * @var int
     */
    private static $_MEDIA = 1;

    /**
     * @autor eveR Vásquez
     * @link http://evervasquez.me
     * @var int
     */
    private static $_PAGINATE = 7;
    /**
     * @autor eveR Vásquez
     * @link http://evervasquez.me
     * @var PublicationInterface
     */
    protected $publication;

    /**
     * @autor eveR Vásquez
     * @link http://evervasquez.me
     * @var PublicationForm
     */
    protected $form;


    /**
     * @var PublicationUpdateForm
     */
    protected $updateForm;

    /**
     * @autor eveR Vásquez
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

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $noticias = $this->publication->getAllByType(self::$_NOTICE);

        $table = $this->table('Mobytes\Landpage\Publication\Table\NoticeTable',$noticias);

        return View::make(Config::get('landpage::views.home.noticias_index'), compact('table'));
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $noticia = $this->publication->find($id);
        //echo "<pre>"; print_r($noticia->toArray()); exit;
        return View::make(Config::get('landpage::views.home.noticias_show'), compact('noticia'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return View::make(Config::get('landpage::views.home.noticias_create'));
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $noticia = $this->publication->find($id);
        return View::make(Config::get('landpage::views.home.noticias_edit'), compact('noticia'));
    }

    /**
     *
     */
    public function store()
    {
        $attributes = Input::all();
        $attributes['type_publication_id'] = self::$_NOTICE;
        $this->form->validate($attributes);
        extract(Input::only('titulo', 'subtitulo', 'contenido', 'tags', 'media'));
        $estado = 0; $cliente = ''; $date_start = null; $date_end = null;
        $this->execute(new PublicationCommand(self::$_NOTICE, $titulo, $subtitulo, $contenido, $tags, $media, $cliente, $estado, $date_start, $date_end));
        return Redirect::route('landpage.noticias')->withInput()->with('success', 'La noticia se guardo correctamente');
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
        return Redirect::route('landpage.noticias')->withInput()->with('success', 'La noticia se actualizo correctamente');
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->publication->destroy($id);
        return Redirect::route('landpage.noticias');
    }

}