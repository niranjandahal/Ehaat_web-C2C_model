<?php
// include '../cors.php';

// include "productfunction.php";
// if (isset($_POST['displaysellernameproducts'])) {
//   displaysellernameproducts();
// }
// if (isset($_POST['displaycategoryproducts'])) {
//   displaycategoryproducts();
// }
// if (isset($_POST['displayallproducts'])) {
//   displayallproducts();
// }
include '../cors.php';

if (isset($_POST['action'])) {
  $action = $_POST['action'];

  include "productfunction.php";

  if ($action === 'displayallproducts') {
    displayallproducts();
  } elseif ($action === 'displaysellernameproducts') {
    displaysellernameproducts();
  } elseif ($action === 'displaycategoryproducts') {
    displaycategoryproducts();
  } else {
    echo "script>alert('Invalid action')</script>";
  }
}
