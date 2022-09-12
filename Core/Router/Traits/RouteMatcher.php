<?php

namespace Core\Router\Traits;

class RouteMatcher
{       
    private array $keys = [];
    private array $values = [];
    private string $path;
    private array $urlParams = [];

    private function isSameRoot(): bool
    {
        $path = explode('/', $this->path);
        $url = explode('/', URL_WEBSITE);
        $count = ( count($path) - count($this->keys));
        
        for ($i = 0; $i < $count; $i++) {
            if ($path[$i] != $url[$i]) {

                return false;
            }
        }

        return true;
    }
    
    private function getRegexPathAndKeys(): array|string|null
    {
        $this->keys = [];

        return  preg_replace_callback('#:([\w]+)#', function ($matches) {
                    $this->keys[] =  $matches[1];

                    return '([^/]+)';
                }, $this->path);
    }
    
    public function isMatched(string $path): bool
    {
        $this->path = $path;
        $regexPath = $this->getRegexPathAndKeys();
        
        if (preg_match("#^$regexPath#i", URL_WEBSITE, $this->values) && $this->isSameRoot()) {
            array_shift($this->values);
            $this->setUrlParams(array_combine($this->keys, $this->values));
            
            return true;
        }
        
        return false;
    }
    
    public function getKeys(): array
    {
        return $this->keys;
    }

    public function getValues(): array
    {
        return $this->values;
    }

    public function setUrlParams(array $urlParams): static
    {
        $this->urlParams = $urlParams;

        return $this;
    }

    public function getUrlParams(): array
    {
        return $this->urlParams;
    }

    public function getPath(): string
    {
        return $this->path;
    }
}
