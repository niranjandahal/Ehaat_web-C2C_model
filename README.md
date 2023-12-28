# Ehaat_web-B2C_model

A web based project you can see it live at [ehaat.com](http://ehaat.42web.io)

# Video sample
[![Youtube Video](https://img.youtube.com/vi//0.jpg)](https://www.youtube.com/watch?v=)


## Getting Started

1.you need to install xampp first and also install composer

2.configure database in phpmyadmin

3.give a database name ecommercedb and import the ehaatlatest.sql file inside the directory

4.create "dbconnection.php" and configure host,username,password,dbname


    <?php
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
    
    
5.create otpfunction.php inside the otp folder and implement the otp functionality i have used elastic email you can use any 3rd party for otp or can completely remove otp functionality by own



6.you are good to go

<img src="https://github.com/niranjandahal/Ehaat_web-B2C_model/blob/main/project-six.png">


## features

   users
    
-user login/registration
-add to cart features locally
-product details page
-order product
-view pending and approved order
-cancel pending order
-verify the delivered product

   seller

-seller registration with otp verification
-seller login
-seller dashboard
-add multiple products
-view the order made by user on their seller products
-approve or reject the order made by users
-once approved seller get the users details and location for product delivery
-view to be delivered product 

   admin
    
-limited no of admin only
-admin dashboard
-approve or reject legit product added by sellers
-can permanently remove products from site


# Ehaat

![Build Status](https://img.shields.io/badge/build-passing-brightgreen)
![Coverage](https://img.shields.io/badge/coverage-90%25-green)
![Version](https://img.shields.io/badge/version-v1.0-blue)


## Screenshots

<img src="https://github.com/niranjandahal/Ehaat_web-B2C_model/blob/main/project-5-s1.png" width="300">
<img src="https://github.com/niranjandahal/Ehaat_web-B2C_model/blob/main/project-5-s2.png" width="300">
<img src="https://github.com/niranjandahal/Ehaat_web-B2C_model/blob/main/project-5-s3.png" width="300">
<img src="https://github.com/niranjandahal/Ehaat_web-B2C_model/blob/main/project-5-s4.png" width="300">
<img src="https://github.com/niranjandahal/Ehaat_web-B2C_model/blob/main/project-5-s5.png" width="300">
<img src="https://github.com/niranjandahal/Ehaat_web-B2C_model/blob/main/project-5-s6.png" width="300">
<img src="https://github.com/niranjandahal/Ehaat_web-B2C_model/blob/main/project-5-s7.png" width="300">
<img src="https://github.com/niranjandahal/Ehaat_web-B2C_model/blob/main/project-5-s8.png" width="300">
<img src="https://github.com/niranjandahal/Ehaat_web-B2C_model/blob/main/project-5-s9.png" width="300">
<img src="https://github.com/niranjandahal/Ehaat_web-B2C_model/blob/main/project-5-s10.png" width="300">



## Technologies Used

- PhP
- html
- tailwind css
- javascript
- MySql database

## Getting Started

### Prerequisites

-configuration of php on your machine
-xampp,composer,tailwind cdn

### Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/niranjandahal/Ehaat_web-B2C_model.git
    
2.Navigate to the project directory:

    cd haat_web-B2C_model

3.Install dependencies:

    composer install


## Contributing
Contributions are welcome! If you find any bugs or want to contribute new features, please follow these steps:

## Fork the repository.
Create a new branch for your feature/bug fix.
Make your changes and test thoroughly.
Commit your changes with a descriptive commit message.
Push your branch to your forked repository.
Submit a pull request.
Please make sure to follow our Code of Conduct and adhere to the Contributing Guidelines.

## Issues
If you encounter any issues or bugs with the application, please create a new issue on GitHub. Include a detailed description and steps to reproduce the problem.



