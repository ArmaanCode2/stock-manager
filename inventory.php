<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
</head>
<body>
    <?php 
        include "components/navbar.php";
    ?>

    <form action="#" method="post">
        <div style="display:block;">
            <input required type="name" name="name" placeholder="Enter Product Name">
            <input required type="number" name="cost" placeholder="Enter Cost" min="0">
            <input required type="number" name="quantity" placeholder="Enter Quantity" min="0">
            <input required type="text" name="seller" placeholder="Enter Seller Name">
            <label for="custom_date">Choose Date:</label>
            <input type="date" id="custom_date" name="custom_date">

            <button type="submit">Submit</button>

            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>


<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $cost = $_POST['cost'];
        $quantity = $_POST['quantity'];
        $seller = $_POST['seller'];
        $selected_date = !empty($_POST['custom_date']) ? $_POST['custom_date'] : date('Y-m-d');

        require "components/server_con.php";
        $conn = mysqli_connect($servername,$username,$password,$dataBase);
        if(!$conn){
            die("Sorry We failed to connect" . mysqli_connect_error());
        }
        $sql = "INSERT INTO `inventory` (`product_name`, `cost`, `quantity`,`seller`, `date`) VALUES ('$name', '$cost', '$quantity', '$seller', '$selected_date')";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo "<script>
                    alert('Entry Recorded');
                </script>";
         }else {
            echo '<br>error' . mysqli_connect_error();
        }
    }
?>