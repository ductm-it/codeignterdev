<h1><?= $title ?></h1>
<?php echo validation_errors(); ?>
<?php echo form_open('posts/create')?>
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" aria-describedby="emailHelp" placeholder="Add title">
  </div>
  <div class="form-group">
    <label >Body</label>
    <textarea class="form-control" id="editor" name = "body" aria-describedby="bodyHelp" placeholder="Add body"></textarea>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category_id" class="form-control" id="category"></select>
      <?php foreach($categories as $category)?>
        <option value=<?php echo $category['name']?>><?php echo $category['name']?></option>
      <?php 'endforeach'; ?>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>