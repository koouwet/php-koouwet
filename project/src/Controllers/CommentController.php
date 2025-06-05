<?php

namespace src\Controllers;

use src\Models\Comments\Comment;
use src\View\View;

class CommentController
{
    private $view;
    public function __construct()
    {
        $this->view = new View();
    }

    public function add($articleId, $authorId, $text)
    {
        $comment = new Comment();
        $comment->articleId = $articleId;
        $comment->authorId = $authorId;
        $comment->text = $text;
        $comment->createdAt = date('Y-m-d H:i:s');
        $comment->save();
        // Можно сделать редирект или отобразить результат
    }

    public function edit($commentId, $text)
    {
        $comment = Comment::getById($commentId);
        if ($comment) {
            $comment->text = $text;
            $comment->save();
        }
        // Можно сделать редирект или отобразить результат
    }

    public function delete($commentId)
    {
        $comment = Comment::getById($commentId);
        if ($comment) {
            $comment->delete();
        }
        // Можно сделать редирект или отобразить результат
    }

    public function addFromPost()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $articleId = $_POST['article_id'] ?? null;
            $authorId = $_POST['author_id'] ?? null;
            $text = $_POST['text'] ?? null;
            if ($articleId && $authorId && $text) {
                $comment = new Comment();
                $comment->articleId = $articleId;
                $comment->authorId = $authorId;
                $comment->text = $text;
                $comment->createdAt = date('Y-m-d H:i:s');
                $comment->save();
                header('Location: '.dirname($_SERVER['SCRIPT_NAME']).'/article/'.$articleId);
                exit;
            }
        }
        // Можно добавить обработку ошибок или показать форму
    }

    public function deleteFromPost()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $commentId = $_POST['comment_id'] ?? null;
            $articleId = $_POST['article_id'] ?? null;
            if ($commentId) {
                $comment = Comment::getById($commentId);
                if ($comment) {
                    $comment->delete();
                }
                if ($articleId) {
                    header('Location: '.dirname($_SERVER['SCRIPT_NAME']).'/article/'.$articleId);
                    exit;
                }
            }
        }
    }

    public function editForm($commentId)
    {
        $comment = Comment::getById($commentId);
        if ($comment) {
            $this->view->renderHtml('comments/edit', ['comment' => $comment]);
        } else {
            // Можно вывести ошибку
        }
    }

    public function editFromPost()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $commentId = $_POST['comment_id'] ?? null;
            $articleId = $_POST['article_id'] ?? null;
            $text = $_POST['text'] ?? null;
            if ($commentId && $text) {
                $comment = Comment::getById($commentId);
                if ($comment) {
                    $comment->text = $text;
                    $comment->save();
                    if ($articleId) {
                        header('Location: '.dirname($_SERVER['SCRIPT_NAME']).'/article/'.$articleId);
                        exit;
                    }
                }
            }
        }
        // Можно добавить обработку ошибок или показать форму
    }
} 