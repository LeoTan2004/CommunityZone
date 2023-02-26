<?php

class MapAttribute implements Attributes
{

    private function __construct(array $map)
    {
        $this->map = $map;
    }

    static function newInstance(?string $json)
    {
        $json_decode = json_decode($json);
        if ($json_decode instanceof ArrayObject){
            return new MapAttribute($json_decode);
        }else{
            return new MapAttribute([]);
        }
    }


    private array $map = [];

    function getAttibute(string $key)
    {
        if (isset($this->map[$key])){
            return $this->map[$key];
        }else{
            return null;
        }
    }

    function setAttribute(string $key, $value)
    {
        $this->map[$key] = $value;
        return true;
    }

    function persistence($opt)
    {
        if ($opt instanceof string){
            if ($opt=='JSON'){
                return json_encode($this);
            }
        }else{
            return false;
        }
    }
}