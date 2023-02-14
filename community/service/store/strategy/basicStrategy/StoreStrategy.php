<?php

namespace service\store\strategy\basicStrategy;

use service\store\Container;

interface StoreStrategy
{
    function doWith(Container $container,$key,$value=null);
}