<?php

namespace App\Controllers;

class BlogController {

    public function index() 
    {
        echo 'Je suis la home page';
    }

    public function show(int $id)
    {
        echo 'Je suis le post '.$id;
    }
}