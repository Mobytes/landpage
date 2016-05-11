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

namespace Mobytes\Landpage\Organization\Command;


/**
 * Class OrganizationCommand
 * @package Mobytes\Landpage\Organization\Command
 */
class OrganizationCommand
{
    /**
     * @autor eveR Vásquez
     * @link http://evervasquez.me
     * @var
     */
    public $nombre;
    /**
     * @autor eveR Vásquez
     * @link http://evervasquez.me
     * @var
     */
    public $ruc;
    /**
     * @autor eveR Vásquez
     * @link http://evervasquez.me
     * @var
     */
    public $direccion;
    /**
     * @autor eveR Vásquez
     * @link http://evervasquez.me
     * @var
     */
    public $telefono;
    /**
     * @autor eveR Vásquez
     * @link http://evervasquez.me
     * @var
     */
    public $vision;
    /**
     * @autor eveR Vásquez
     * @link http://evervasquez.me
     * @var
     */
    public $mision;

    /**
     * OrganizationCommand constructor.
     * @param $nombre
     * @param $ruc
     * @param $direccion
     * @param $telefono
     * @param $vision
     * @param $mision
     */
    public function __construct($nombre, $ruc, $direccion, $telefono, $vision, $mision)
    {
        $this->nombre = $nombre;
        $this->ruc = $ruc;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->vision = $vision;
        $this->mision = $mision;
    }


}