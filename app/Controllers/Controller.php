<?php

namespace App\Controllers;

use Database\DBConnection;

abstract class Controller
{
    protected $db;

    public function __construct(DBConnection $db)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->db = $db;
    }

    protected function view(string $path, array $params = null)
    {
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php';
        /* not really need
        if ($params) {
            $params = extract($params); //Import variables into the current symbol table from an array
        }
        */
        $content = ob_get_clean();
        require VIEWS . 'layout.php';
    }

    protected function getDB()
    {
        return $this->db;
    }

    protected function IsAdmin()
    {
        if (isset($_SESSION['auth']) && $_SESSION['auth'] === 1) {
           return true;
        }
        return header('Location: ' . REPERT . '/login');
    }
}
