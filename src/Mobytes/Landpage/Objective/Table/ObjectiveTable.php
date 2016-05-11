<?php
/**
 * Created by PhpStorm.
 * User: BraPastor
 * Date: 07/09/2015
 * Time: 10:17 PM
 */

namespace Mobytes\Landpage\Objective\Table;

use Mobytes\Htmlext\Table;

class ObjectiveTable extends Table
{
    protected $btn_new = "Crear nuevo objetivo";

    protected $title = "Todas los objetivos de cepco.org.pe";

    protected $paginate = true;

    protected $per_page = 7;

    protected $thead = array(
        "title" => [
            "Descripcion",
            "Actions"
        ]
    );

    protected $tbody = array(
        "fields" => [
            "description" => [
                "class" => ""
            ]
        ]
    );

    public function buildTable()
    {
        $this->build("landpage.objetivos");

    }
}