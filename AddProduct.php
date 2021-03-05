<?php
   $connect = pg_connect("host=ec2-54-209-43-223.compute-1.amazonaws.com
  dbname=d6rr91cmsif2b3
  port=5432
  user=hlotdilcmsymox
  password=51b98b5ecd79449ea1f7ed9dccb511adbc4ce2642d3862087cbbd7e3287b0151
   sslmode=require");

   if ($connect === false) {
      die("ERROR: Something went wrong with connection!");
    } else {
      $product_name = $_POST['Productname'];
      $product_type = $_POST['Type'];
      $price = $_POST['Price'];

    }
    $query = "INSERT INTO product (product_name, product_type, price) 
    VALUES('$product_name', '$product_type', '$price');";
    $result = pg_query($connect, $query);
    if ($result) {
      echo "<script>alert('Record added succesfully!, Refresh');</script>";
      header('refresh: 3; url=Add.php');
    } else {
      echo ("ERROR + $query") . pg_errormessage($query);
    }
    pg_close($connect);
?>
