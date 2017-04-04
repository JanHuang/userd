<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

namespace Services;


class Password
{
    public static function hash($password, $cost = PASSWORD_BCRYPT)
    {
        return password_hash($password, $cost);
    }

    public static function verify($password, $hash)
    {
        return password_verify($password, $hash);
    }
}