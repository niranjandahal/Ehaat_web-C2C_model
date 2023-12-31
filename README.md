# Ehaat_web-B2C_model

A web based project you can see it live at [EHAAT.COM](http://ehaat.42web.io)

<img src="https://github.com/niranjandahal/Ehaat_web-B2C_model/blob/main/project-6-s1.png">


# Video sample
[![Youtube Video](https://img.youtube.com/vi//W0vN6v4iiOI[0].jpg)](https://www.youtube.com/watch?v=W0vN6v4iiOI)


## Getting Started

1.you need to install xampp first and also install composer

2.configure database in phpmyadmin

3.give a database name ecommercedb and import the ehaatlatest.sql file inside the directory

4.create "dbconnection.php" and configure host,username,password,dbname

        ```php
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
        \```
    
5.create otpfunction.php inside the otp folder and implement the otp functionality i have used elastic email you can use any 3rd party for otp or can completely remove otp functionality by own



6.you are good to go

<img src="https://github.com/niranjandahal/Ehaat_web-B2C_model/blob/main/project-six.png">


## Features

### Users
- User login/registration
- chat support
- Add to cart features locally
- Product details page
- Order product
- View pending and approved orders
- Cancel pending orders
- Verify the delivered product

### Seller
- Seller registration with OTP verification
- Seller login
- Seller dashboard
- Add multiple products
- View the orders made by users for their seller products
- Approve or reject the orders made by users
- Once approved, sellers get users' details and location for product delivery
- View to-be-delivered products

### Admin
- Limited number of admins only
- Admin dashboard
- Approve or reject legit products added by sellers
- Can permanently remove products from the site
- answer to chat support query by users

## Ehaat


![Build Status](https://img.shields.io/badge/build-passing-brightgreen)
![Coverage](https://img.shields.io/badge/coverage-90%25-green)
![Version](https://img.shields.io/badge/version-v1.0-blue)


## Screenshots

<img src="https://github.com/niranjandahal/Ehaat_web-B2C_model/blob/main/project-6-s1.png">
<img src="https://github.com/niranjandahal/Ehaat_web-B2C_model/blob/main/project-6-s2.png">
<img src="https://github.com/niranjandahal/Ehaat_web-B2C_model/blob/main/project-6-s3.png">
<img src="https://github.com/niranjandahal/Ehaat_web-B2C_model/blob/main/project-6-s4.png">
<img src="https://github.com/niranjandahal/Ehaat_web-B2C_model/blob/main/project-6-s5.png">
<img src="https://github.com/niranjandahal/Ehaat_web-B2C_model/blob/main/project-6-s6.png">
<img src="https://github.com/niranjandahal/Ehaat_web-B2C_model/blob/main/project-6-s7.png">
<img src="https://github.com/niranjandahal/Ehaat_web-B2C_model/blob/main/project-6-s8.png">
<img src="https://github.com/niranjandahal/Ehaat_web-B2C_model/blob/main/project-6-s9.png">
<img src="https://github.com/niranjandahal/Ehaat_web-B2C_model/blob/main/project-6-s10.png">
<img src="https://github.com/niranjandahal/Ehaat_web-B2C_model/blob/main/project-6-s11.png">
<img src="https://github.com/niranjandahal/Ehaat_web-B2C_model/blob/main/project-6-s12.png">




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



