<h2><?php echo $post['title']; ?></h2>
<div class="post-body">
    <small>Post on: <?= $post['created_at'] ?></small><br>
    <?php echo $post['body']; ?>
</div>

<br>
<a class = "btn btn-primary pull-left" href="<?php echo base_url(); ?>posts/edit/<?= $post['slug'] ?>">Edit</a>
<?php echo form_open('posts/delete/'.$post['id'])?>
    <input type="submit" class = "btn btn-danger" value="Delete">
</form>