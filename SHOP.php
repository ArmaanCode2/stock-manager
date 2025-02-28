<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOP</title>
</head>
<body>
    <?php
        include "components/navbar.php";
    ?>
    <form action="#" method="post">
        <div style="display:block;">
        <input type="name" name="name" placeholder="Enter product name">
        <input type="number" name="quantity" placeholder="Enter Quantity">
        <input type="text" name="customer" placeholder="Enter customer name">
        <label>Consumable:</label>
        <select name="option">
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
        <button type="submit">Submit</button>
</div>
    </form>
</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$name = $_POST['name'];
$quantity = $_POST['quantity'];
$customer = $_POST['customer'];
$consumable = $_POST['option'];



require "components/server_con.php";
    $conn = mysqli_connect($servername,$username,$password,$dataBase);
    if(!$conn){
        die("Sorry We failed to connect" . mysqli_connect_error());
    }
    $sql = "INSERT INTO `customer` (`name`, `quantity`, `customer`,`consumable`, `date`) VALUES ('$name', '$quantity', '$customer', '$consumable', current_timestamp())";
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