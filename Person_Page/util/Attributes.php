<?php

interface Attributes
{
    function setAttribute(string $key,$value);

    function getAttibute(string $key);

    function persistence($opt);
}