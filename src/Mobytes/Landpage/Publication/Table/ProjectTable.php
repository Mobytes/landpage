<?php
/*
 *
 *  * Copyright (C) 2015 eveR V�squez.
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

namespace Mobytes\Landpage\Publication\Table;

use Mobytes\Htmlext\Table;

class ProjectTable extends Table
{
    protected $btn_new = "Crear nuevo proyecto";

    protected $title = "Todas los proyectos de cepco.org.pe";

    protected $paginate = true;

    protected $per_page = 7;

    protected $thead = array(
        "title" => [
            "Estado",
            "Titulo",
            "Subtitulo",
            "Tags",
            "Actions"
        ]
    );

    protected $tbody = array(
        "fields" => [
            "estado" => [
                "class" => ""
            ],
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
        $this->build("landpage.proyectos");
    }

}