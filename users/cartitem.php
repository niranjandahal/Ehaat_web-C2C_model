<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #1a1a1a;
            color: #fff;
        }

        h1 {
            text-align: center;
            color: #3498db;
        }

        #cartItems {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            background-color: #2c2c2c;
        }

        .cartItem {
            margin-bottom: 20px;
            border: 1px solid #3498db;
            padding: 10px;
            border-radius: 8px;
        }

        .cartItem img {
            max-width: 100px;
            height: auto;
            margin-right: 10px;
            border-radius: 8px;
        }

        .removeBtn {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .removeBtn:hover {
            background-color: #c0392b;
        }

        .viewproduct {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h1>Shopping Cart</h1>

    <div id="cartItems"></div>

    <script>
        // Retrieve cart items from localStorage
        var cartItems = JSON.parse(localStorage.getItem('cart')) || [];

        // Display cart items
        var cartContainer = document.getElementById('cartItems');

        if (cartItems.length > 0) {
            cartItems.forEach(function(item) {
                var productHTML = '<div class="cartItem">';

                productHTML += '<img src="' + item.prodictimage + '" alt="' + item.name + '">';
                productHTML += '<p>Name: ' + item.name + '</p>';
                productHTML += '<p>Price: NPR ' + item.price + '</p>';
                productHTML += '<button class="removeBtn" onclick="removeFromCart(' + item.id + ')">Remove</button>';
                // post request to productdetail.php with product id as product_id and buy as action
                productHTML += '<form method="POST" action="./productdetail.php">';
                productHTML += '<input type="hidden" name="product_id" value="' + item.id + '">';
                productHTML += '<br>';
                productHTML += '<button type="submit" name="view product" class="viewproduct">View Product</button>';
                productHTML += '</form>';
                //buy product 
                productHTML += '<form method="POST" action="./buyproduct.php">';
                productHTML += '<input type="hidden" name="product_id" value="' + item.id + '">';
                productHTML += '<br>';
                productHTML += '<button type="submit" name="buy product" class="viewproduct">Buy Product</button>';
                productHTML += '</form>';

                productHTML += '</div>';
                cartContainer.innerHTML += productHTML;
            });
        } else {
            cartContainer.innerHTML = '<p>Your cart is empty</p>';
        }

        function removeFromCart(productId) {
            // Remove the item from the cart
            cartItems = cartItems.filter(item => item.id !== productId);

            // Save updated cart back to localStorage
            localStorage.setItem('cart', JSON.stringify(cartItems));

            // Refresh the cart display
            location.reload();
        }
    </script>
</body>

</html>