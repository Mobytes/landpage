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

namespace Mobytes\Landpage\Media\Command;


/**
 * Class MediaCommand
 * @package Mobytes\Landpage\Media\Command
 */
class MediaCommand
{
    /**
     * @autor eveR Vásquez
     * @link http://evervasquez.me
     * @var
     */
    public $publication_id;
    /**
     * @autor eveR Vásquez
     * @link http://evervasquez.me
     * @var
     */
    public $type_media_id;
    /**
     * @autor eveR Vásquez
     * @link http://evervasquez.me
     * @var
     */
    public $description;
    /**
     * @autor eveR Vásquez
     * @link http://evervasquez.me
     * @var
     */
    public $url_media;
    /**
     * @autor eveR Vásquez
     * @link http://evervasquez.me
     * @var
     */
    public $flag_main;

    /**
     * MediaCommand constructor.
     * @param $publication_id
     * @param $type_media_id
     * @param $description
     * @param $url_media
     * @param $flag_main
     */
    public function __construct($publication_id, $type_media_id, $description, $url_media, $flag_main)
    {
        $this->publication_id = $publication_id;
        $this->type_media_id = $type_media_id;
        $this->description = $description;
        $this->url_media = $url_media;
        $this->flag_main = $flag_main;
    }

}