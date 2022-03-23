<h2><?php echo $post['title']; ?></h2>
<div class="post-body">
    <small>Post on: <?= $post['created_at'] ?></small><br>
    <?php echo $post['body']; ?>
</div>
