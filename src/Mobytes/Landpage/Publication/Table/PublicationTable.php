<?php
/**
 * Created by PhpStorm.
 * User: BraPastor
 * Date: 07/09/2015
 * Time: 10:17 PM
 */

namespace Mobytes\Landpage\Publication\Table;

use Mobytes\Htmlext\Table;

class PublicationTable extends Table
{
    protected $btn_new = "Crear nueva publicacion";

    protected $title = "Todas las publicaciones de cepco.org.pe";

    protected $paginate = true;

    protected $per_page = 7;

    protected $thead = array(
        "title" => [
            "Titulo",
            "Subtitulo",
            "Tags",
            "Actions"
        ]
    );

    protected $tbody = array(
        "fields" => [
            "titulo" => [
                "class" => ""
            ],
            "subtitulo" => [
                "class" => ""
            ],
            "tags" => [
                "class" => ""
            ]
        ]
    );

    public function buildTable()
    {
        $this->build("landpage.publicaciones");

    }
}