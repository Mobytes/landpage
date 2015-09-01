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


class OrganizationRepository implements OrganizationInterface
{
    private $model;

    /**
     * OrganizationRepository constructor.
     * @param $model
     */
    public function __construct(Organization $model)
    {
        $this->model = $model;
    }


    /**
     * @param array $attributes
     * @return mixed
     */
    public function save(array $attributes)
    {
        // TODO: Implement save() method.
    }

    /**
     * @param $organization_id
     * @param array $attributes
     * @return mixed
     */
    public function update($organization_id, array $attributes)
    {
        // TODO: Implement update() method.
    }

    /**
     * @param $organization_id
     * @return mixed
     */
    public function find($organization_id)
    {
        // TODO: Implement find() method.
    }

    /**
     * @param $organization_id
     * @return mixed
     */
    public function destroy($organization_id)
    {
        // TODO: Implement destroy() method.
    }

}