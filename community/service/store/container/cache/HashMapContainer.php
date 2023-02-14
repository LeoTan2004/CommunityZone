<?php

namespace service\store\container\cache;

use service\store\Container;
use service\store\strategy\basicStrategy\StoreStrategy;

class HashMapContainer implements Container
{
    private array $container;
    public function __construct()
    {
        $this->container= array();
    }

    function get($key)
    {
        return $this->container[$key];
    }

    function put($key, $value):bool
    {
        $this->container[$key] = $value;
        return true;
    }

    function del($key):bool
    {
        unset($this->container[$key]);
        return true;
    }
}