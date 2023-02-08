<?php

namespace ToDo;

class Router{
    private $routes = [];
    public static function load($file){
        $router = new static;
        require $file;
        return $router;
    }

    public function define($routes){
        $this->routes = $routes;
    }

    public function direct ($uri){
        $uriPart = explode('/',$uri);
        if(array_key_exists($uri,$this->routes)){ //tikrina ar egzistuoja masyve
            return $this->routes[$uri];
        }else{
            $newUri = $uriPart[0].'/'.$uriPart[1];
            if(array_key_exists($newUri, $this->routes)){ ///tikrina ar egzistuoja pirma uri dalis masyve
                $this->routes[$uri] = $this->routes[$newUri]; //perasom masyvo elemento indeksa su reikiamu id
                unset($this->routes[$newUri]);
                if(array_key_exists($uri, $this->routes)){ //tikrinam ar masyve yra routas su reikiamu indeksu
                    return $this->routes[$uri]; //grazinam reikiama kontroleri
                }
                else{
                    return $this->routes[404];
                }
                return $this->routes[404];
            }
        }
    }
}