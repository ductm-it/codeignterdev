<?= $title ?>
<?php foreach ($posts as $post)?>
    <h3><?= $post['title'] ?></h3>
    <small>Post on: <?= $post['created_at'] ?></small><br>
    <?= $post['body'] ?>
    <p><a class="btn btn-default" href="<?php echo site_url('posts/'.$post['slug'])?>">Read More</a></p>
<?php 'endforeach'; ?>