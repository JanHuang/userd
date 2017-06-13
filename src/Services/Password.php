<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

namespace Services;

/**
 * Class Password
 * @package Services
 */
class Password
{
    /**
     * @param $password
     * @param int $cost
     * @return bool|string
     */
    public static function hash($password, $cost = PASSWORD_BCRYPT)
    {
        return password_hash($password, $cost);
    }

    /**
     * @param $password
     * @param $hash
     * @return bool
     */
    public static function verify($password, $hash)
    {
        return password_verify($password, $hash);
    }
}