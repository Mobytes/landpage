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

namespace Mobytes\Landpage\Controllers;

use Input, Response, upload;

/**
 * Class MediaController
 * @package Mobytes\Landpage\Controllers
 */
class MediaController extends BaseController
{
    public function __construct()
    {
        $this->beforeFilter('sentryAuth');
    }
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadImageNotice()
    {
        $file = $_FILES['file'];
        $path = public_path().'/assets/noticias/';
        $prefijo = 'img_cepco_not';

        return $this->uploadImage($file, $path, $prefijo);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadImagePublication()
    {
        $file = $_FILES['file'];
        if (substr($_FILES['file']['type'], 0, 5) == 'image') {
            $path = public_path().'/assets/publicaciones/';
            $prefijo = 'img_cepco_pub';

            return $this->uploadImage($file, $path, $prefijo);
        } else {
            $path = public_path().'/assets/documentos/';
            $prefijo = 'doc_cepco_pub';

            return $this->uploadFile($file, $path, $prefijo);
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadImageFileProject()
    {
        $file = $_FILES['file'];
        if (substr($_FILES['file']['type'], 0, 5) == 'image') {
            $path = public_path().'/assets/proyectos/';
            $prefijo = 'img_cepco_pro';

            return $this->uploadImage($file, $path, $prefijo);
        } else {
            $path = public_path().'/assets/documentos/';
            $prefijo = 'doc_cepco_pro';

            return $this->uploadFile($file, $path, $prefijo);
        }
    }

    /**
     * @param $file
     * @param $destinationPath
     * @param $prefijo
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadImage($file, $destinationPath, $prefijo)
    {
        ini_set('max_execution_time', 6000);
        $handle = new upload($file, 'es_ES');
        if ($handle->uploaded) {
            $handle->file_new_name_body = $prefijo . uniqid();
            $handle->image_resize = true;
            //$handle->image_convert = jpg;
            $handle->image_ratio = true;
            //$handle->image_ratio_crop = true;
            $handle->image_x = 1000;
            $handle->image_y = 1000;
            $handle->Process($destinationPath);

            if ($handle->processed) {
                $nameImg = $handle->file_dst_name;
                $thumb = new upload($handle->file_dst_pathname, 'es_ES');
                $thumb->image_resize = true;
                $thumb->image_ratio_crop = true;
                $thumb->image_x = 300;
                $thumb->image_y = 200;
                $thumb->file_name_body_pre = 'thumb_';
                $thumb->process($destinationPath . 'thumb/');
                //$handle-> Clean();
                return Response::json($nameImg, 200);
            } else {
                //$handle-> Clean();
                return Response::json('error', 400);
            }
        } else {
            //$handle-> Clean();
            return Response::json('error', 400);
        }
    }

    /**
     * @param $file
     * @param $destinationPath
     * @param $prefijo
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadFile($file, $destinationPath, $prefijo)
    {
        ini_set('max_execution_time', 6000);
        $handle = new upload($file, 'es_ES');
        if ($handle->uploaded) {
            $handle->file_new_name_body = $prefijo . uniqid();
            $handle->Process($destinationPath);
            if ($handle->processed) {
                $nameImg = $handle->file_dst_name;
                $handle-> Clean();
                return Response::json($nameImg, 200);
            } else {
                $handle-> Clean();
                return Response::json('error', 400);
            }
        } else {
            $handle-> Clean();
            return Response::json('error', 400);
        }
    }
}