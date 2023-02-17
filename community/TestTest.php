<?php


use Service\store\container\cache\HashMapContainer;
use Service\store\Manager;
use Service\store\strategy\cacheStrategy\SimpleGet;
use Service\store\strategy\cacheStrategy\SimplePut;

class TestTest
{
    static function main()
    {
        echo "ss";
        $d = new Manager(new HashMapContainer(), new HashMapContainer(), new SimplePut(), new SimpleGet(), new SimpleGet());
        $d->put("ssh", "ssh");
        echo $d->get("ssh");
    }
}

TestTest::main();
