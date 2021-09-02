<?php

namespace App\Controllers;

class Controller
{
    public function view(string $path, array $params = null)
    {
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php';
        if ($params) {
            $params = extract($params); //Import variables into the current symbol table from an array
        }
        $content = ob_get_clean();
        require VIEWS . 'layout.php';

    }
}