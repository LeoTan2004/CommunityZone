<?php

namespace service\store;

use service\store\strategy\cacheStrategy\StoreCacheStrategy;

class Manager implements Container
{
    private Container $container;
    private Container $cache;
    private StoreCacheStrategy $putStrategy;
    private StoreCacheStrategy $getStrategy;

    private StoreCacheStrategy $delStrategy;

    public function __construct(Container $container,Container $cache, StoreCacheStrategy $putStrategy, StoreCacheStrategy $getStrategy,StoreCacheStrategy $delStrategy)
    {
        $this->cache = $cache;
        $this->container=$container;
        $this->getStrategy = $getStrategy;
        $this->putStrategy = $putStrategy;
        $this->delStrategy = $delStrategy;
    }

    function get($key)
    {
        return $this->getStrategy->doWith($this->container,$this->cache,$key);
    }

    function put($key, $value):bool
    {
        return $this->putStrategy->doWith($this->container,$this->cache,$key,$value);
    }

    function del($key):bool
    {
        return $this->delStrategy->doWith($this->container,$this->cache,$key);
    }
}