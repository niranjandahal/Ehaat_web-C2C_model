<?php
include '../cors.php';
include '../dbconnection.php';
session_name('validseller');
session_start();

// Redirect if not logged in
if (!isset($_SESSION['ref_seller_id']) || !isset($_SESSION['seller_name']) || !isset($_SESSION['seller_email'])) {
    http_response_code(401);
    echo "<script>alert('You are not logged in')</script>";
    echo "<script>window.location.href='sellerslogin.php'</script>";
    exit();
}

$recivedsellerid = $_SESSION['ref_seller_id'];

$sql = "SELECT * FROM products WHERE seller_id = $recivedsellerid AND todeliver != ''";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Deliver - Seller Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #1a1a1a;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #333;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .product {
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 1px solid #555;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .user-details {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #555;
            border-radius: 8px;
            background-color: #444;
        }

        .user-details p {
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $productid = $row['id'];
                $productname = $row['product_name'];
                $productimage = $row['product_image'];
        ?>
                <div class="product">
                    <h2>Product Name: <?php echo $productname; ?></h2>
                    <img src="<?php echo $productimage; ?>" alt="product image">
                    <?php
                    $todeliver = $row['todeliver'];
                    $todeliverarray = explode(',', $todeliver);
                    for ($i = 1; $i < count($todeliverarray); $i++) {
                        $userid = $todeliverarray[$i];
                        $sql1 = "SELECT * FROM users WHERE id = $userid";
                        $result1 = $conn->query($sql1);
                        if ($result1->num_rows > 0) {
                            $row1 = $result1->fetch_assoc();
                            $username = $row1['full_name'];
                            $useraddress = $row1['address'];
                            $userphone = $row1['phone_number'];
                    ?>
                            <div class="user-details">
                                <p>User Name: <?php echo $username; ?></p>
                                <p>User Address: <?php echo $useraddress; ?></p>
                                <p>User Phone: <?php echo $userphone; ?></p>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
        <?php
            }
        } else {
            echo "<p>No products to deliver.</p>";
        }
        ?>
    </div>
</body>

</html>