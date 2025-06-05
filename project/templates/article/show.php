<?php require(dirname(__DIR__).'/header.php');?>
<div class="card mt-3" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?=$article->getTitle();?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?=$article->getAuthorId()->getNickname();?></h6>
    <p class="card-text"><?=$article->getText();?></p>
    <a href="<?=dirname($_SERVER['SCRIPT_NAME'])?>/article/<?=$article->getId();?>/edit" class="card-link">Article update</a>
    <a href="<?=dirname($_SERVER['SCRIPT_NAME'])?>/article/<?=$article->getId();?>/delete" class="card-link">Article delete</a>
  </div>
</div>

<hr>
<h4>Комментарии</h4>
<?php foreach($article->getComments() as $comment): ?>
    <?php $commentObj = $comment; include dirname(__DIR__).'/comments/comment.php'; ?>
    <!-- Можно добавить кнопки редактирования/удаления -->
<?php endforeach; ?>

<h5>Добавить комментарий</h5>
<form method="post" action="?route=comment/add">
    <input type="hidden" name="article_id" value="<?=$article->getId();?>">
    <div class="mb-3">
        <label for="author_id" class="form-label">ID автора</label>
        <input type="text" class="form-control" id="author_id" name="author_id" required>
    </div>
    <div class="mb-3">
        <label for="text" class="form-label">Комментарий</label>
        <textarea class="form-control" id="text" name="text" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Отправить</button>
</form>
<?php require(dirname(__DIR__).'/footer.html');?>