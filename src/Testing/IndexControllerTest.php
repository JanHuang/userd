<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */
namespace Testing;


use FastD\Test\TestCase;


class IndexControllerTest extends TestCase
{
    public function testProfile()
    {
        $request = $this->request('GET', '/profile/1');
        $response = $this->app->handleRequest($request);
        echo $response->getBody();
    }
}
