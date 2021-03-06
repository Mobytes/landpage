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


use Laracasts\Commander\CommandHandler;
use Mobytes\Landpage\Media\Repo\MediaInterface;

/**
 * Class MediaCommandHandler
 * @package Mobytes\Landpage\Media\Command
 */
class MediaCommandHandler implements  CommandHandler
{
    /**
     * @autor eveR Vásquez
     * @link http://evervasquez.me
     * @var
     */
    private $repository;

    /**
     * MediaCommandHandler constructor.
     * @param $repository
     */
    public function __construct(MediaInterface $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $attributes = (array) $command;
        $this->repository->save($attributes);
    }

}