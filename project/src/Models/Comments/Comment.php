<?php

namespace src\Models\Comments;

use src\Models\ActiveRecordEntity;
use src\Models\Users\User;
use src\Models\Articles\Article;

class Comment extends ActiveRecordEntity
{
    protected $articleId;
    protected $authorId;
    protected $text;
    protected $createdAt;

    protected static function getTableName()
    {
        return 'comments';
    }

    public function getArticleId(): Article
    {
        return Article::getById($this->articleId);
    }

    public function getAuthorId(): User
    {
        return User::getById($this->authorId);
    }

    public function getText()
    {
        return $this->text;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public static function findByArticleId($articleId)
    {
        $db = \src\Services\Db::getInstance();
        $sql = 'SELECT * FROM `comments` WHERE `article_id` = :article_id ORDER BY `created_at` ASC';
        return $db->query($sql, [':article_id' => $articleId], static::class);
    }
} 