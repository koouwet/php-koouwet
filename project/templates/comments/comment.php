<div class="comment">
    <div class="comment-author">
        Автор: <?= htmlspecialchars($comment->getAuthorId()->getNickname()) ?>
    </div>
    <div class="comment-date">
        Дата: <?= htmlspecialchars($comment->getCreatedAt()) ?>
    </div>
    <div class="comment-text">
        <?= nl2br(htmlspecialchars($comment->getText())) ?>
    </div>
    <div class="comment-actions mt-2">
        <form method="post" action="?route=comment/delete" style="display:inline;">
            <input type="hidden" name="comment_id" value="<?= $comment->getId() ?>">
            <input type="hidden" name="article_id" value="<?= $comment->getArticleId()->getId() ?>">
            <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
        </form>
        <a href="?route=comment/edit/<?= $comment->getId() ?>" class="btn btn-secondary btn-sm">Редактировать</a>
    </div>
</div> 