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

namespace Mobytes\Landpage\Organization\Repo;


/**
 * Interface OrganizationInterface
 * @package Mobytes\Landpage\Organization\Repo
 */
interface OrganizationInterface
{
    /**
     * @param array $attributes
     * @return mixed
     */
    public function save(array $attributes);

    /**
     * @param $organization_id
     * @param array $attributes
     * @return mixed
     */
    public function update($organization_id,array $attributes);

    /**
     * @param $organization_id
     * @return mixed
     */
    public function find($organization_id);

    /**
     * @param $organization_id
     * @return mixed
     */
    public function destroy($organization_id);
}