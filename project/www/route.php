<?php

return [
    // '~^$~'=>[src\Controllers\MainController::class, 'main'],
    '~^$~'=>[src\Controllers\ArticleController::class, 'index'],
    '~article/(\d+)/edit~'=>[src\Controllers\ArticleController::class, 'edit'],
    '~article/(\d+)/update~'=>[src\Controllers\ArticleController::class, 'update'],
    '~^article/(\d+)$~'=>[src\Controllers\ArticleController::class, 'show'],
    '~^article/(\d+)/delete$~'=>[src\Controllers\ArticleController::class, 'delete'],
    '~^article/create$~'=>[src\Controllers\ArticleController::class, 'create'],
    '~^article/store$~'=>[src\Controllers\ArticleController::class, 'store'],
    '~^hello/(.+)$~'=>[src\Controllers\MainController::class,'sayHello'],

    '~^comment/add$~' => [src\Controllers\CommentController::class, 'addFromPost'],
    '~^comment/delete$~' => [src\Controllers\CommentController::class, 'deleteFromPost'],
    '~^comment/edit/(\d+)$~' => [src\Controllers\CommentController::class, 'editForm'],
    '~^comment/edit$~' => [src\Controllers\CommentController::class, 'editFromPost'],
];