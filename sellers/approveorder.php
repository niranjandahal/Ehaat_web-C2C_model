<?php


include '../cors.php';
include '../dbconnection.php';
session_name('validseller');
session_start();

//best if statement ever
if (!isset($_SESSION['ref_seller_id'])) {
    if (!isset($_SESSION['seller_name'])) {
        if (!isset($_SESSION['seller_email'])) {
            http_response_code(401);
            echo "<script>alert('You are not logged in')</script>";
            echo "<script>window.location.href='sellerslogin.php'</script>";
            exit();
        }
    }
}
$recivedsellerid = $_SESSION['ref_seller_id'];


if (isset($_POST['approveit'])) {
    echo "<script>alert('Order Approved')</script>";
    $productid = $_POST['productid'];
    $userid = $_POST['userid'];
    //removed userid from booked column form products table
    $sql = "SELECT * FROM products WHERE id = $productid";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $bookedUsers = explode(',', $row['booked']);
        $bookeduserslength = count($bookedUsers);
        $newbooked = '';
        for ($i = 0; $i < $bookeduserslength; $i++) {
            if ($bookedUsers[$i] != $userid) {
                $newbooked .= $bookedUsers[$i] . ',';
            }
        }
        $newbooked = rtrim($newbooked, ',');
        $sql = "UPDATE products SET booked = '$newbooked' WHERE id = $productid";
        if ($conn->query($sql) === TRUE) {
            // echo "<script>alert('Order Approved')</script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
    //removed productid from ordereditem in users table where id = userid
    $sql1 = "SELECT * FROM users WHERE id = $userid";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0) {
        $row1 = $result1->fetch_assoc();
        $orderedItems = explode(',', $row1['ordereditem']);
        $orderedItemsLength = count($orderedItems);
        $newOrderedItems = '';
        for ($i = 0; $i < $orderedItemsLength; $i++) {
            if ($orderedItems[$i] != $productid) {
                $newOrderedItems .= $orderedItems[$i] . ',';
            }
        }
        $newOrderedItems = rtrim($newOrderedItems, ',');
        $sql1 = "UPDATE users SET ordereditem = '$newOrderedItems' WHERE id = $userid";
        if ($conn->query($sql1) === TRUE) {
            header('Location: middlewarepageforsuccessorreject.php');
            // echo "<script>alert('Order Approved')</script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
    //add the product id to approveditem column in users table where id = userid
    $sql2 = "SELECT * FROM users WHERE id = $userid";
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0) {
        $row2 = $result2->fetch_assoc();
        $approvedItems = $row2['approveditem'];
        $approvedItems .= ',' . $productid;
        $sql2 = "UPDATE users SET approveditem = '$approvedItems' WHERE id = $userid";
        if ($conn->query($sql2) === TRUE) {
            // echo "<script>alert('Order Approved')</script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
    //add user id to 'todeliver' column in products table go on adding new user id
    $sql3 = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql3);
    $stmt->bind_param("i", $productid);
    $stmt->execute();
    $result3 = $stmt->get_result();

    if ($result3->num_rows > 0) {
        $row3 = $result3->fetch_assoc();
        $todeliver = $row3['todeliver'];
        $todeliver .= ',' . $userid;

        $sql_update = "UPDATE products SET todeliver = ? WHERE id = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("si", $todeliver, $productid);

        if ($stmt_update->execute()) {
            // echo "<script>alert('Order Approved')</script>";
        } else {
            echo "Error updating record: " . $stmt_update->error;
        }

        $stmt_update->close();
    } else {
        echo "Product not found.";
    }

    $stmt->close();
}
if (isset($_POST['rejectit'])) {
    echo "<script>alert('Order Rejected')</script>";
    //removed userid from booked column form products table
    $productid = $_POST['productid'];
    $userid = $_POST['userid'];
    $sql = "SELECT * FROM products WHERE id = $productid";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $bookedUsers = explode(',', $row['booked']);
        $bookeduserslength = count($bookedUsers);
        $newbooked = '';
        for ($i = 0; $i < $bookeduserslength; $i++) {
            if ($bookedUsers[$i] != $userid) {
                $newbooked .= $bookedUsers[$i] . ',';
            }
        }
        $newbooked = rtrim($newbooked, ',');
        $sql = "UPDATE products SET booked = '$newbooked' WHERE id = $productid";
        if ($conn->query($sql) === TRUE) {
            // echo "<script>alert('Order Rejected')</script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
    //removed productid from ordereditem in users table where id = userid
    $sql1 = "SELECT * FROM users WHERE id = $userid";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0) {
        $row1 = $result1->fetch_assoc();
        $orderedItems = explode(',', $row1['ordereditem']);
        $orderedItemsLength = count($orderedItems);
        $newOrderedItems = '';
        for ($i = 0; $i < $orderedItemsLength; $i++) {
            if ($orderedItems[$i] != $productid) {
                $newOrderedItems .= $orderedItems[$i] . ',';
            }
        }
        $newOrderedItems = rtrim($newOrderedItems, ',');
        $sql1 = "UPDATE users SET ordereditem = '$newOrderedItems' WHERE id = $userid";
        if ($conn->query($sql1) === TRUE) {
            header('Location: middlewarepageforsuccessorreject.php');
            // echo "<script>alert('Order Rejected')</script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
}


echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>Your Page Title</title>";
echo "<style>";
echo "body { background-color: #20232a; color: #61dafb; font-family: 'Arial', sans-serif; }";
echo "h1, h2, h3, p { color: #61dafb; }";
echo "img { max-width: 100%; height: auto; }";
echo ".order-container { background-color: #282c34; color: #ffffff; padding: 20px; margin: 10px; border-radius: 10px; }";
echo ".form-container { margin-top: 10px; }";
echo ".approve-btn, .reject-btn { background-color: #61dafb; color: #20232a; padding: 5px 10px; margin-right: 10px; border: none; border-radius: 5px; cursor: pointer; }";
echo "</style>";
echo "</head>";
echo "<body>";
// Select all products from the database where booked column is non-zero and seller_id matches recivedsellerid
$sql = "SELECT * FROM products WHERE booked != '' AND seller_id = $recivedsellerid";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
    // Loop through each product
    while ($row = $result->fetch_assoc()) {
        $productId = $row['id'];
        $productName = $row['product_name'];
        $productImage = $row['product_image'];
        $bookedUsers = explode(',', $row['booked']); // Split the booked user IDs
        $bookeduserslength = count($bookedUsers);
        echo "<div class='order-container'>";
        echo "<h2>$productName</h2>";
        echo "<img src='$productImage' alt='$productName'>";

        // echo "<h2>$productName</h2>";
        // echo "<img src='$productImage' alt='$productName' width='100'>";


        // Loop through booked user IDs
        for ($i = 1; $i < $bookeduserslength; $i++) {
            // Query the users table to get username and phone number
            $userQuery = "SELECT * FROM users WHERE id = $bookedUsers[$i]";
            $userResult = $conn->query($userQuery);

            if ($userResult->num_rows > 0) {
                $userData = $userResult->fetch_assoc();
                $username = $userData['full_name'];
                $phoneNumber = $userData['phone_number'];
                $address = $userData['address'];


                // echo "<h3>$username</h3>";
                // echo "<p>$phoneNumber</p>";
                // echo "<p>$address</p>";

                //beautiful details of users who booked the product responsive
                echo "<p>Username: $username</p>";
                echo "<p>Phone Number: $phoneNumber</p>";
                echo "<p>Address: $address</p>";
                echo "<div class='form-container'>";
                echo "<form action='approveorder.php' method='post'>";
                echo "<input type='hidden' name='productid' value='$productId'>";
                echo "<input type='hidden' name='userid' value='$bookedUsers[$i]'>";
                echo "<button type='submit' name='approveit' class='approve-btn'>Approve</button>";
                echo "<button type='submit' name='rejectit' class='reject-btn'>Reject</button>";
                //user name and address and phoneno display
                echo "</form>";
                echo "</div>";

                //approve and reject section

                // echo "<form action='approveorder.php' method='post'>";
                // echo "<input type='hidden' name='productid' value='$productId'>";
                // echo "<input type='hidden' name='userid' value='$bookedUsers[$i]'>";
                // echo "<input type='submit' name='approveit' value='Approve'>";
                // echo "<input type='submit' name='rejectit' value='Reject'>";
                // echo "</form>";
            }
        }
        echo "</div>";
    }
} else {
    //beatuiful standard coloful css with text no order
    echo "<h1>No orders yet</h1>";
}

echo "</body>";
echo "</html>";
