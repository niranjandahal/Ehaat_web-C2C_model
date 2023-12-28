<?php
include '../cors.php';
include '../dbconnection.php';
session_name('validuser');
session_start();

if (isset($_SESSION['userloggedin']) && $_SESSION['userloggedin'] === 'true') {
    $user_id = $_SESSION['user_id'];
    if ($user_id != null) {
        if (isset($_POST['delivered'])) {
            $productid = $_POST['product_id'];
            $sql = "SELECT * FROM users WHERE id = $user_id";
            $result = $conn->query($sql);
            //delete product id from approveditem column in users table
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $approvedItems = explode(',', $row['approveditem']);
                $approvedItemsLength = count($approvedItems);
                $newApprovedItems = '';
                for ($i = 0; $i < $approvedItemsLength; $i++) {
                    if ($approvedItems[$i] != $productid) {
                        $newApprovedItems .= $approvedItems[$i] . ',';
                    }
                }
                $newApprovedItems = rtrim($newApprovedItems, ',');
                $sql = "UPDATE users SET approveditem = '$newApprovedItems' WHERE id = $user_id";
                if ($conn->query($sql) === TRUE) {
                    // echo "<script>alert('Product removed from your approved list.')</script>";
                    header('Location: ordereditem.php');
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
            //delete userid from todeliver column in products table
            $sql1 = "SELECT * FROM products WHERE id = $productid";
            $result1 = $conn->query($sql1);
            if ($result1->num_rows > 0) {
                $row1 = $result1->fetch_assoc();
                $todeliver = explode(',', $row1['todeliver']);
                $todeliverlength = count($todeliver);
                $newtodeliver = '';
                for ($i = 0; $i < $todeliverlength; $i++) {
                    if ($todeliver[$i] != $user_id) {
                        $newtodeliver .= $todeliver[$i] . ',';
                    }
                }
                $newtodeliver = rtrim($newtodeliver, ',');
                $sql1 = "UPDATE products SET todeliver = '$newtodeliver' WHERE id = $productid";
                if ($conn->query($sql1) === TRUE) {
                    // echo "<script>alert('Product removed from your approved list.')</script>";
                    header('Location: ordereditem.php');
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
    }
} else {
    echo "<script>alert('You are not logged in. Please log in to buy products.')</script>";
    echo "<script>window.location.href='../index.html'</script>";
}
