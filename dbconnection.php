<?php
//
//ehaat online server ehaat.42web.io
//
$servername = "sql201.infinityfree.com";
$username = "if0_35587418";
$password = "Hf7KTFYwJKQ";
$dbname = "if0_35587418_ecommercedb";
//
//ehaat online server ehaat.free.nf
//
// $servername = "sql311.infinityfree.com";
// $username = "if0_34587086";
// $password = "lkMcfYNWSlG9V";
// $dbname = "if0_34587086_ecommercedb";
//
// ehaat local server
//
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommercedb";
//
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
