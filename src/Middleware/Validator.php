<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @see      https://www.github.com/janhuang
 * @see      http://www.fast-d.cn/
 */

namespace Middleware;


use FastD\Middleware\DelegateInterface;
use FastD\Middleware\Middleware;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Validator\ValidationAbstract;

class Validator extends Middleware
{
    /**
     * @param ServerRequestInterface $request
     * @param DelegateInterface $next
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request, DelegateInterface $next)
    {
        $validator = 'Validator'.str_replace('/', '\\', ucwords($request->getUri()->getPath(), '/'));
        if (class_exists($validator)) {
            $validator = new $validator;
            if ( ! ($validator instanceof ValidationAbstract)) {
                abort(500);
            }
            validator($request, (array)$validator->rules());
        }

        return $next->process($request);
    }
}