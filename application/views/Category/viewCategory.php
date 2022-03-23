<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <style>
        tr, th, td{
            border:1px solid #D0D0D0;
            padding: 20px;
        }
    </style>
</head>
<body>
    <h1>Category List</h1>
    <a href="addCategory">Add New</a>
    <div class="container">
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            
                <?php foreach ($categorys as $category): ?>
                    <tr>                
                        <td><?php echo $category['id']?></td>
                        <td><?php echo $category['name']?></td>
                        <td><a href="editCategory/<?= $category['id'] ?>">Edit</a></td>
                        <td><a href="deleteCategory/<?= $category['id'] ?>">Delete</a></td>
                     </tr>
                <?php endforeach; ?>
           
        </table>
        </div>
    </div>
</body>
</html>