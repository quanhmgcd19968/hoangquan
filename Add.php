<?php
   $connect = pg_connect("host=ec2-54-209-43-223.compute-1.amazonaws.com
   dbname=d6rr91cmsif2b3
   port=5432
   user=hlotdilcmsymox
   password=51b98b5ecd79449ea1f7ed9dccb511adbc4ce2642d3862087cbbd7e3287b0151
    sslmode=require");
    if ($connect === false) {
        die("ERROR: Something went wrong with conenction!");
    }
    $query ="select * from products";
    $result = pg_query($connect,$query);
    ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>ATN Shop</title>
    <link rel="stylesheet" type="text/css" href="Add.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <div class="container">
        <div class="login-form">
            <form action="AddProduct.php" method="POST">
                <h2>Products</h2>
                <input type="text" name="Productname" placeholder="Product Name">
                <input type="text" name="Type" placeholder="Product type">
                <input type="text" name="Price" placeholder="Price">
                <button type="Add">Add</button>
            </form>
        </div>
        <table class="table table-striped table-primary">
                <thead>
                    <tr class="table-primary">
                    <th scope="col">Toy Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Amount</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            if($result > 0){
                                while ($row_data = pg_fetch_assoc($result)){
                        ?>
                        <tr>
                            <td class="table-primary" ><?php echo $row_data["product_name"];?></td>
                            <td class="table-primary"> <?php echo $row_data["product_type"];?></td>
                            <td class="table-primary"><?php echo $row_data["price"];?></td>
                        </tr>
                        <?php
                                }
                            }
                            else{
                                echo "<script>alert('Fetch database fail !');</script>" . pg_errormessage($query);
                            }
                        ?>
                </tbody>
            </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
