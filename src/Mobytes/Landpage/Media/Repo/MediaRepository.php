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

namespace Mobytes\Landpage\Media\Repo;


class MediaRepository implements MediaInterface
{
    /**
     * @autor eveR Vásquez
     * @link http://evervasquez.me
     * @var
     */
    private $model;

    /**
     * MediaRepository constructor.
     * @param $model
     */
    public function __construct(Media $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function save(array $attributes)
    {
        $this->model->create($attributes);
    }

    /**
     * @param $media_id
     * @param array $attributes
     * @return mixed
     */
    public function update($media_id, array $attributes)
    {
        // TODO: Implement update() method.
    }

    /**
     * @param $media_id
     * @return mixed
     */
    public function find($media_id)
    {
        // TODO: Implement find() method.
    }

    /**
     * @param $media_id
     * @return mixed
     */
    public function destroy($media_id)
    {
        // TODO: Implement destroy() method.
    }

}