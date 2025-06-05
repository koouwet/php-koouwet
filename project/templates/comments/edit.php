<?php require(dirname(__DIR__).'/header.php'); ?>
<h4>Редактировать комментарий</h4>
<form method="post" action="<?=dirname($_SERVER['SCRIPT_NAME'])?>/comment/edit">
    <input type="hidden" name="comment_id" value="<?= $comment->getId() ?>">
    <input type="hidden" name="article_id" value="<?= $comment->getArticleId()->getId() ?>">
    <div class="mb-3">
        <label for="text" class="form-label">Комментарий</label>
        <textarea class="form-control" id="text" name="text" rows="3" required><?= htmlspecialchars($comment->getText()) ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Сохранить</button>
</form>
<?php require(dirname(__DIR__).'/footer.html'); ?> 