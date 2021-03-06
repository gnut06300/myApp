<?php

namespace App\Controllers;

use App\Exceptions\NotFoundException;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Validation\Validator;

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
        if($post){
            return $this->view('blog.show', compact('post')); //Create array containing variables and their values

        }
        $exception = new NotFoundException();
        return $exception->error404();
        
        /*
        $stmat = $this->db->getPDO()->prepare('SELECT * FROM posts WHERE id = ?');
        $stmat->execute([$id]);
        $post = $stmat->fetch();
        */
    }

    public function createComment(int $id)
    {
        $validator = new Validator($_POST);
        $errors = $validator->validate([
            'content' => ['required', 'min:4'],
        ]);

        if ($errors) {
            $_SESSION['errors'][] = $errors;
            header('Location: /posts//'.$id);
            
        }

        $data = [
            'post_id' => $id,
            'user_id' => $_SESSION['user_id'],
            'content' => $_POST['content']
        ];

        $comment = new Comment($this->getDB());
        $result = $comment->create($data);

        if($result) {
            return header('Location: /posts//'.$id.'?comment=created');
        }

        $post = new Post($this->getDB());
        $post = $post->findById($id);
        return $this->view('blog.show', compact('post'));
    }

    public function tag(int $id)
    {
        //var_dump($id);
        $tag = (new Tag($this->getDB()))->findById($id);
        if($tag){
            return $this->view('blog.tag', compact('tag'));
        }else{
            $exception = new NotFoundException();
            return $exception->error404();
        }

    }
}