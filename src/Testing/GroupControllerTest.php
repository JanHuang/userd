<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @see      https://www.github.com/janhuang
 * @see      http://www.fast-d.cn/
 */

namespace Testing;

use Controller\GroupController;
use FastD\Test\TestCase;

class GroupControllerTest extends TestCase
{
    public function testGroupAdd()
    {
        $response = $this->request('POST', '/api/groups');
    }
}
