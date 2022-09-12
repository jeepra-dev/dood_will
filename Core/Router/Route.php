<?php
namespace Core\Router;

use Core\Router\Traits\AbstractRouteTrait;
use Core\Router\Traits\RouterCommonTrait;
use Core\View\View;
use ReflectionMethod;


class Route extends AbstractRoute
{
    use RouterCommonTrait;

    static function setConstantForPhpVar(array $params) {
        foreach ($params as $key => $value) {
            define(strtoupper($key), $value);
        }
    }

    /**
     * @throws \ReflectionException
     */
    public function callController()
    {
        foreach ($this->reflectionControllers as $reflection) {
            foreach ($reflection->getMethods(ReflectionMethod::IS_PUBLIC) as $methodObject) {
                $params = $this->getParams($methodObject);
                
                if (!isset($params['route_url']) || !$this->routeMatcher->isMatched($params['route_url'])) {
                    continue;
                }

                //create constant var for php doc
                self::setConstantForPhpVar($params);
                
                $controller = $reflection->name;
                
                $injectedParams = $this->getInjectedParam($methodObject->getParameters(), array_combine($this->routeMatcher->getKeys(), $this->routeMatcher->getValues()));

                return call_user_func_array([new $controller(), $methodObject->name], $injectedParams);
            }
        }
        
        //no matching route
        if (!$this->routeMatcher->getValues()) {
            (new View())->render([], 400);
        }

        return null;
    }
}
