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
        include "./navbar.php";
    ?>
    <form action="#" method="post">
        <div style="display:block;">
            <select name="search_by">
                <option value="customer">Search by customer Name</option>
                <option value="name">Search by Product Name</option>
            </select>
            <input type="text" name="sValue" placeholder="Enter search term">
            <button type="submit">Search</button>
</div>
    </form>
</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$name = $_POST['search_by'];
$value = $_POST['sValue'];


$servername = "localhost";
    $username = "root";
    $password = "";
    $dataBase = "stk_mng";
    $conn = mysqli_connect($servername,$username,$password,$dataBase);
    if(!$conn){
        die("Sorry We failed to connect" . mysqli_connect_error());
    }else{
        //for sql injection
        $name = $conn->real_escape_string($name);
        $value = $conn->real_escape_string($value);

        $sql = "SELECT * FROM `customer` WHERE `$name` LIKE '%$value%'";
        $result = mysqli_query($conn,$sql);

        if($result){
            echo "<h2>Stock Records</h2>";
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "
                        <table border='1' cellpadding='10'>
                            <tr>
                                <th>S.No</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Customer</th>
                                <th>Consumable</th>
                                <th>Date</th>
                            </tr>
                            <tr>
                                <td>" . $row['sno'] . "</td>
                                <td>" . $row['name'] . "</td>
                                <td>" . $row['quantity'] . "</td>
                                <td>" . $row['customer'] . "</td>
                                <td>" . $row['consumable'] . "</td>
                                <td>" . $row['date'] . "</td>
                            </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No records found</td></tr>";
            }
        }else {
      echo '<br>error' . mysqli_connect_error();
    }
    }
}
?>
</table>