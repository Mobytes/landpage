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


use Laracasts\Presenter\Presenter;
use Jenssegers\Date\Date as Carbon;

/**
 * Class PublicationPresenter
 * @package Mobytes\Landpage\Publication\Repo
 */
class PublicationPresenter extends Presenter
{
    /**
     * @return string
     */
    public function getDate()
    {
        return Carbon::parse($this->created_at)->toFormattedDateString();
    }

    public function getDateLarge()
    {
        return Carbon::parse($this->created_at)->format('l, j  F Y');
    }

    public function getDateDiffForHumans()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    public function getDay()
    {
        return Carbon::parse($this->created_at)->day;
    }

    public function getMonth()
    {
        return substr(date('F', strtotime($this->created_at)),0,3);
    }

    public function showMinContent()
    {
        return substr($this->contenido,0,80);
    }

    public function getPeriod()
    {
        $period = '';
        if ($this->date_start != null) {
            $period = 'Periodo: Del '.Carbon::parse($this->date_start)->format('l, j  F Y').' - Hasta el '.Carbon::parse($this->date_end)->format('l, j  F Y');
        }
        return $period;
    }
}