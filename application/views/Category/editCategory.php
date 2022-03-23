<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
</head>
<body>
        <?php foreach ($category as $category): ?>

            <div class="container">
                <form action="<?= base_url() ?>updateCategory" method="post">
                    <input type="text" name="id" value="<?php echo $category['id'] ?>" hidden>
                    <span>Edit Category</span> <input type="text" name="category" placeholder="<?php echo $category['name'] ?>">
                    <input type="submit">
                </form>
            </div>
         <?php endforeach; ?>

</body>
</html>