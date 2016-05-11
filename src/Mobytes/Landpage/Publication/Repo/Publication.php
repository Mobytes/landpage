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


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Laracasts\Presenter\PresentableTrait;

/**
 * Class Publication
 * @package Mobytes\Landpage\Publication\Repo
 */
class Publication extends Model
{
    use SoftDeletingTrait;

	protected $fillable = ['type_publication_id', 'titulo', 'subtitulo', 'contenido', 'tags', 'estado','cliente','date_start','date_end'];

    use PresentableTrait;

    /**
     * @autor eveR Vásquez
     * @link http://evervasquez.me
     * @var array
     */
    protected $hidden = ['updated_at','deleted_at'];

    /**
     * @autor eveR Vásquez
     * @link http://evervasquez.me
     * @var string
     */
    protected $presenter = "Mobytes\Landpage\Publication\Repo\PublicationPresenter";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function medias()
    {
        return $this->hasMany('Mobytes\Landpage\Media\Repo\Media');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function media()
    {
        return $this->hasOne('Mobytes\Landpage\Media\Repo\Media');
    }
}