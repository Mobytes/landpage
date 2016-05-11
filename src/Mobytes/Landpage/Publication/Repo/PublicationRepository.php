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

use Mobytes\Landpage\Media\Repo\Media;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Input, DB;
/**
 * Class PublicationRepository
 * @package Mobytes\Landpage\Publication\Repo
 */
class PublicationRepository implements PublicationInterface
{
    /**
     * @autor eveR Vásquez
     * @link http://evervasquez.me
     * @var int
     */
    public static $_FLAG_MAIN =1;

    /**
     * @autor eveR Vásquez
     * @link http://evervasquez.me
     * @var int
     */
    public static $_TYPE_MEDIA_FOTOS = 1;

    /**
     * @autor eveR Vásquez
     * @link http://evervasquez.me
     * @var int
     */
    public static $_TYPE_MEDIA_VIDEOS = 2;

    /**
     * @var int
     */
    public static $_TYPE_MEDIA_DOCUMENTOS = 3;

    /**
     * @autor eveR Vásquez
     * @link http://evervasquez.me
     * @var Publication
     */
    protected $model;

    /**
     * @var MediaInterface
     */
    protected $media;


    /**
     * @param Publication $model
     * @param Media $media
     */
    public function __construct(Publication $model, Media $media)
    {
        $this->model = $model;
        $this->media = $media;
    }


    /**
     * @param array $attributes
     * @return mixed
     */
    public function save(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * @param $publication_id
     * @param array $attributes
     */
    public function update($publication_id, array $attributes)
    {
        DB::beginTransaction();
        try {
            $publication = $this->model->findOrFail($publication_id);
            $publication->update($attributes);

            $array = array();
            $medias = explode(",", $attributes['media']);

            foreach($medias as $media) {
                $type_media = 1;
                if (substr($media,0,3) == 'vid') {
                    $type_media = 2;
                } elseif (substr($media,0,3) == 'doc') {
                    $type_media = 3;
                }
                $med = $this->media->updateOrCreate(
                    array(
                        'publication_id'=>$publication_id,
                        'type_media_id'=>$type_media,
                        'url_media'=>$media
                    )
                );
                $array[] = $med->id;
            }
            $this->media->where('publication_id',$publication_id)
                        ->whereNotIn('id',$array)
                        ->delete();

            DB::commit();

        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            throw new NotFoundHttpException('La ruta no ha sido encontrada');
        }
    }

    /**
     * @param $publication_id
     * @return mixed
     */
    public function find($publication_id)
    {
        return $this->model->with('medias')
            ->findOrFail($publication_id);
    }

    /**
     * @param $publication_id
     * @return mixed
     */
    public function destroy($publication_id)
    {
        $this->model->findOrFail($publication_id)->delete();
    }

    /**
     * @param $type_id
     * @return mixed
     */
    public function getAllByType($type_id)
    {
        return $this->model->where(function($query) use ($type_id){
            if(\Input::has('search'))
            {
                $query->where('titulo', 'LIKE', '%'.Input::get('search').'%');
                $query->orWhere('subtitulo', 'LIKE', '%'.Input::get('search').'%');
                $query->orWhere('tags', 'LIKE', '%'.Input::get('search').'%');
            }
            $query->where('type_publication_id', $type_id);
        })->with('medias')
        ->orderBy('id','DESC');
    }

    /**
     * @param $type_id
     * @param $type_media_id
     * @return mixed
     */
    public function getAllByTypeAndTypeMedia($type_id, $type_media_id)
    {
        return $this->model->where(function($query) use ($type_id){
            if(\Input::has('search'))
            {
                $query->where('titulo', 'LIKE', '%'.Input::get('search').'%');
                $query->orWhere('subtitulo', 'LIKE', '%'.Input::get('search').'%');
                $query->orWhere('tags', 'LIKE', '%'.Input::get('search').'%');
            }
            $query->where('type_publication_id', $type_id);
        })->with(['medias' => function($q) use($type_media_id){
            $q->where('type_media_id',$type_media_id);
        }])
        ->orderBy('id','DESC');
    }

    /**
     * @param $type_id
     * @return mixed
     */
    public function getAllByTypeWithMedia($type_id)
    {
        $model = $this->model->where(function($query) use ($type_id){
            if(\Input::has('search'))
            {
                $query->where('titulo', 'LIKE', '%'.Input::get('search').'%');
                $query->orWhere('subtitulo', 'LIKE', '%'.Input::get('search').'%');
                $query->orWhere('tags', 'LIKE', '%'.Input::get('search').'%');
            }
            $query->where('type_publication_id', $type_id);
        })->with(['medias' => function($q){
            //$q->where('flag_main',self::$_FLAG_MAIN);
        }]);

        if ($type_id == 3) {
            $model = $model->orderBy('date_start','DESC')
                            ->orderBy('date_end','DESC');
        } else {
            $model = $model->orderBy('created_at','DESC');
        }

        return $model;
    }

    /**
     * @param $type_id
     * @return mixed
     */
    public function getAllByTypeWithMediaLimit4($type_id)
    {
        return $this->model->where(function($query) use ($type_id){
            if(\Input::has('search'))
            {
                $query->where('titulo', 'LIKE', '%'.Input::get('search').'%');
                $query->orWhere('subtitulo', 'LIKE', '%'.Input::get('search').'%');
                $query->orWhere('tags', 'LIKE', '%'.Input::get('search').'%');
            }
            $query->where('type_publication_id', $type_id);
        })->with(['medias' => function($q){
            //$q->where('flag_main',self::$_FLAG_MAIN);
        }])->limit(4)->orderBy('created_at','DESC');
    }

    /**
     * @param $type_id
     * @param $quantity
     * @return mixed
     */
    public function geAllByTypeQuantity($type_id, $quantity)
    {
        return $this->model->with('media')
                        ->where('type_publication_id',$type_id)
                        ->whereNull('deleted_at')
                        ->orderBy('id','DESC')
                        ->take($quantity);
    }
}