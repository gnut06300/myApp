<?php

namespace App\Controllers;

use App\Models\Post;

class BlogController extends Controller{

    public function welcome() 
    {
        return $this->view('blog.welcome'); 
    }
    public function index() 
    {
        $post = new Post($this->getDB());
        $posts = $post->all();
        /* no longer needed after model building
        $stmat = $this->db->getPDO()->query('SELECT * FROM posts ORDER BY created_at DESC');
        $posts = $stmat->fetchAll();
        */
        return $this->view('blog.index', compact('posts')); 
    }

    public function show(int $id) // put string if you don't want to have an error with id "a56" for example
    {
        /*
        //$db = new DBConnection('myapp', 'localhost', 'root', '');
        //var_dump($db->getPDO());
        $req = $this->db->getPDO()->query('SELECT * FROM posts');
        $posts = $req->fetchAll();
        //var_dump($posts);
        foreach ($posts as $post) {
            echo $post->title;
        }
        */
        $post = new Post($this->getDB());
        $post = $post->findById($id);
        /*
        $stmat = $this->db->getPDO()->prepare('SELECT * FROM posts WHERE id = ?');
        $stmat->execute([$id]);
        $post = $stmat->fetch();
        */
        return $this->view('blog.show', compact('post')); //Create array containing variables and their values
    }
}