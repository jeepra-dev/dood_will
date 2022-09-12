<?php

namespace Core\Entity;

abstract class AbstractEntity
{
    protected array $excludeProperties = [];

    public function toArray(): array
    {
        $data = [];
        $reflexion = new \ReflectionClass($this);
        $allProperties = $reflexion->getProperties();
        
        foreach ($allProperties as $propriety) {
            $proprietyName = $propriety->getName();
            $method = $reflexion->hasMethod('get'. ucfirst($proprietyName)) ? 'get'. ucfirst($proprietyName) : 'has'. ucfirst($proprietyName);

            if ($reflexion->hasMethod($method) && !in_array($proprietyName, $this->excludeProperties)) {
                $data[$proprietyName] = $this->$method();
            }
        }

        return $data;
    }
}
