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

namespace Mobytes\Landpage\core;


use Illuminate\Validation\Validator as IlluminateValidator;

/**
 * Class ValidatorExtended
 * @package Mychef\Core\Services
 */
class ValidatorExtended extends IlluminateValidator
{

    /**
     * @autor eveR Vásquez
     * @link http://evervasquez.me
     * @var array
     */
    private $_custom_messages = array(
        "alpha_dash_spaces" => "The :attribute may only contain letters, spaces, and dashes.",
        "alpha_num_spaces" => "The :attribute may only contain letters, numbers, and spaces.",
        "date_after_now" => "The :attribute can only be greater than today's date.",
        "numeric_array"        => "The :attribute field should be an array of numeric values",
    );

    /**
     * @param \Symfony\Component\Translation\TranslatorInterface $translator
     * @param array $data
     * @param array $rules
     * @param array $messages
     * @param array $customAttributes
     */
    public function __construct($translator, $data, $rules, $messages = array(), $customAttributes = array())
    {
        parent::__construct($translator, $data, $rules, $messages, $customAttributes);

        $this->_set_custom_stuff();
    }

    /**
     *
     */
    private function _set_custom_stuff()
    {
        $this->setCustomMessages($this->_custom_messages);
    }

    /**
     * Allow only alphabets, spaces and dashes (hyphens and underscores)
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    protected function validateAlphaDashSpaces($attribute, $value)
    {
        return (bool) preg_match( "/^[A-Za-z\s-_ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöùúûüýøþÿÐdŒ]+$/", $value );
    }

    /**
     * Allow only alphabets, numbers, and spaces
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    protected function validateAlphaNumSpaces($attribute, $value)
    {
        return (bool)preg_match("/^[A-Za-z0-9\s-_ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöùúûüýøþÿÐdŒ]+$/", $value);

    }

    /**
     * @param $attribute
     * @param $value
     * @return bool
     */
    protected function validateDateAfterNow($attribute, $value)
    {
        $date = new \DateTime($value);
        $carbon = \Carbon\Carbon::instance($date);

        if (\Carbon\Carbon::now()->diffInDays($carbon, false) >= 0) {
            return true;
        }
        return false;
    }

    /**
     * @param $attribute
     * @param $values
     * @return bool
     */
    protected function validateNumericArray($attribute, $values)
    {
        if (!is_array($values)) {
            return false;
        }

        foreach ($values as $v) {
            if (!is_array($v)) {
                return false;
            }
        }
        return true;
    }
}