<?php

use Service\store\container\cache\HashMapContainer;
use Service\store\Manager;
use Service\store\strategy\cacheStrategy\SimpleGet;
use Service\store\strategy\cacheStrategy\SimplePut;

$d = new Manager(new HashMapContainer(),new HashMapContainer(),new SimplePut(),new SimpleGet(),new SimpleGet());
$d->put("key","value");
echo $d->get("key");
