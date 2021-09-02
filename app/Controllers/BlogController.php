<?php

namespace App\Controllers;

class BlogController extends Controller{

    public function index() 
    {
        return $this->view('blog.index'); 
    }

    public function show(int $id) // put string if you don't want to have an error with id "a56" for example
    {
        return $this->view('blog.show', compact('id')); //Create array containing variables and their values
    }
}