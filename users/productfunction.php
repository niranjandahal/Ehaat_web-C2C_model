<?php
include '../cors.php';
session_name('validuser');
session_start();
include '../dbconnection.php';
if (!$conn) {
    echo json_encode([
        'error' => true,
        'errormessage' => mysqli_connect_error(),
    ]);
    exit();
}

function displayallproducts()
{
    global $conn;
    $query = "SELECT products.*, sellers.full_name AS seller_name FROM products INNER JOIN sellers ON products.seller_id = sellers.id WHERE products.approved = 1 ORDER BY seller_name";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $resultarray = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $temparray = array(
                'product_name' => $row['product_name'],
                'product_description' => $row['product_description'],
                'product_price' => $row['product_price'],
                'product_category' => $row['product_category'],
                'product_image' => $row['product_image'],
                'id' => $row['id'],
                'seller_id' => $row['seller_id'],
                'seller_name' => $row['seller_name'],
            );
            $resultarray[] = $temparray;
        }
        header("Content-Type: application/json");
        echo json_encode($resultarray);
        exit();
    } else {
        header("Content-Type: application/json");
        echo json_encode([
            'error' => true,
            'errormessage' => 'No approved Product',
        ]);
        exit();
    }
    mysqli_close($conn);
}

function displaycategoryproducts()
{
    global $conn;
    $query = "SELECT products.*, sellers.full_name AS seller_name FROM products INNER JOIN sellers ON products.seller_id = sellers.id WHERE products.approved = 1 ORDER BY products.product_category";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $resultarray = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $productcategory = $row['product_category'];
            if (!isset($resultarray[$productcategory])) {
                $resultarray[$productcategory] = array();
            }

            $temparray = array(
                'product_name' => $row['product_name'],
                'product_description' => $row['product_description'],
                'product_price' => $row['product_price'],
                'product_category' => $row['product_category'],
                'product_image' => $row['product_image'],
                'id' => $row['id'],
                'seller_id' => $row['seller_id'],
                'seller_name' => $row['seller_name'],
            );
            $resultarray[$productcategory][] = $temparray;
        }
        header("Content-Type: application/json");
        echo json_encode($resultarray);
        exit();
    } else {
        header("Content-Type: application/json");
        echo json_encode([
            'error' => true,
            'errormessage' => 'No approved Product',
        ]);
        exit();
    }
}

function displaysellernameproducts()
{
    global $conn;
    $query = "SELECT products.*, sellers.full_name AS seller_name FROM products INNER JOIN sellers ON products.seller_id = sellers.id WHERE products.approved = 1 ORDER BY seller_name";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $resultarray = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $sellername = $row['seller_name'];
            if (!isset($resultarray[$sellername])) {
                $resultarray[$sellername] = array();
            }
            $temparray = array(
                'product_name' => $row['product_name'],
                'product_description' => $row['product_description'],
                'product_price' => $row['product_price'],
                'product_category' => $row['product_category'],
                'product_image' => $row['product_image'],
                'id' => $row['id'],
                'seller_id' => $row['seller_id'],
                'seller_name' => $row['seller_name'],
            );
            $resultarray[$sellername][] = $temparray;
        }
        header("Content-Type: application/json");
        echo json_encode($resultarray);
        exit();
    } else {
        header("Content-Type: application/json");
        echo json_encode([
            'error' => true,
            'errormessage' => 'No approved Product',
        ]);
        exit();
    }
}
