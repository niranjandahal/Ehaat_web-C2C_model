<?php
include "../cors.php";
session_name('validadmin');
session_start();
include '../dbconnection.php';
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_SESSION['adminname']) && isset($_SESSION['adminpassword'])) {
    header("location: adminpanel.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adminname = mysqli_escape_string($conn, $_POST['name']);
    $adminpassword = mysqli_escape_string($conn, $_POST['password']);

    if ($adminname != "admin" || $adminpassword != "admin") {
        echo "<script>alert('Invalid Credentials')</script>";
        echo "<script>window.location.href='index.php'</script>";
        exit();
    }
    $_SESSION['adminname'] = $adminname;
    $_SESSION['adminpassword'] = $adminpassword;
    header("location: adminpanel.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="../dist/output.css" rel="stylesheet" />
</head>

<body>
    <!-- <form action="index.php" method="POST">
        <label for="text"> admin and admin </label><br><br>
        <label for="name"> Name </label>
        <input type="text" name="name" id="name" required>
        <br><br>
        <label for="password"> Passowrd </label>
        <input type="text" name="password" id="password" required>
        <br><br>
        <input type="Submit" value="Login">
    </form>
    <br><br><button><a href="../index.html">Go to website</a></button><br><br>
     -->
    <section class="bg-white dark:bg-gray-900">
        <div class="container flex items-center justify-center min-h-screen px-6 mx-auto">
            <form action="index.php" method="POST" class="w-full max-w-md">
                <img class="w-auto h-7 sm:h-8" src="../logo.jpg" alt="">

                <h1 class="mt-3 text-2xl font-semibold text-gray-800 capitalize sm:text-3xl dark:text-white">Login as admin</h1>

                <div class="relative flex items-center mt-8">
                    <span class="absolute">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-3 text-gray-300 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </span>

                    <input type="text" class="block w-full py-3 text-gray-700 bg-white border rounded-lg px-11 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40" placeholder="Email address" name="name" id="name" required>
                </div>

                <div class="relative flex items-center mt-4">
                    <span class="absolute">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-3 text-gray-300 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </span>

                    <input type="password" class="block w-full px-10 py-3 text-gray-700 bg-white border rounded-lg dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40" placeholder="Password" name="password" id="password" required>
                </div>

                <div class="mt-6">
                    <button class="w-full px-6 py-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </section>
</body>

</html>