<?php
include '../cors.php';
session_name('validseller');
session_start();
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
// echo "logged in as  $_SESSION[seller_name]  ";
// echo $_SESSION['seller_email'];
include '../dbconnection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $productName = mysqli_real_escape_string($conn, $_POST['product_name']);
  $productDescription = mysqli_real_escape_string($conn, $_POST['product_description']);
  $productPrice = mysqli_real_escape_string($conn, $_POST['product_price']);
  $productcategory = mysqli_real_escape_string($conn, $_POST['product_category']);
  //checksetfileuploadornot
  if (isset($_FILES['product_image'])) {
    $fileCount = count($_FILES['product_image']['name']);
    $uploadSuccess = true;
    //savedirectoryimage
    $targetDirectory = "../uploads/";
    //targetdirectoryimage
    for ($i = 0; $i < $fileCount; $i++) {
      $fileName = $_FILES['product_image']['name'][$i];
      $fileTmpName = $_FILES['product_image']['tmp_name'][$i];
      $targetFile = $targetDirectory . basename($fileName);
      $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
      //imagevalidornot
      $check = getimagesize($fileTmpName);
      if ($check !== false) {
        $allowedFormats = array("jpg", "jpeg", "png");
        if (in_array($fileType, $allowedFormats)) {
          $maxFileSize = 25 * 1024;
          //imgtodir
          if ($_FILES['product_image']['size'][$i] <= $maxFileSize) {
            if (move_uploaded_file($fileTmpName, $targetFile)) {
              $query = "INSERT INTO products (seller_id, product_name, product_description, product_category, product_price, product_image) VALUES ('$recivedsellerid', '$productName', '$productDescription', '$productcategory', '$productPrice', '$targetFile')";
              if (mysqli_query($conn, $query)) {
                // header('Content-Type: application/json');
                // echo json_encode([
                //   'error' => false,
                //   'errormessage' => null,
                //   'name' => $productName,
                //   'description' => $productDescription,
                //   'category' => $productcategory,
                //   'price' => $productPrice,
                //   'image' => $targetFile,
                //   'id' => mysqli_insert_id($conn),
                // ]);
                echo "<script>alert('Product added successfully for review')</script>";
                echo "<script>window.location.href='../index.html'</script>";
                exit();
              } else {
                echo "<script>alert('Failed to add product')</script>";
                echo "<script>window.location.href='addproduct.php'</script>";
              }
            } else {
              echo "<script>alert('Failed to upload product image')</script>";
              echo "<script>window.location.href='addproduct.php'</script>";

              $uploadSuccess = false;
            }
          } else {
            echo "<script>alert('Image size must be less than 25 KB')</script>";
            echo "<script>window.location.href='https://www.resizepixel.com'</script>";
            $uploadSuccess = false;
          }
        } else {
          echo "<script>alert('invalid image')</script>";
          echo "<script>window.location.href='addproduct.php'</script>";

          $uploadSuccess = false;
        }
      } else {
        echo "script>alert('File is not an image')</script>";
        echo "<script>window.location.href='addproduct.php'</script>";

        $uploadSuccess = false;
      }
    }

    if (!$uploadSuccess) {
      echo "<script>alert('Failed to upload product image')</script>";
      echo "<script>window.location.href='addproduct.php'</script>";
    }
  }

  mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html>

<head>
  <title>Add Product</title>
  <link href="../dist/output.css" rel="stylesheet" />
</head>

<body style="background-color:rgb(17 24 39)">
  <!-- <h1>Add Product</h1>
  <form method="POST" action="addproduct.php" enctype="multipart/form-data">
    <label for="product_name">Product Name:</label>
    <input type="text" name="product_name" required><br>

    <label for="product_description">Product Description:</label>
    <textarea name="product_description" required></textarea><br>

    <label for="product_category">Product category:</label>
    <input type="text" name="product_category" required><br>

    <label for="product_price">Product Price:</label>
    <input type="number" name="product_price" step="0.01" required><br>

    <label for="product_image">Product Image:</label>
    <input type="file" name="product_image[]" accept="image/*" multiple directory><br>

    <input type="submit" value="Add Product">
    <input type="button" value="Logout" onclick="location.href='sellerssignout.php'">
  </form>
  <br><br><button><a href="../index.html">Go to website</a></button><br><br> -->

  <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800" style="background-color:rgb(17 24 39)">
    <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Add Product:</h2>

    <form method="POST" action="addproduct.php" enctype="multipart/form-data">
      <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
        <div>
          <label class="text-gray-700 dark:text-gray-200" for="product_name">Product Name</label>
          <input type="text" name="product_name" required class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
        </div>

        <div>
          <label class="text-gray-700 dark:text-gray-200" for="Product_category">Product Category</label>
          <input type="text" name="product_category" required class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
        </div>

        <div>
          <label class="text-gray-700 dark:text-gray-200" for="product_price">Price</label>
          <input type="number" name="product_price" step="0.01" required class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
        </div>

        <div>
          <label for="product_image" class="text-gray-700 dark:text-gray-200" for="Product_category">Product Image<25kb </label>
              <input type="file" name="product_image[]" accept="image/*" multiple directory class="block w-full px-3 py-2 mt-2 text-sm text-gray-600 bg-white border border-gray-200 rounded-lg file:bg-gray-200 file:text-gray-700 file:text-sm file:px-4 file:py-1 file:border-none file:rounded-full dark:file:bg-gray-800 dark:file:text-gray-200 dark:text-gray-300 placeholder-gray-400/70 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:focus:border-blue-300" />
        </div>

        <div>
          <label class="text-gray-700 dark:text-gray-200" for="product_description">Product Description</label>
          <textarea name="product_description" required class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"></textarea>
        </div>

      </div>

      <div class="flex justify-end mt-6">
        <button class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
      </div>
    </form>
  </section>
</body>

</html>