<?php

namespace service\store;

/**
 * 这是一个数据容器的抽象,不一定是数据库,也可以是redis,之类的,总是实现增删改查即可
 */
interface Container
{
    function get($key);
    function put($key,$value):bool;//可增可改
    function del($key):bool;
}