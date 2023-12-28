<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dark Theme Search Page</title>
    <style>
        body {
            background-color: #1a1a1a;
            color: #fff;
            font-family: 'Arial', sans-serif;
            margin: 0;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

        .product-card {
            background-color: #333;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 10px;
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        .product-card img {
            width: 100%;
            border-radius: 5px;
        }

        .product-card h2 {
            margin-top: 10px;
        }

        .product-card p {
            color: #ccc;
            font-size: 14px;
        }

        .price {
            font-weight: bold;
            margin-top: 10px;
            color: #ffd700;
            /* gold color */
        }

        .no-results {
            text-align: center;
            font-size: 18px;
            margin-top: 20px;
            color: #ff4500;
            /* orangered color */
        }

        /* css on form */
        form {
            margin-top: 20px;
        }

        form input[type="submit"] {
            background-color: #3498db;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            padding: 10px 20px;
            text-decoration: none;
        }

        form input[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        include '../cors.php';
        include '../dbconnection.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $searchquery = mysqli_escape_string($conn, $_POST['searchquery']);
            //approved is 1
            $sql = "SELECT * FROM `products` 
            WHERE (`product_name` LIKE '%$searchquery%' 
                OR `product_category` LIKE '%$searchquery%' 
                OR `product_description` LIKE '%$searchquery%') 
                AND `approved` = 1";

            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);

            if ($num > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="product-card">';
                    echo '<img src="' . $row['product_image'] . '" alt="' . $row['product_name'] . '">';
                    echo '<h2>' . $row['product_name'] . '</h2>';
                    echo '<p>' . $row['product_description'] . '</p>';
                    echo '<p class="price">Price: NPR ' . $row['product_price'] . '</p>';
                    //form to send product id to productdetail.php with name product_id
                    echo '<form action="productdetail.php" method="POST">';
                    echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
                    echo '<input type="submit" value="View Details">';
                    echo '</form>';

                    echo '</div>';
                }
            } else {
                echo '<p class="no-results">No Products Found</p>';
            }
        }
        ?>
    </div>
</body>

</html>