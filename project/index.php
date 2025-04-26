<?php


spl_autoload_register();

function MyAutoLoader(string $className) {
    require($className.'.php');
}

    $user = new User('Ivan');
    $article = new Article('title', 'text', $user);
    echo $article->getAuthor()->getName();


