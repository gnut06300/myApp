<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller {

    public function index()
    {
        $posts = (new Post($this->getDB()))->all();

        return $this->view('admin.post.index', compact('posts'));
    }

    public function edit(int $id)
    {
        $post = (new Post($this->getDB()))->findById($id);
        $tags = (new Tag($this->getDB()))->all();

        return $this->view('admin.post.edit', compact('post', 'tags'));
    }

    public function update(int $id)
    {
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
        $post = new Post($this->getDB());
        $result = $post->destroy($id);

        if($result) {
            return header('Location: ' . REPERT . '/admin/posts');
        }
    }
}