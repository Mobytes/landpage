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

namespace Mobytes\Landpage\Organization\Form;


class OrganizationForm
{
    /**
     * rules the validation
     *
     * @autor eveR Vásquez
     * @link http://evervasquez.me
     * @var array
     */

    protected $rules = [
        'nombre' => 'required|alpha_num_spaces|min:5',
        'ruc' => 'required|alpha_num|min:11|max:12',
        'direccion' => 'required|alpha_num_spaces',
        'telefono' => 'required|alpha_num_spaces',
        'vision' => 'required|alpha_num_spaces',
        'mision' => 'required|alpha_num_spaces'
    ];
}