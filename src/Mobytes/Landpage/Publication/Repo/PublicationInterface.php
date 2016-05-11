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

namespace Mobytes\Landpage\Publication\Repo;

/**
 * Interface PublicationInterface
 * @package Mobytes\Landpage\Publication\Repo
 */
interface PublicationInterface
{
    /**
     * @param array $attributes
     * @return mixed
     */
    public function save(array $attributes);

    /**
     * @param $publication_id
     * @param array $attributes
     * @return mixed
     */
    public function update($publication_id,array $attributes);

    /**
     * @param $publication_id
     * @return mixed
     */
    public function find($publication_id);

    /**
     * @param $publication_id
     * @return mixed
     */
    public function destroy($publication_id);


    /**
     * @param $type_id
     * @return mixed
     */
    public function getAllByType($type_id);

    /**
     * @param $type_id
     * @return mixed
     */
    public function getAllByTypeWithMedia($type_id);

    /**
     * @param $type_id
     * @return mixed
     */
    public function getAllByTypeWithMediaLimit4($type_id);

    /**
     * @param $type_id
     * @param $type_media_id
     * @return mixed
     */
    public function getAllByTypeAndTypeMedia($type_id,$type_media_id);
}