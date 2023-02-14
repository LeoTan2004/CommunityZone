<?php

namespace service\store\strategy\cacheStrategy;

use service\store\Container;

class SimplePut implements StoreCacheStrategy
{

    function doWith(Container $container, Container $cache, $key, $value = null)
    {
        if ($value==null){
            return false;
        }
        if ($cache->put($key,$value)){
            if ($container->put($key,$value)) {
                return true;
            }else{
                $cache->del($key);
                return false;
            }
        }
        return false;
    }
}