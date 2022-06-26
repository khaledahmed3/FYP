<!DOCTYPE html>
<html lang="eng">

<?php
session_start();
$username = $_SESSION ? $_SESSION['username'] : null;
require './provider/dbcon1.php';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cats</title>
    <!-- swiper css link -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>


    <!-- header section starts -->
    <section class="header">
        <a href="home.php" class="logo">Cats Adoption and Well-Being</a>
        <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="about.php">About</a>
            <a href="cats.php">Cats</a>
            <?php
            if ($username) {
                echo ('<a href="./controllers/logout.controller.php">Logout</a>');
            } else {
                echo ('<a href="login.php">Login</a>');
            }
            ?>
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
    </section>
    <!-- header section ends -->

    <!-- cats section starts -->

    <div class="heading" style="background:url(images/login-bg.jpg) no-repeat">
        <h1>Cats</h1>
    </div>

    <section class="cats">

        <h1 class="heading-title">Adopt Now</h1>

        <div class="box-container">


            <?php
            $query = "SELECT * FROM cats";
            $query_run = mysqli_query($con, $query);

            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $cats) {
                    ?>
                    <div class="box">
                        <div class="image">
                            <img src="images/<?= $cats['image']; ?>" alt="">
                        </div>
                        <div class="content">
                            <h3><?= $cats['name']; ?></h3>
                            <p>Gender: <?= $cats['gender']; ?>, Breed: <?= $cats['breed']; ?>, Age: <?= $cats['age']; ?></p>
                            <a href="adopt.php?catId=<?php echo $cats['cat_id']; ?>" class="btn">Adopt</a>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<h5> No Record Found </h5>";
            }
            ?>


        </div>
        <div class="load-more"><span class="btn">Load More</span></div>
    </section>

    <!-- cats section ends -->


    <!-- footer section starts -->
    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>Quick links</h3>
                <a href="home.php"> <i class="fas fa-angle-right"></i> Home</a>
                <a href="about.php"><i class="fas fa-angle-right"></i> About</a>
                <a href="cats.php"><i class="fas fa-angle-right"></i> Cats</a>
                <a href="login.php"><i class="fas fa-angle-right"></i> Login</a>
            </div>

            <div class="box">
                <h3>Extra links</h3>
                <a href="#"> <i class="fas fa-angle-right"></i> Ask questions</a>
                <a href="#"><i class="fas fa-angle-right"></i> About us</a>
                <a href="#"><i class="fas fa-angle-right"></i> Privacy policy</a>
                <a href="#"><i class="fas fa-angle-right"></i> Terms of use</a>
            </div>

            <div class="box">
                <h3>Contact info</h3>
                <a href="#"> <i class="fas fa-phone"></i> 018-2123-403</a>
                <a href="#"><i class="fas fa-phone"></i> 015-5977-6574</a>
                <a href="#"><i class="fas fa-envelope"></i> khaledahmed512@gmail.com</a>
                <a href="#"><i class="fas fa-map"></i> Johor Bahru, Johore, Malaysia, 80200</a>
            </div>

            <div class="box">
                <h3>Follow us</h3>
                <a href="#"> <i class="fab fa-facebook"></i> Facebook</a>
                <a href="#"><i class="fab fa-twitter"></i> Twitter</a>
                <a href="#"><i class="fab fa-instagram"></i> Instagram</a>
                <a href="#"><i class="fab fa-linkedin"></i> Linkedin</a>
            </div>
        </div>

        <div class="credit">
            Created by <span>Khalid Ahmed Sedik</span> | all rights reserved!
        </div>
    </section>




    <!-- footer section ends -->


    <!-- swiper js link -->
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <!-- custom js file link -->
    <script src="js/script.js"></script>

</body>

</html>