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

namespace Mobytes\Landpage\Publication\Command;


use Laracasts\Commander\CommandHandler;
use Mobytes\Landpage\Publication\Repo\PublicationInterface;
use Mobytes\Landpage\Media\Repo\MediaInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use DB;

/**
 * Class PublicationCommandHandler
 * @package Mobytes\Landpage\Publication\Command
 */
class PublicationCommandHandler implements CommandHandler
{
    /**
     * @autor eveR Vásquez
     * @link http://evervasquez.me
     * @var
     */
    private $pubRepository;

    /**
     * @var MediaInterface
     */
    private $medRepository;


    /**
     * @param PublicationInterface $pubRepository
     * @param MediaInterface $medRepository
     */
    public function __construct(PublicationInterface $pubRepository, MediaInterface $medRepository)
    {
        $this->pubRepository = $pubRepository;
        $this->medRepository = $medRepository;
    }

    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        DB::beginTransaction();
        try {
            $attributes = (array) $command;

            $publication = $this->pubRepository->save($attributes);

            $medias = explode(",", $attributes['media']);

            foreach($medias as $media) {
                $type_media = 1;
                if (substr($media,0,3) == 'vid') {
                    $type_media = 2;
                } elseif (substr($media,0,3) == 'doc') {
                    $type_media = 3;
                }
                $attributesMedia = array();
                $attributesMedia['url_media'] = $media;
                $attributesMedia['type_media_id'] = $type_media;
                $attributesMedia['publication_id'] = $publication->id;
                $this->medRepository->save($attributesMedia);
            }

            DB::commit();
            
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            throw new NotFoundHttpException('La ruta no ha sido encontrada');
        }
    }

}