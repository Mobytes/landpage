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

namespace Mobytes\Landpage\Publication\Command;


/**
 * Class PublicationCommand
 * @package Mobytes\Landpage\Publication\Command
 */
class PublicationCommand
{
    /**
     * @autor eveR Vásquez
     * @link http://evervasquez.me
     * @var
     */
    public $type_publication_id;
    /**
     * @autor eveR Vásquez
     * @link http://evervasquez.me
     * @var
     */
    public $titulo;
    /**
     * @autor eveR Vásquez
     * @link http://evervasquez.me
     * @var
     */
    public $subtitulo;
    /**
     * @autor eveR Vásquez
     * @link http://evervasquez.me
     * @var
     */
    public $contenido;
    /**
     * @autor eveR Vásquez
     * @link http://evervasquez.me
     * @var
     */
    public $tags;
    /**
     * @autor eveR Vásquez
     * @link http://evervasquez.me
     * @var
     */
    public $url_file;

    /**
     * PublicationCommand constructor.
     * @param $type_publication_id
     * @param $titulo
     * @param $subtitulo
     * @param $contenido
     * @param $tags
     * @param $url_file
     */
    public function __construct($type_publication_id, $titulo, $subtitulo, $contenido, $tags, $url_file)
    {
        $this->type_publication_id = $type_publication_id;
        $this->titulo = $titulo;
        $this->subtitulo = $subtitulo;
        $this->contenido = $contenido;
        $this->tags = $tags;
        $this->url_file = $url_file;
    }

}