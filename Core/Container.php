<?php

namespace Core;

class Container{
    protected $bindings = [];

    public function bind($key, $resovler){
        $this->bindings[$key] = $resovler;
    }

    public function resolve($key){
        if(!array_key_exists($key, $this->bindings)){
            throw new \Exception("no matching binding for $key");
        }

        $resovler = $this->bindings[$key];
        return call_user_func($resovler);
    }

}
