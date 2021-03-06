<?php

namespace App\Controllers\Admin;

use App\Models\User;
use App\Models\Comment;
use App\Controllers\Controller;
use App\Exceptions\NotFoundException;

class CommentController extends Controller
{
    public function index()
    {
        $this->IsAdmin();

        $comments = (new Comment($this->getDB()))->all();
        return $this->view('admin.comment.index', compact('comments'));
    }

    public function edit(int $id)
    {
        $this->IsAdmin();

        $comment = (new Comment($this->getDB()))->findById($id);
        if($comment){
            $users = (new User($this->getDB()))->all();
            return $this->view('admin.comment.form', compact('comment', 'users'));
        }
        $exception = new NotFoundException();
        return $exception->error404();
        
    }

    public function update(int $id)
    {
        $this->IsAdmin();

        $comment = new Comment($this->getDB());
        $result = $comment->update($id, $_POST);

        if($result) {
            return header('Location: /admin/comments');
        }   
    }

    public function destroy(int $id)
    {
        $this->IsAdmin();
        $comment = new Comment($this->getDB());
        $result = $comment->destroy($id);

        if($result) {
            return header('Location: /admin/comments');
        }
    }

    public function checked(int $id)
    {
        $this->IsAdmin();

        $comment = new Comment($this->getDB());

        $data=['checked' => 1];

        $result = $comment->update($id, $data);

        if($result) {
            return header('Location: /admin/comments');
        }
    }

    public function noChecked(int $id)
    {
        $this->IsAdmin();

        $comment = new Comment($this->getDB());

        $data=['checked' => 0];

        $result = $comment->update($id, $data);

        if($result) {
            return header('Location: /admin/comments');
        }
    }
}