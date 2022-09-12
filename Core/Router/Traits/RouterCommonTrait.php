<?php

namespace Core\Router\Traits;

use ReflectionException;
use const ROOT_FOLDER;

Trait RouterCommonTrait
{
    /**
     * @throws ReflectionException
     */
    private function getObjectByClass(string $class)
    {
        $class = trim($class, '\\');
        $configDependencies = require ROOT_FOLDER.'/config/dependence.php';
        
        if (array_key_exists($class, $configDependencies['dependencies'])) {
            $dependClass = $configDependencies['dependencies'][$class];

            try {
                $reflect = new \ReflectionClass($class);
            } catch (ReflectionException $e) {
                throw new \InvalidArgumentException($e->getMessage());
            }

            return $reflect->newInstanceArgs($dependClass['args']);
        }
        
        return new $class;
    }

    /**
     * @throws ReflectionException
     */
    public function getInjectedParam(array $reflectionParameters, array $requestParams): array
    {
        $injectedParams = [];

        foreach ($reflectionParameters as $param) {
            if ($param->isArray() || !$param->getClass()) {
                 $injectedParams[$param->getPosition()] = ($param->isDefaultValueAvailable())?$param->getDefaultValue():$requestParams[$param->name];
            } else {
                $class = $param->getClass()->getName();
                $injectedParams[$param->getPosition()] = $this->getObjectByClass($class);
            }
        }
        
        return $injectedParams;
    }
    
    private function getParams(\ReflectionMethod $methodObject): array
    {
        $matches = [];
        $docComment = $methodObject->getDocComment();
        
        if ($docComment) {
            preg_match_all("#@([\w]+)\s*\"?([\w\/:\-'\s*À-ȕ,]+)\"?\s*\*#", $docComment, $matches);
             if (isset($matches[1]) && $matches[2]) {

                return array_filter(
                    array_map('trim',
                            array_combine($matches[1], $matches[2])
                        )
                    );
            }
        }
        
        return $matches;
    }
}
