<h1><?= $title ?></h1>
<?php echo validation_errors(); ?>
<?php echo form_open('posts/update')?>
    <input type="hidden" name="id" value="<?= $post['id']?>">
  <div class="form-group">
    <label>Title</label>
    <input type="text" value="<?php echo $post['title']?>" class="form-control" name="title" aria-describedby="emailHelp" placeholder="Add title">
  </div>
  <div class="form-group">
    <label >Body</label>
    <textarea class="form-control" value="<?php echo $post['body']?>" name = "body" aria-describedby="bodyHelp" placeholder="Add body"></textarea>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category_id" class="form-control" id="category">
      <?php foreach($categories as $category)?>
        <option value="<?php echo $category['id']?>"><?php echo $category['name']?></option>
      <?php 'endforeach'; ?>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>