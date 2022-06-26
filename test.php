<?php
ob_start();
session_start();
if (!$_SESSION["Cid"]) {  //check session

        Header("Location: Login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

} else {
?>
        <?php include("class_lib/db_conf.php"); ?>
        <?php include("class_lib/database.php"); ?>
        <?php $db = new Database(); ?>
        <?php
        $Cid = $_SESSION['Cid'];
        isset($_GET['DrinkMike']) ? $DrinkMike = $_GET['DrinkMike'] : $DrinkMike = "";
        isset($_GET['Date']) ? $Date = $_GET['Date'] : $Date = "";
        $sql = "SELECT * FROM `bmrcal` WHERE `Cid` = '$Cid' GROUP BY `RegisId`  
    ORDER BY `bmrcal`.`RegisId`  DESC
    LIMIT 1 ";
        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
                <meta charset="utf-8">
                <meta content="width=device-width, initial-scale=1.0" name="viewport">

                <title>BMR Calculator</title>
                <meta content="" name="description">

                <meta content="" name="keywords">

                <!-- Favicons -->
                <link href="assets/img/favicon.png" rel="icon">
                <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">


                <!-- Vendor CSS Files -->
                <link href="assets/vendor/aos/aos.css" rel="stylesheet">
                <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
                <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
                <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
                <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                <!-- Template Main CSS File -->
                <link href="assets/css/style.css" rel="stylesheet">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.3/Chart.min.js"></script>
                <!-- =======================================================
  * Template Name: FlexStart - v1.9.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
                <style>
                        icon-shape {
                                display: inline-flex;
                                align-items: center;
                                justify-content: center;
                                text-align: center;
                                vertical-align: middle;
                        }

                        .icon-sm {
                                width: 2rem;
                                height: 2rem;

                        }

                        .half-circle {
                                width: 165px;
                                height: 350px;
                                border-top-left-radius: 150px;  /* 100px of height + 10px of border */
                                border-bottom-left-radius: 150px;
                                border: 3px solid ForestGreen;
                                overflow: hidden;
                                border-right: 0;
                                display: inline-block;
                                background-color: whitesmoke;


                        }

                        .half-circle-right {
                                display: inline-block;

                        }

                        .circle-top {
                                width: 152px;
                                height: 175px;
                                border-top-right-radius: 150px;
                                overflow: hidden;
                                border: 3px solid Orange;
                                background-color: whitesmoke;
                                margin-left: -5px;
                               
                                padding-right: 12px;
                        }

                        .circle-bottom {
                                width: 152px;
                                height: 175px;
                                border-bottom-right-radius: 150px;
                                overflow: hidden;
                                border: 3px solid Brown;
                                background-color: whitesmoke;
                                margin-left: -5px;
                                padding-right: 12px;
                        }
                </style>

        </head>

        <body>

                <!-- ======= Header ======= -->
                <header id="header" class="header fixed-top">
                        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

                                <a href="index.php" class="logo d-flex align-items-center">
                                        <img src="assets/img/logo.png" alt="">
                                        <span>FoodDesign</span>
                                </a>

                                <nav id="navbar" class="navbar">
                                        <ul>
                                                <li><a class="nav-link scrollto active" href="#hero">หน้าหลัก</a></li>
                                                <li><a class="nav-link" href="showFoodDesign.php">คำนวนพลังงาน</a></li>
                                                <li class="dropdown"><a href="#"><span>ผู้ใช้งาน</span> <i class="bi bi-chevron-down"></i></a>
                                                        <ul>
                                                                <li><a href="#">ดูพลังงานที่ใช้</a></li>
                                                                <li><a href="logout.php">ออกจากระบบ</a>
                                                                </li>
                                                        </ul>
                                                </li>
                                        </ul>
                                        <i class="bi bi-list mobile-nav-toggle"></i>
                                </nav><!-- .navbar -->

                        </div>
                </header><!-- End Header -->

                <!-- ======= Hero Section ======= -->
                <form class="mb-3" name="AddFood" action="#" method="post">
                        <section id="hero" class="hero d-flex align-items-center">
                                <div class="container">
                                        <div class="row">
                                                <div class="card text-center">
                                                        <div class="card-header">

                                                                <h1>อาหารแนะนำสำหรับคุณ</h1>


                                                        </div>
                                                        <div class="card-body">
                                                                <!-- Form Start -->

                                                                <?php
                                                                foreach ($db->to_Obj($sql) as $rows) {
                                                                        ////ไม่กินนม 
                                                                        if ($rows['DrinkMike'] == '0') {
                                                                                if ($rows['RecommendKcal'] >= '1200' && $rows['RecommendKcal'] <= '1400') {
                                                                ?>

                                                                                        <script src="assets/js/Drinkmilk0/1200/showfood.js"></script>
                                                                                        <script src="assets/js/Drinkmilk0/1200/food.js"></script>
                                                                                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                                                                        <!--<img src="https://media.healthyfood.com/wp-content/uploads/2017/03/The-perfect-plate-500x500.jpg" style="width: 300px;"><br> -->
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice" value="6">ข้าว (แป้ง) 6 ทัพพี</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ น้อยกว่าหรือเท่ากับ แป้ง</a><br><br>
                                                                                        <a href="#" style="color: black;">ผักครึ่งจาน</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้ 1 ส่วน</a><br><br>

                                                                                <?php
                                                                                } else if ($rows['RecommendKcal'] > '1400' && $rows['RecommendKcal'] <= '1600') {
                                                                                ?>
                                                                                        <script src="assets/js/Drinkmilk0/1400/showfood.js"></script>
                                                                                        <script src="assets/js/Drinkmilk0/1400/food.js"></script>
                                                                                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                                                                        <!--<img src="https://media.healthyfood.com/wp-content/uploads/2017/03/The-perfect-plate-500x500.jpg" style="width: 300px;"><br> -->
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice" value="6">ข้าว (แป้ง) 7 ทัพพี</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ น้อยกว่าหรือเท่ากับ แป้ง</a><br><br>
                                                                                        <a href="#" style="color: black;">ผักครึ่งจาน</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้ 1 ส่วน</a><br><br>
                                                                                <?php
                                                                                } else if ($rows['RecommendKcal'] > '1600' && $rows['RecommendKcal'] <= '1800') {
                                                                                ?>
                                                                                        <script src="assets/js/Drinkmilk0/1600/showfood.js"></script>
                                                                                        <script src="assets/js/Drinkmilk0/1600/food.js"></script>
                                                                                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                                                                        <!--<img src="https://media.healthyfood.com/wp-content/uploads/2017/03/The-perfect-plate-500x500.jpg" style="width: 300px;"><br> -->
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice" value="6">ข้าว (แป้ง) 8 ทัพพี</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ น้อยกว่าหรือเท่ากับ แป้ง</a><br><br>
                                                                                        <a href="#" style="color: black;">ผักครึ่งจาน</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้ 2 ส่วน</a><br><br>
                                                                                <?php
                                                                                } else if ($rows['RecommendKcal'] > '1800' && $rows['RecommendKcal'] <= '2000') {
                                                                                ?>
                                                                                        <script src="assets/js/Drinkmilk0/1800/showfood.js"></script>
                                                                                        <script src="assets/js/Drinkmilk0/1800/food.js"></script>
                                                                                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                                                                        <!--<img src="https://media.healthyfood.com/wp-content/uploads/2017/03/The-perfect-plate-500x500.jpg" style="width: 300px;"><br> -->
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice" value="6">ข้าว (แป้ง) 9 ทัพพี</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ น้อยกว่าหรือเท่ากับ แป้ง</a><br><br>
                                                                                        <a href="#" style="color: black;">ผักครึ่งจาน</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้ 3 ส่วน</a><br><br>
                                                                                <?php
                                                                                } else if ($rows['RecommendKcal'] > '2000' && $rows['RecommendKcal'] <= '2200') {
                                                                                ?>
                                                                                        <script src="assets/js/Drinkmilk0/2000/showfood.js"></script>
                                                                                        <script src="assets/js/Drinkmilk0/2000/food.js"></script>
                                                                                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                                                                        <!--<img src="https://media.healthyfood.com/wp-content/uploads/2017/03/The-perfect-plate-500x500.jpg" style="width: 300px;"><br> -->
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice" value="6">ข้าว (แป้ง) 9 ทัพพี</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ น้อยกว่าหรือเท่ากับ แป้ง</a><br><br>
                                                                                        <a href="#" style="color: black;">ผักครึ่งจาน</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้ 4 ส่วน</a><br><br>
                                                                                <?php
                                                                                } else if ($rows['RecommendKcal'] > '2200' && $rows['RecommendKcal'] <= '2400') {
                                                                                ?>
                                                                                        <script src="assets/js/Drinkmilk0/2200/showfood.js"></script>
                                                                                        <script src="assets/js/Drinkmilk0/2200/food.js"></script>
                                                                                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                                                                        <!--<img src="https://media.healthyfood.com/wp-content/uploads/2017/03/The-perfect-plate-500x500.jpg" style="width: 300px;"><br> -->
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice" value="6">ข้าว (แป้ง) 11 ทัพพี</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ น้อยกว่าหรือเท่ากับ แป้ง</a><br><br>
                                                                                        <a href="#" style="color: black;">ผักครึ่งจาน</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้ 4 ส่วน</a><br><br>
                                                                                <?php
                                                                                } else if ($rows['RecommendKcal'] > '2400' && $rows['RecommendKcal'] <= '2600') {
                                                                                ?>
                                                                                        <script src="assets/js/Drinkmilk0/2400/showfood.js"></script>
                                                                                        <script src="assets/js/Drinkmilk0/2400/food.js"></script>
                                                                                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                                                                        <!--<img src="https://media.healthyfood.com/wp-content/uploads/2017/03/The-perfect-plate-500x500.jpg" style="width: 300px;"><br> -->
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice" value="6">ข้าว (แป้ง) 12 ทัพพี</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ น้อยกว่าหรือเท่ากับ แป้ง</a><br><br>
                                                                                        <a href="#" style="color: black;">ผักครึ่งจาน</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้ 4 ส่วน</a><br><br>
                                                                                <?php
                                                                                } else if ($rows['RecommendKcal'] > '2600') {
                                                                                ?>
                                                                                        <script src="assets/js/Drinkmilk0/2600/showfood.js"></script>
                                                                                        <script src="assets/js/Drinkmilk0/2600/food.js"></script>
                                                                                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                                                                        <!--<img src="https://media.healthyfood.com/wp-content/uploads/2017/03/The-perfect-plate-500x500.jpg" style="width: 300px;"><br> -->
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice" value="6">ข้าว (แป้ง) 12 ทัพพี</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ น้อยกว่าหรือเท่ากับ แป้ง</a><br><br>
                                                                                        <a href="#" style="color: black;">ผักครึ่งจาน</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้ 5 ส่วน</a><br><br>
                                                                                <?php
                                                                                }
                                                                        }
                                                                        ////กินนม 1 แก้ว
                                                                        else if ($rows['DrinkMike'] == '1') {
                                                                                if ($rows['RecommendKcal'] >= '1200' && $rows['RecommendKcal'] <= '1400') {
                                                                                ?>
                                                                                        <script src="assets/js/Drinkmilk1/1200/showfood.js"></script>
                                                                                        <script src="assets/js/Drinkmilk1/1200/food.js"></script>
                                                                                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                                                                        <!--<img src="https://media.healthyfood.com/wp-content/uploads/2017/03/The-perfect-plate-500x500.jpg" style="width: 300px;"><br> -->
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง) 6 ทัพพี</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ น้อยกว่าหรือเท่ากับฟ แป้ง</a><br><br>
                                                                                        <a href="#" style="color: black;">ผักครึ่งจาน</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้ 1 ส่วน</a><br><br>


                                                                                <?php
                                                                                } else if ($rows['RecommendKcal'] > '1400' && $rows['RecommendKcal'] <= '1600') {
                                                                                ?>

                                                                                        <script src="assets/js/Drinkmilk1/1400/food.js"></script>
                                                                                        <img src="assets/img/D1-1400.jpeg" width="350px"><br>
                                                                                        <!--<img src="https://media.healthyfood.com/wp-content/uploads/2017/03/The-perfect-plate-500x500.jpg" style="width: 300px;"><br> -->
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง) 7 ทัพพี</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ น้อยกว่าหรือเท่ากับ แป้ง</a><br><br>
                                                                                        <a href="#" style="color: black;">ผักครึ่งจาน</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้ 1 ส่วน</a><br><br>
                                                                                <?php
                                                                                } else if ($rows['RecommendKcal'] > '1600' && $rows['RecommendKcal'] <= '1800') {
                                                                                ?>
                                                                                        <script src="assets/js/Drinkmilk1/1400/showfood.js"></script>
                                                                                        <script src="assets/js/Drinkmilk1/1400/food.js"></script>
                                                                                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                                                                        <!--<img src="https://media.healthyfood.com/wp-content/uploads/2017/03/The-perfect-plate-500x500.jpg" style="width: 300px;"><br> -->
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง) 8 ทัพพี</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ น้อยกว่าหรือเท่ากับ แป้ง</a><br><br>
                                                                                        <a href="#" style="color: black;">ผักครึ่งจาน</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้ 2 ส่วน</a><br><br>
                                                                                <?php
                                                                                } else if ($rows['RecommendKcal'] > '1800' && $rows['RecommendKcal'] <= '2000') {
                                                                                ?>
                                                                                        <script src="assets/js/Drinkmilk1/1800/showfood.js"></script>
                                                                                        <script src="assets/js/Drinkmilk1/1800/food.js"></script>
                                                                                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                                                                        <!--<img src="https://media.healthyfood.com/wp-content/uploads/2017/03/The-perfect-plate-500x500.jpg" style="width: 300px;"><br> -->
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง) 9 ทัพพี</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ น้อยกว่าหรือเท่ากับ แป้ง</a><br><br>
                                                                                        <a href="#" style="color: black;">ผักครึ่งจาน</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้ 3 ส่วน</a><br><br>
                                                                                <?php
                                                                                } else if ($rows['RecommendKcal'] > '2000' && $rows['RecommendKcal'] <= '2200') {
                                                                                ?>
                                                                                        <script src="assets/js/Drinkmilk1/2000/showfood.js"></script>
                                                                                        <script src="assets/js/Drinkmilk1/2000/food.js"></script>
                                                                                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                                                                        <!--<img src="https://media.healthyfood.com/wp-content/uploads/2017/03/The-perfect-plate-500x500.jpg" style="width: 300px;"><br> -->
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง) 9 ทัพพี</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ น้อยกว่าหรือเท่ากับ แป้ง</a><br><br>
                                                                                        <a href="#" style="color: black;">ผักครึ่งจาน</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้ 4 ส่วน</a><br><br>

                                                                                <?php
                                                                                } else if ($rows['RecommendKcal'] > '2200' && $rows['RecommendKcal'] <= '2400') {
                                                                                ?>
                                                                                        <script src="assets/js/Drinkmilk1/2200/showfood.js"></script>
                                                                                        <script src="assets/js/Drinkmilk1/2200/food.js"></script>
                                                                                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                                                                        <!--<img src="https://media.healthyfood.com/wp-content/uploads/2017/03/The-perfect-plate-500x500.jpg" style="width: 300px;"><br> -->
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง) 11 ทัพพี</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ น้อยกว่าหรือเท่ากับ แป้ง</a><br><br>
                                                                                        <a href="#" style="color: black;">ผักครึ่งจาน</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้ 4 ส่วน</a><br><br>
                                                                                <?php
                                                                                } else if ($rows['RecommendKcal'] > '2400' && $rows['RecommendKcal'] <= '2600') {
                                                                                ?>
                                                                                        <script src="assets/js/Drinkmilk1/2400/showfood.js"></script>
                                                                                        <script src="assets/js/Drinkmilk1/2400/food.js"></script>
                                                                                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                                                                        <!--<img src="https://media.healthyfood.com/wp-content/uploads/2017/03/The-perfect-plate-500x500.jpg" style="width: 300px;"><br> -->
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง) 12 ทัพพี</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ น้อยกว่าหรือเท่ากับ แป้ง</a><br><br>
                                                                                        <a href="#" style="color: black;">ผักครึ่งจาน</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้ 4 ส่วน</a><br><br>
                                                                                <?php
                                                                                } else if ($rows['RecommendKcal'] > '2600') {
                                                                                ?>
                                                                                        <script src="assets/js/Drinkmilk1/2600/showfood.js"></script>
                                                                                        <script src="assets/js/Drinkmilk1/2600/food.js"></script>
                                                                                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                                                                        <!--<img src="https://media.healthyfood.com/wp-content/uploads/2017/03/The-perfect-plate-500x500.jpg" style="width: 300px;"><br> -->
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง) 12 ทัพพี</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ น้อยกว่าหรือเท่ากับ แป้ง</a><br><br>
                                                                                        <a href="#" style="color: black;">ผักครึ่งจาน</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้ 5 ส่วน</a><br><br>
                                                                                <?php
                                                                                }
                                                                        }
                                                                        ////กินนม 2 แก้ว
                                                                        else {
                                                                                if ($rows['RecommendKcal'] >= '1200' && $rows['RecommendKcal'] <= '1400') {
                                                                                ?>

                                                                                        <script src="assets/js/Drinkmilk2/1200/showfood.js"></script>
                                                                                        <script src="assets/js/Drinkmilk2/1200/food.js"></script>
                                                                                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                                                                        <!--<img src="https://media.healthyfood.com/wp-content/uploads/2017/03/The-perfect-plate-500x500.jpg" style="width: 300px;"><br> -->
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง) 4 ทัพพี</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ น้อยกว่าหรือเท่ากับ แป้ง</a><br><br>
                                                                                        <a href="#" style="color: black;">ผักครึ่งจาน</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้ 1 ส่วน</a><br><br>

                                                                                <?php
                                                                                } else if ($rows['RecommendKcal'] > '1400' && $rows['RecommendKcal'] <= '1600') {
                                                                                ?>
                                                                                        <script src="assets/js/Drinkmilk2/1400/showfood.js"></script>
                                                                                        <script src="assets/js/Drinkmilk2/1400/food.js"></script>
                                                                                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                                                                        <!--<img src="https://media.healthyfood.com/wp-content/uploads/2017/03/The-perfect-plate-500x500.jpg" style="width: 300px;"><br> -->
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง) 5 ทัพพี</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ น้อยกว่าหรือเท่ากับ แป้ง</a><br><br>
                                                                                        <a href="#" style="color: black;">ผักครึ่งจาน</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้ 1 ส่วน</a><br><br>
                                                                                <?php
                                                                                } else if ($rows['RecommendKcal'] > '1600' && $rows['RecommendKcal'] <= '1800') {
                                                                                ?>
                                                                                        <script src="assets/js/Drinkmilk2/1600/showfood.js"></script>
                                                                                        <script src="assets/js/Drinkmilk2/1600/food.js"></script>
                                                                                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                                                                        <!--<img src="https://media.healthyfood.com/wp-content/uploads/2017/03/The-perfect-plate-500x500.jpg" style="width: 300px;"><br> -->
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง) 7 ทัพพี</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ น้อยกว่าหรือเท่ากับ แป้ง</a><br><br>
                                                                                        <a href="#" style="color: black;">ผักครึ่งจาน</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้ 1 ส่วน</a><br><br>
                                                                                <?php
                                                                                } else if ($rows['RecommendKcal'] > '1800' && $rows['RecommendKcal'] <= '2000') {
                                                                                ?>
                                                                                        <script src="assets/js/Drinkmilk2/1800/showfood.js"></script>
                                                                                        <script src="assets/js/Drinkmilk2/1800/food.js"></script>
                                                                                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                                                                        <!--<img src="https://media.healthyfood.com/wp-content/uploads/2017/03/The-perfect-plate-500x500.jpg" style="width: 300px;"><br> -->
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง) 9 ทัพพี</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ น้อยกว่าหรือเท่ากับ แป้ง</a><br><br>
                                                                                        <a href="#" style="color: black;">ผักครึ่งจาน</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้ 2 ส่วน</a><br><br>
                                                                                <?php
                                                                                } else if ($rows['RecommendKcal'] > '2000' && $rows['RecommendKcal'] <= '2200') {
                                                                                ?>
                                                                                        <script src="assets/js/Drinkmilk2/2000/showfood.js"></script>
                                                                                        <script src="assets/js/Drinkmilk2/2000/food.js"></script>
                                                                                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                                                                        <!--<img src="https://media.healthyfood.com/wp-content/uploads/2017/03/The-perfect-plate-500x500.jpg" style="width: 300px;"><br> -->
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง) 9 ทัพพี</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ น้อยกว่าหรือเท่ากับ แป้ง</a><br><br>
                                                                                        <a href="#" style="color: black;">ผักครึ่งจาน</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้ 3 ส่วน</a><br><br>
                                                                                <?php
                                                                                } else if ($rows['RecommendKcal'] > '2200' && $rows['RecommendKcal'] <= '2400') {
                                                                                ?>
                                                                                        <script src="assets/js/Drinkmilk2/2200/showfood.js"></script>
                                                                                        <script src="assets/js/Drinkmilk2/2200/food.js"></script>
                                                                                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                                                                        <!--<img src="https://media.healthyfood.com/wp-content/uploads/2017/03/The-perfect-plate-500x500.jpg" style="width: 300px;"><br> -->
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง) 10 ทัพพี</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ น้อยกว่าหรือเท่ากับ แป้ง</a><br><br>
                                                                                        <a href="#" style="color: black;">ผักครึ่งจาน</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้ 4 ส่วน</a><br><br>
                                                                                <?php
                                                                                } else if ($rows['RecommendKcal'] > '2400' && $rows['RecommendKcal'] <= '2600') {
                                                                                ?>
                                                                                        <script src="assets/js/Drinkmilk2/2400/showfood.js"></script>
                                                                                        <script src="assets/js/Drinkmilk2/2400/food.js"></script>
                                                                                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                                                                        <!--<img src="https://media.healthyfood.com/wp-content/uploads/2017/03/The-perfect-plate-500x500.jpg" style="width: 300px;"><br> -->
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง) 11 ทัพพี</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ น้อยกว่าหรือเท่ากับ แป้ง</a><br><br>
                                                                                        <a href="#" style="color: black;">ผักครึ่งจาน</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้ 4 ส่วน</a><br><br>
                                                                                <?php
                                                                                } else if ($rows['RecommendKcal'] > '2600') {
                                                                                ?>
                                                                                        <script src="assets/js/Drinkmilk2/2600/showfood.js"></script>
                                                                                        <script src="assets/js/Drinkmilk2/2600/food.js"></script>
                                                                                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                                                                        <!--<img src="https://media.healthyfood.com/wp-content/uploads/2017/03/The-perfect-plate-500x500.jpg" style="width: 300px;"><br> -->
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง) 12 ทัพพี</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ น้อยกว่าหรือเท่ากับ แป้ง</a><br><br>
                                                                                        <a href="#" style="color: black;">ผักครึ่งจาน</a><br><br>
                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้ 5 ส่วน</a><br><br>
                                                                <?php
                                                                                }
                                                                        }
                                                                }
                                                                ?>
                                                        </div>



                                                        <?php
                                                        foreach ($db->to_Obj($sql) as $rows) { ?>
                                                                <div class="card-footer" style="background: white;">
                                                                        <b>
                                                                                <p>ปริมาณพลังงานที่ต้องการ <?php echo ($rows['RecommendKcal']); ?> kcal</p>
                                                                        </b>
                                                                </div>
                                                        <?php } ?>
                                                </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                        <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">รายการผลไม้แนะนำ</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                                <center>
                                                                                        <img src="assets/img/ผลไม้.png" style="max-width:300px;"><br>

                                                                                </center>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                                <!-- END MODAL 1 -->
                                                <!-- Modal2 -->
                                                <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                        <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel"><b>ข้าวแป้ง</b> ข้าว 1 ส่วน เท่ากับ 1 ทัพพี(โดยประมาณ)</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                                <center>
                                                                                        <img src="assets/img/ข้าวแป้ง.png" style="max-width:300px;"><br>

                                                                                </center>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                                <!-- END MODAL 2 -->
                                                <!-- Modal3 -->
                                                <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                        <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel"><b>เนื้อสัตว์</b> เนื้อสัตว์ 1 ส่วน เท่ากับ เนื้อสัตว์สุก 2 ช้อนกินข้าว</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                                <center>
                                                                                        <img src="assets/img/เนื้อสัตว์.png" style="max-width:300px;"><br>
                                                                                </center>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                                <!-- END MODAL 3 -->
                                        </div>
                                </div>

                        </section><!-- End Hero -->

                        <!-- ======= Hero Section 1 มื้อเช้า ======= -->

                        <section id="hero" class="hero align-items-center">
                                <div class="container">
                                        <div class="row">
                                                <div class="card text-center">
                                                        <div class="card-header">
                                                                <br>
                                                                <h1>Step 1 : มื้อเช้า</h1>

                                                        </div>
                                                        <div class="card-body">
                                                                <div class="d-grid gap-4">
                                                                        <div class="row row-cols-3 row-cols-lg-5 g-2 g-lg-3">
                                                                                <div class="col-md-4">
                                                                                        <label for="DiffRice1" class="form-label">ข้าว/แป้ง</label>
                                                                                </div>
                                                                                <div class="col-md-5">
                                                                                        <div class="input-group w-auto justify-content-end align-items-center">
                                                                                                <input type="button" value="-" class="button-minus border rounded-circle  icon-shape icon-sm mx-1 " data-field="quantity" id="decremR1">
                                                                                                <input type="text" step="1" max="10" value="0" class="quantity-field border-0 text-center w-25" name="quantity" id="DiffRice1" onInput="addFood();" value="0">
                                                                                                <input type="button" value="+" class="button-plus border rounded-circle icon-shape icon-sm " data-field="quantity" id="incremR1">
                                                                                        </div>
                                                                                </div>

                                                                                <div class="col-md-3">
                                                                                        <input class="form-control" type="number" value="" size="20" name="totalRice" id="totalRice" readonly>
                                                                                </div>

                                                                        </div>
                                                                        <div class="row row-cols-3 row-cols-lg-5 g-2 g-lg-3">
                                                                                <div class="col-md-4">
                                                                                        <label for="DiffRice1" class="form-label">เนื้อสัตว์</label>
                                                                                </div>
                                                                               
                                                                                <div class="col-md-5">
                                                                                        <div class="input-group w-auto justify-content-end align-items-center">
                                                                                                <input type="button" value="-" class="button-minus border rounded-circle  icon-shape icon-sm mx-1 " data-field="quantity" id="decremM1">
                                                                                                <input type="text" step="1" max="10" value="0" class="quantity-field border-0 text-center w-25" name="quantity" id="DiffMeet1" onInput="addFood();" value="0">
                                                                                                <input type="button" value="+" class="button-plus border rounded-circle icon-shape icon-sm " data-field="quantity" id="incremM1">
                                                                                        </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                        <input class="form-control" type="number" value="" size="20" name="totalMeet" id="totalMeet" readonly>
                                                                                </div>
                                                                        </div>
                                                                        
                                                                        <div class="row row-cols-3 row-cols-lg-5 g-2 g-lg-3">
                                                                                <div class="col-md-4">
                                                                                        <label for="DiffRice1" class="form-label">ผลไม้</label>
                                                                                </div>
                                                                               
                                                                                <div class="col-md-5">
                                                                                        <div class="input-group w-auto justify-content-end align-items-center">
                                                                                                <input type="button" value="-" class="button-minus border rounded-circle  icon-shape icon-sm mx-1 " data-field="quantity" id="decrem">
                                                                                                <input type="text" step="1" max="10" value="0" class="quantity-field border-0 text-center w-25" name="quantity" id="DiffFriut1" onInput="addFood();" value="0">
                                                                                                <input type="button" value="+" class="button-plus border rounded-circle icon-shape icon-sm " data-field="quantity" id="increm">
                                                                                        </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                        <input class="form-control" type="number" value="" size="20" name="totalFriut" id="totalFriut" readonly>
                                                                                </div>
                                                                        </div>
                                                                        <div class="row">
                                                                                <div class="circle">
                                                                                        <div class="half-circle">
                                                                                                <img id="scream" width="100%" height="100%" src="https://www.thaihealth.or.th/data/content/2017/04/36104/cms/newscms_thaihealth_c_bginpqsuz179.jpg" alt="The Scream">

                                                                                        </div>
                                                                                        <div class="half-circle-right">
                                                                                                <div class="circle-top">

                                                                                                </div>
                                                                                                <div class="circle-bottom">


                                                                                                </div>
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                        <!-- Modal4 -->
                                        <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                                <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel"><b>กำหนดอาหารมื้อเช้า</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">

                                                                </div>
                                                                <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                        <!-- END MODAL 4 -->
                                </div>

                        </section><!-- End Hero -->

                        <!-- ======= Hero Section 2 มื้อกลางวัน ======= -->
                        <section id="hero" class="hero align-items-center">
                                <div class="container">
                                        <div class="row">
                                                <div class="card text-center">
                                                        <div class="card-header">
                                                                <br>
                                                                <h1>Step 2 : มื้อกลางวัน</h1>

                                                        </div>
                                                        <div class="card-body">
                                                                <div class="app-paper2">

                                                                        <input type="radio" name="DrinkMike" id="9" class="hidebx" value="0" data-bs-toggle="modal" data-bs-target="#exampleModal5">
                                                                        <label for="9" class="lbl-radio">
                                                                                <div class="display-box">
                                                                                        <div class="size">กำหนดอาหารมื้อกลางวัน</div>
                                                                                </div>
                                                                        </label>
                                                                        <div id="chartContainer2" style="height: 300px; width: 100%;"></div>
                                                                </div>

                                                        </div>
                                                </div>
                                        </div>
                                        <!-- Modal5 -->
                                        <div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                                <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel"><b>กำหนดอาหารมื้อกลางวัน</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                        <div class="row">
                                                                                <label for="DiffRice1" class="form-label">ข้าว/แป้ง</label>
                                                                                <div class="col-md-6">
                                                                                        <input class="form-control" type="number" value="" size="20" name="DiffRice2" id="DiffRice2" placeholder="ข้าว/แป้ง" onInput="addFood2();">
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                        <input class="form-control" type="number" value="" size="20" name="totalRice2" id="totalRice2" readonly>
                                                                                </div>
                                                                        </div>
                                                                        <div class="row">
                                                                                <label for="DiffRice1" class="form-label">เนื้อสัตว์</label>
                                                                                <div class="col-md-6">
                                                                                        <input class="form-control" type="number" value="" size="20" name="DiffMeet2" id="DiffMeet2" placeholder="เนื้อสัตว์" onInput="addFood2();">
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                        <input class="form-control" type="number" value="" size="20" name="totalMeet2" id="totalMeet2" readonly>
                                                                                </div>
                                                                        </div>
                                                                        <div class="row">
                                                                                <label for="DiffRice1" class="form-label">ผัก</label>
                                                                                <div class="col-md-6">
                                                                                        <input class="form-control" type="number" value="" size="20" name="DiffVeg2" id="DiffVeg2" placeholder="ผัก" onInput="addFood2();">
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                        <input class="form-control" type="number" value="" size="20" name="totalVeg2" id="totalVeg2" readonly>
                                                                                </div>
                                                                        </div>
                                                                        <div class="row">
                                                                                <label for="DiffRice1" class="form-label">ผลไม้</label>
                                                                                <div class="col-md-6">
                                                                                        <input class="form-control" type="number" value="" size="20" name="DiffFriut2" id="DiffFriut2" placeholder="ผลไม้" onInput="addFood2();">
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                        <input class="form-control" type="number" value="" size="20" name="totalFriut2" id="totalFriut2" readonly>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                        <!-- END MODAL 5 -->
                                </div>
                        </section><!-- End Hero -->

                        <!-- ======= Hero Section 3 มืื้อเย็น ======= -->
                        <section id="hero" class="hero align-items-center">
                                <div class="container">
                                        <div class="row">
                                                <div class="card text-center">
                                                        <div class="card-header">
                                                                <br>
                                                                <h1>Step 3 : มื้อเย็น</h1>

                                                        </div>
                                                        <div class="card-body">
                                                                <div class="app-paper2">

                                                                        <input type="radio" name="DrinkMike" id="10" class="hidebx" value="0" data-bs-toggle="modal" data-bs-target="#exampleModal6">
                                                                        <label for="10" class="lbl-radio">
                                                                                <div class="display-box">
                                                                                        <div class="size">กำหนดอาหารมื้อเย็น</div>
                                                                                </div>
                                                                        </label>
                                                                        <div id="chartContainer3" style="height: 300px; width: 100%;"></div>
                                                                </div>

                                                        </div>
                                                </div>
                                        </div>
                                        <!-- Modal5 -->
                                        <div class="modal fade" id="exampleModal6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                                <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel"><b>กำหนดอาหารมื้อเย็น</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                        <div class="row">
                                                                                <label for="DiffRice1" class="form-label">ข้าว/แป้ง</label>
                                                                                <div class="col-md-6">
                                                                                        <input class="form-control" type="number" value="" size="20" name="DiffRice3" id="DiffRice3" placeholder="ข้าว/แป้ง" onInput="addFood3();">
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                        <input class="form-control" type="number" value="" size="20" name="totalRice3" id="totalRice3" readonly>
                                                                                </div>
                                                                        </div>
                                                                        <div class="row">
                                                                                <label for="DiffRice1" class="form-label">เนื้อสัตว์</label>
                                                                                <div class="col-md-6">
                                                                                        <input class="form-control" type="number" value="" size="20" name="DiffMeet3" id="DiffMee3" placeholder="เนื้อสัตว์" onInput="addFood3();">
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                        <input class="form-control" type="number" value="" size="20" name="totalMeet3" id="totalMeet3" readonly>
                                                                                </div>
                                                                        </div>
                                                                        <div class="row">
                                                                                <label for="DiffRice1" class="form-label">ผัก</label>
                                                                                <div class="col-md-6">
                                                                                        <input class="form-control" type="number" value="" size="20" name="DiffVeg3" id="DiffVeg3" placeholder="ผัก" onInput="addFood3();">
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                        <input class="form-control" type="number" value="" size="20" name="totalVeg3" id="totalVeg3" readonly>
                                                                                </div>
                                                                        </div>
                                                                        <div class="row">
                                                                                <label for="DiffRice1" class="form-label">ผลไม้</label>
                                                                                <div class="col-md-6">
                                                                                        <input class="form-control" type="number" value="" size="20" name="DiffFriut3" id="DiffFriut3" placeholder="ผลไม้" onInput="addFood3();">
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                        <input class="form-control" type="number" value="" size="20" name="totalFriut3" id="totalFriut3" readonly>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                        <!-- END MODAL 5 -->
                                </div>
                </form>
                <!-- End Form -->
                </section><!-- End Hero -->

                <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

                <!-- Vendor JS Files -->
                <script src="assets/vendor/purecounter/purecounter.js"></script>
                <script src="assets/vendor/aos/aos.js"></script>
                <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
                <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
                <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
                <script src="assets/vendor/php-email-form/validate.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                <!-- Template Main JS File -->

                <script src="assets/js/main.js"></script>
                <script>
                        function incrementValue(e) {
                                e.preventDefault();
                                var fieldName = $(e.target).data('field');
                                var parent = $(e.target).closest('div');
                                var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

                                if (!isNaN(currentVal)) {
                                        parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
                                } else {
                                        parent.find('input[name=' + fieldName + ']').val(0);
                                }

                        }

                        function decrementValue(e) {
                                e.preventDefault();
                                var fieldName = $(e.target).data('field');
                                var parent = $(e.target).closest('div');
                                var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

                                if (!isNaN(currentVal) && currentVal > 0) {
                                        parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
                                } else {
                                        parent.find('input[name=' + fieldName + ']').val(0);
                                }
                        }

                        $('.input-group').on('click', '.button-plus', function(e) {
                                incrementValue(e);
                        });

                        $('.input-group').on('click', '.button-minus', function(e) {
                                decrementValue(e);
                        });


                        $(function() {
                                $('#incremR1').on('click', function() {
                                        let imageToADD = 1;
                                        var src = 'assets/img/ทัพพีข้าว.png'
                                        var img = $("<img src='" + src + "'  width=\"50\" height=\"40\" id=\"imageR_" + imageToADD + "\">");
                                        $('.circle-top').append(img);
                                        imageToADD++;
                                });
                        })

                        $(function() {
                                $('#incremM1').on('click', function() {
                                        let imageToADD = 1;
                                        var src = 'assets/img/ไก่.png'
                                        var img = $("<img src='" + src + "'  width=\"50\" height=\"40\" id=\"imageM_" + imageToADD + "\">");
                                        $('.circle-bottom').append(img);
                                        imageToADD++;
                                });
                        })



                        document.getElementById("decremR1").onclick = function() {
                                let imageToDelete = 1;
                                $("#imageR_" + imageToDelete).remove();
                                imageToDelete++;
                        }
                        document.getElementById("decremM1").onclick = function() {
                                let imageToDelete = 1;
                                $("#imageM_" + imageToDelete).remove();
                                imageToDelete++;
                        }
                </script>


        </body>

        </html>
<?php } ?>