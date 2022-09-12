<?php

namespace Core\Router;

use Core\Router\Traits\RouteMatcher;
use Exception;
use ReflectionClass;
use ReflectionException;
use const CONTROLLER_PATH;
use const URL_WEBSITE;
use const DIR_CONTROLLER;

abstract class AbstractRoute
{   
    protected RouteMatcher $routeMatcher;
    protected array $reflectionControllers = [];

    /**
     * @throws ReflectionException
     * @throws Exception
     */
    public function __construct()
    {
        try {
            $this->routeMatcher = new RouteMatcher();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        $controllerFiles = glob(CONTROLLER_PATH .'*.php');
        
        foreach ($controllerFiles as $file) {
            $controllerPath = 'App\\' . DIR_CONTROLLER . '\\'. basename($file, '.php');
            $this->reflectionControllers[] = new ReflectionClass($controllerPath);
        }
    }
}
