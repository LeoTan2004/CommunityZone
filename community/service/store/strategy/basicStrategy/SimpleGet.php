<?php

namespace service\store\strategy\basicStrategy;

use service\store\Container;

class SimpleGet implements StoreStrategy
{
    function doWith(Container $container, $key, $value = null)
    {
        return $container->get($key);
    }
}