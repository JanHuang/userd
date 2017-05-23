<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @see      https://www.github.com/janhuang
 * @see      http://www.fast-d.cn/
 */

namespace Validator;


/**
 * Class ValidationAbstract
 * @package Middleware
 */
abstract class ValidationAbstract
{
    /**
     * @return array
     */
    abstract public function rules();
}