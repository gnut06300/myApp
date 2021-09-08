<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller {

    public function index()
    {
        $this->IsAdmin();
        
        $posts = (new Post($this->getDB()))->all();

        return $this->view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        $this->IsAdmin();

        $tags = (new Tag($this->getDB()))->all();

        return $this->view('admin.post.form', compact('tags'));
    }

    public function createPost()
    {   
        $this->IsAdmin();

        $post = new Post($this->getDB());

        // Pop the element off the end of array
        $tags = array_pop($_POST);
        //var_dump($_POST, $tags); die();

        $result = $post->create($_POST, $tags);

        if($result) {
            return header('Location: ' . REPERT . '/admin/posts');
        }
    }

    public function edit(int $id)
    {
        $this->IsAdmin();
        
        $post = (new Post($this->getDB()))->findById($id);
        $tags = (new Tag($this->getDB()))->all();

        return $this->view('admin.post.form', compact('post', 'tags'));
    }

    public function update(int $id)
    {
        $this->IsAdmin();

        $post = new Post($this->getDB());

        // Pop the element off the end of array
        $tags = array_pop($_POST);
        //var_dump($_POST, $tags); die();

        $result = $post->update($id, $_POST, $tags);

        if($result) {
            return header('Location: ' . REPERT . '/admin/posts');
        }
    }

    public function destroy(int $id)
    {
        $this->IsAdmin();
        
        $post = new Post($this->getDB());
        $result = $post->destroy($id);

        if($result) {
            return header('Location: ' . REPERT . '/admin/posts');
        }
    }
}