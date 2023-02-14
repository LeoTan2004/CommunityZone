<?php

namespace service\store\strategy\cacheStrategy;

use bean\comment\NullComment;
use bean\NullEntity;
use service\store\Container;

class SimpleGet implements StoreCacheStrategy
{
    /**
     * @param Container $container 数据源
     * @param Container $cache 缓存源
     * @param $key string 数据键
     * @param $value object 如果没有找到是返回的值
     * @return NullEntity|mixed 返回获得到的用户对象,
     */
    function doWith(Container $container, Container $cache, $key, $value = null)
    {
        if ($cache->get($key)==null){
            $user = $container->get($key);
            if (!($user instanceof NullEntity)){
                $cache->put($user->getUserID(),$user);
            }
            $u =  clone $user;
            return  $u;
        }
        return $value;
    }
}