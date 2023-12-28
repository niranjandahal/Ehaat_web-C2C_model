<?php
include "../cors.php";
include '../dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $productId = $_POST['product_id'];
  $action = isset($_POST['approve']) ? 'approve' : 'reject';

  $query = "UPDATE products SET approved = " . ($action === 'approve' ? 1 : 2) . " WHERE id = $productId";

  if (mysqli_query($conn, $query)) {
    echo "<script>alert('Product " . ($action === 'approve' ? "approved" : "rejected") . " successfully!')</script>";
    echo "<script>window.location.href='adminpanel.php'</script>";
    // echo "Product " . ($action === 'approve' ? "approved" : "rejected") . " successfully!";
    // header('Content-Type: application/json');
    // echo json_encode([
    //   'error' => false,
    //   'errormessage' => null,
    // ]);
    exit();
  } else {
    // header('Content-Type: application/json');
    // echo json_encode([
    //   'error' => true,
    //   'errormessage' => mysqli_error($conn)
    // ]);
    exit();
  }
  // header("location: adminpanel.php");
  // exit();
  mysqli_close($conn);
}

?>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="../dist/output.css" rel="stylesheet" />
</head>

<body>
  
</body>
</html> -->