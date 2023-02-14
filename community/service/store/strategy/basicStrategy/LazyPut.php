<?php

namespace service\store\strategy\basicStrategy;

use service\store\Container;

class LazyPut implements StoreStrategy
{

    function doWith(Container $container, $key, $value = null):bool
    {
        if ($value==null){
            return false;
        }
        $former = $container->get($key);
        if ($former==$value) {
            return true;
        }else{
            $container->put($key,$value);
            return true;
        }
    }
}