# Ehaat_web-B2C_model

A web based project you can see it live at [ehaat.com](http://ehaat.42web.io)

# Video sample
[![Youtube Video](https://img.youtube.com/vi//0.jpg)](https://www.youtube.com/watch?v=)


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




<img src="https://github.com/niranjandahal/MovieApp_Flutter/blob/main/project-one.png">




## features
- Watch trailers of new movies/series
- search any movies/series
- Complete Description of the every Movies/Series
- movie/series rating,reviews,reveneue,shortstory
- movie/series add to favoriates
- recommend similar movies/series from description page
- Trending weekly/daily movies/series
- Popular now  movies/series
- Top-rated  movies/series
- Upcomming section

# Movie Hunt

![Build Status](https://img.shields.io/badge/build-passing-brightgreen)
![Coverage](https://img.shields.io/badge/coverage-90%25-green)
![Version](https://img.shields.io/badge/version-v1.0-blue)

A Flutter application that displays trending movies, popular movies, top-rated movies, and provides movie descriptions, recommendations, and search functionality.

## Screenshots

<img src="https://github.com/niranjandahal/MovieApp_Flutter/blob/main/flutter_01.jpg" width="300">
<img src="https://github.com/niranjandahal/MovieApp_Flutter/blob/main/flutter_02.jpg" width="300">
<img src="https://github.com/niranjandahal/MovieApp_Flutter/blob/main/flutter_03.jpg" width="300">
<img src="https://github.com/niranjandahal/MovieApp_Flutter/blob/main/flutter_04.jpg" width="300">
<img src="https://github.com/niranjandahal/MovieApp_Flutter/blob/main/flutter_05.jpg" width="300">
<img src="https://github.com/niranjandahal/MovieApp_Flutter/blob/main/flutter_06.jpg" width="300">
<img src="https://github.com/niranjandahal/MovieApp_Flutter/blob/main/flutter_07.jpg" width="300">
<img src="https://github.com/niranjandahal/MovieApp_Flutter/blob/main/flutter_08.jpg" width="300">
<img src="https://github.com/niranjandahal/MovieApp_Flutter/blob/main/flutter_09.jpg" width="300">


## Features

- Browse trending movies, popular movies, and top-rated movies.
- View detailed movie descriptions, including synopsis, cast, and crew.
- Get recommendations for similar movies based on the selected movie.
- Search for movies, actors, and directors.
- View search results and detailed information about movies and people.

## Technologies Used

- Flutter - Dart framework for building cross-platform applications.
- The Movie Database (TMDb) API - External API for fetching movie data.

## Getting Started

### Prerequisites

- Flutter SDK: [Install Flutter](https://flutter.dev/docs/get-started/install)
- Android/iOS emulator or physical device for running the app.

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/niranjandahal/MovieApp_Flutter.git

2.Navigate to the project directory:
    
    cd movie-app

3.Install dependencies:
   
      flutter pub get

4.Run the app

     flutter run


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



