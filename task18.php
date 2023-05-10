<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 18</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <h1>Products & Categories Join Table</h1>
    <?php
        require_once 'connection.php';
        $query = "SELECT products.id, categories.name AS categories_name, products.name AS products_name, 
        products.description, products.price, products.status, products.created_at, 
        products.updated_at, products.created_by, products.verivied_at, products.verivied_by
        FROM products
        INNER JOIN 
          (SELECT id, categories.name 
           FROM categories) AS categories	
        ON products.category_id = categories.id;";
        $result = mysqli_query($connection, $query);
    ?>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Category</th>
                    <th>Products</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Verified at</th>
                    <th>Verified by</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) :?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['categories_name'] ?></td>
                    <td><?= $row['products_name'] ?></td>
                    <td><?= $row['description'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td><?= $row['status'] ?></td>
                    <td><?= $row['created_at'] ?></td>
                    <td><?= $row['updated_at'] ?></td>
                    <td><?= $row['created_by'] ?></td>
                    <td><?= $row['verivied_at'] ?></td>
                    <td><?= $row['verivied_by'] ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    
    <?php mysqli_close($connection); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>