<?php

namespace Router;

use Database\DBConnection;

class Route
{
    public $path;
    public $action;
    public $matches;

    public function __construct($path, $action)
    {
        $this->path = trim($path, '/');
        $this->action = $action;
    }

    public function matches(string $url)
    {
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $pathToMatch = "#^$path$#";
        if (preg_match($pathToMatch,  $url, $matches)) {
            $this->matches = $matches;
            //var_dump($matches);
           // exit;
            return true;
        } else 
        {
            return false;
        }
    }

    public function execute()
    {
        $params = explode('@', $this->action);
        $controller = new $params[0](new DBConnection('myapp', 'localhost', 'root', ''));
        $method = $params[1];
        //here I have to check that id is an int and greater than 0 otherwise I return a 404 error
        return isset($this->matches[1]) ? $controller->$method($this->matches[1]) : $controller->$method();
    }

}