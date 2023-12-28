<?php
// make a beautiful and colorful ui for seller dashboard with many featuers
include '../cors.php';
include '../dbconnection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #1e1e1e;
            color: #fff;
            margin: 0;
            padding: 0;
        }



        nav {
            background-color: #343a40;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            margin: 0 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #495057;
        }

        .content {
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #343a40;
            color: #fff;
            overflow-x: auto;
            /* Enable horizontal scroll for small screens */
        }

        th,
        td {
            border: 1px solid #555;
            padding: 12px;
            text-align: left;
            white-space: nowrap;
            /* Avoid line breaks in table cells */
        }

        th {
            background-color: #495057;
        }

        .product-images {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .product-images img {
            max-width: 100%;
            height: auto;
        }

        input[type="button"] {
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
        }

        input[type="button"]:hover {
            background-color: #0056b3;
        }

        .confirmedordertext {
            text-align: center;
            color: cyan;
            font-size: 20px;
            margin: 20px 0;
        }

        .secondtext {

            text-align: center;
            font-size: 20px;
            margin: 40px 0;


        }

        @media only screen and (max-width: 600px) {

            /* Adjust styles for smaller screens */
            table {
                font-size: 14px;
                /* Decrease font size for smaller screens */
            }
        }
    </style>

</head>

<body>
    <div class="content">
        <nav>
            <?php
            session_name('validseller');
            session_start();

            //best if statement ever
            if (isset($_SESSION['ref_seller_id']) && isset($_SESSION['seller_name']) && isset($_SESSION['seller_email'])) {
                echo "$_SESSION[seller_name]";
                echo "<a href='./addproduct.php'>Add Your Product</a>";
                echo "<a href='./ordertodeliver.php'>order to deliver</a>";
            } else {
                echo  "<a href='./index.php'>Seller Login</a>";
                // echo "<a href='./index.php'>Seller Login/addproduct</a>";
            }
            ?>
            <!-- <a href="./index.php">Seller Login/addproduct</a> -->
            <a href="./approveorder.php">See Order</a>
            <a href="./sellerssignout.php">Logout</a>
            <!-- if isset sellerref id display name -->


        </nav>

        <table>
            <thead>
                <tr>
                    <th>Seller Name</th>
                    <th>Seller Address</th>
                    <th>Products</th>
                </tr>
            </thead>
            <tbody>
                <!-- list of seller text -->
                <p class="confirmedordertext">Added Product might take 24hrs to be aproved</p>

                <h2 class="secondtext">List of Sellers</h2>


                <?php
                $sql = "SELECT sellers.full_name, sellers.address, 
               GROUP_CONCAT( products.product_image SEPARATOR ',') as products
        FROM sellers
        INNER JOIN products ON sellers.id = products.seller_id
        GROUP BY sellers.id";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["full_name"] . "</td>
                                <td>" . $row["address"] . "</td>
                                <td class='product-images'>";

                        // Explode the images based on comma
                        $images = explode(',', $row["products"]);

                        // Loop through the images and generate image tags
                        foreach ($images as $image) {
                            // Trim to remove any extra whitespaces
                            $image = trim($image);

                            // Output the image tag
                            echo "<img src='$image' alt='Product Image' style='max-width: 100px; max-height: 100px; margin-right: 8px;'>";
                        }

                        echo "</td></tr>";
                    }
                } else {
                    echo "0 results";
                }








                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>