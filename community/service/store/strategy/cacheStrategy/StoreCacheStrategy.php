<?php

namespace service\store\strategy\cacheStrategy;

use service\store\Container;

interface StoreCacheStrategy
{
    function doWith(Container $container,Container $cache,$key,$value=null);
}