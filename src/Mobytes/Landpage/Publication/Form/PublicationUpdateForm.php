<?php
/**
 * Created by PhpStorm.
 * User: Jair Vasquez
 * Date: 07/09/2015
 * Time: 09:39 PM
 */

namespace Mobytes\Landpage\Publication\Form;

use Laracasts\Validation\FormValidator;

class PublicationUpdateForm extends FormValidator
{
    protected $rules = [
        'titulo' => 'required|min:6',
        'subtitulo' => '',
        'contenido' => 'required',
        'media' => 'required'
    ];
}