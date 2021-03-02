<?php
   $connect = pg_connect("host=ec2-34-192-58-41.compute-1.amazonaws.com
  dbname=d9vnrte4pa2u89
  port=5432
  user=hlmwaqxejaexwl
  password=eaa2a48bf6e6bb49dabb555d97106a0fa816acde28d1acd4e7883faeedab0ed7
   sslmode=require");

   if ($connect === false) {
      die("ERROR: Something went wrong with conenction!");
    } else {
      $product_name = $_POST['Productname'];
      $product_type = $_POST['Type'];
      $price = $_POST['Price'];

    }
    $query = "INSERT INTO products (product_name, product_type, price) 
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
