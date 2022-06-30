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
                <link href="assets/css/custom.css" rel="stylesheet">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
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
                                width: 145px;
                                height: 320px;
                                -webkit-border-top-left-radius: 150px;
                                -webkit-border-bottom-left-radius: 150px;
                                -moz-border-radius-topleft: 150px;
                                -moz-border-radius-bottomleft: 150px;
                                border-top-left-radius: 150px;
                                border-bottom-left-radius: 150px;
                                border: 3px solid ForestGreen;
                                overflow: hidden;
                                border-right: 0;
                                display: inline-block;

                                object-fit: cover;

                        }

                        .half-circle-right {
                                display: inline-block;
                                object-fit: cover;
                        }

                        .circle-top1 {
                                width: 135px;
                                height: 160px;
                                -webkit-border-top-right-radius: 150px;
                                -moz-border-radius-topright: 150px;
                                border-top-right-radius: 150px;
                                overflow: hidden;
                                border: 3px solid Orange;

                                margin-left: -5px;

                                padding-right: 12px;
                        }

                        .circle-bottom1 {
                                width: 135px;
                                height: 160px;
                                -webkit-border-bottom-right-radius: 150px;
                                -moz-border-radius-bottomright: 150px;
                                border-bottom-right-radius: 150px;
                                overflow: hidden;
                                overflow: hidden;
                                border: 3px solid brown;

                                margin-left: -5px;

                                padding-right: 12px;
                        }

                        .circle-top2 {
                                width: 135px;
                                height: 160px;
                                -webkit-border-top-right-radius: 150px;
                                -moz-border-radius-topright: 150px;
                                border-top-right-radius: 150px;
                                overflow: hidden;
                                border: 3px solid Orange;

                                margin-left: -5px;

                                padding-right: 12px;
                        }

                        .circle-bottom2 {
                                width: 135px;
                                height: 160px;
                                -webkit-border-bottom-right-radius: 150px;
                                -moz-border-radius-bottomright: 150px;
                                border-bottom-right-radius: 150px;
                                overflow: hidden;
                                border: 3px solid Brown;

                                margin-left: -5px;
                                padding-right: 12px;
                        }

                        .circle-top3 {
                                width: 135px;
                                height: 160px;
                                -webkit-border-top-right-radius: 150px;
                                -moz-border-radius-topright: 150px;
                                border-top-right-radius: 150px;
                                overflow: hidden;
                                border: 3px solid Orange;

                                margin-left: -5px;

                                padding-right: 12px;
                        }

                        .circle-bottom3 {
                                width: 135px;
                                height: 160px;
                                -webkit-border-bottom-right-radius: 150px;
                                -moz-border-radius-bottomright: 150px;
                                border-bottom-right-radius: 150px;
                                overflow: hidden;
                                border: 3px solid Brown;

                                margin-left: -5px;
                                padding-right: 12px;
                        }

                        .circle-top1 img {
                                z-index: -1
                        }

                        .circle-top1 {
                                z-index: 1;
                        }



                        #middleTop {
                                width: 130px;
                                height: 160px;
                                -webkit-border-top-right-radius: 150px;
                                -moz-border-radius-topright: 150px;
                                border-top-right-radius: 150px;
                                overflow: hidden;
                        }

                        #middleBottom {
                                width: 130px;
                                height: 160px;
                                -webkit-border-bottom-right-radius: 10px;
                                -moz-border-radius-bottomright: 150px;
                                border-bottom-right-radius: 150px;
                                overflow: hidden;

                        }

                        #box {

                                width: 300px;
                                height: 300px;

                        }
                </style>

        </head>

        <body onload="loadTotal()">

                <!-- ======= Header ======= -->
                <header id="header" class="header fixed-top">
                        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

                                <a href="index.php" class="logo d-flex align-items-center">
                                        <img src="assets/img/logo.png" alt="">
                                        <span>FoodDesign</span>
                                </a>

                                <nav id="navbar" class="navbar">
                                        <ul>
                                                <li><a class="nav-link scrollto active" href="index.php">หน้าหลัก</a></li>
                                                <li><a class="nav-link" href="showFoodDesign.php">คำนวนพลังงาน</a></li>
                                                <li class="dropdown"><a href="#"><span>ผู้ใช้งาน</span> <i class="bi bi-chevron-down"></i></a>
                                                        <ul>
                                                                <li><a href="showFinishFood.php">ดูพลังงานที่ใช้</a></li>
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
                <form class="mb-3" name="AddFood" action="assets/assesment/FoodSubmit.php" method="post">
                        <section id="hero" class="hero d-flex align-items-center">
                                <div class="container">
                                        <div class="row">
                                                <div class="card1 text-center">
                                                        <div class="card1-header">

                                                                <h1>อาหารแนะนำสำหรับคุณต่อวัน <br>เพื่อน้ำหนักตัวตามเป้าหมายและสุขภาพที่ดี</h1>


                                                        </div>
                                                        <div class="card-body">
                                                                <div class="container">

                                                                        <!-- Form Start -->

                                                                        <?php
                                                                        foreach ($db->to_Obj($sql) as $rows) {
                                                                                ////ไม่กินนม 
                                                                                if ($rows['DrinkMike'] == '0') {
                                                                                        if ($rows['RecommendKcal'] < '1200') {
                                                                        ?>
                                                                                                <script src="assets/js/Drinkmilk0/1200/food.js"></script>

                                                                                                <img src="assets/img/D1-1400.jpeg" width="100%" style="max-width:500px;"><br>
                                                                                                <div class="d-flex justify-content-center">
                                                                                                        <div class="d-grid gap-1">
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง)/ทัพพี <input class="form-control md-3" type="text" value="" size="20" name="totalRice1" id="totalRice1" readonly style="background-color: #fff;"> </a> <br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ <input class="form-control" type="text" value="" size="20" name="totalMeet1" id="totalMeet1" readonly style="background-color: #fff;"></a>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้/ส่วน <input class="form-control" type="text" value="" size="20" name="totalFruit1" id="totalFruit1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#"  style="color: black;">นม/แก้ว <input class="form-control" type="text" value="" size="20" name="totalMilk1" id="totalMilk1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>

                                                                                                                </div>
                                                                                                                <div class="col">
                                                                                                                        <div class="input-group mb-3">
                                                                                                                                <a href="#" style="color: black;">ผัก <input class="form-control" type="number" value="" size="20" placeholder="ครึ่งจาน" readonly style="background-color: #fff;"></a><br>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>


                                                                                        <?php
                                                                                        } else  if ($rows['RecommendKcal'] >= '1200' && $rows['RecommendKcal'] < '1400') {
                                                                                        ?>

                                                                                                <script src="assets/js/Drinkmilk0/1200/food.js"></script>

                                                                                                <img src="assets/img/D1-1400.jpeg" width="100%" style="max-width:500px;"><br>
                                                                                                <div class="d-flex justify-content-center">
                                                                                                        <div class="d-grid gap-1">
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง)/ทัพพี <input class="form-control md-3" type="text" value="" size="20" name="totalRice1" id="totalRice1" readonly style="background-color: #fff;"> </a> <br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ <input class="form-control" type="text" value="" size="20" name="totalMeet1" id="totalMeet1" readonly style="background-color: #fff;"></a>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้/ส่วน <input class="form-control" type="text" value="" size="20" name="totalFruit1" id="totalFruit1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" style="color: black;">นม/แก้ว <input class="form-control" type="text" value="" size="20" name="totalMilk1" id="totalMilk1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>

                                                                                                                </div>
                                                                                                                <div class="col">
                                                                                                                        <div class="input-group mb-3">
                                                                                                                                <a href="#" style="color: black;">ผัก <input class="form-control" type="number" value="" size="20" placeholder="ครึ่งจาน" readonly style="background-color: #fff;"></a><br>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>

                                                                                        <?php
                                                                                        } else if ($rows['RecommendKcal'] >= '1400' && $rows['RecommendKcal'] < '1600') {
                                                                                        ?>
                                                                                                <script src="assets/js/Drinkmilk0/1400/food.js"></script>

                                                                                                <img src="assets/img/D1-1400.jpeg" width="100%" style="max-width:500px;"><br>
                                                                                                <div class="d-flex justify-content-center">
                                                                                                        <div class="d-grid gap-1">
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง)/ทัพพี <input class="form-control md-3" type="text" value="" size="20" name="totalRice1" id="totalRice1" readonly style="background-color: #fff;"> </a> <br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ <input class="form-control" type="text" value="" size="20" name="totalMeet1" id="totalMeet1" readonly style="background-color: #fff;"></a>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้/ส่วน <input class="form-control" type="text" value="" size="20" name="totalFruit1" id="totalFruit1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#"  style="color: black;">นม/แก้ว <input class="form-control" type="text" value="" size="20" name="totalMilk1" id="totalMilk1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>

                                                                                                                </div>
                                                                                                                <div class="col">
                                                                                                                        <div class="input-group mb-3">
                                                                                                                                <a href="#" style="color: black;">ผัก <input class="form-control" type="number" value="" size="20" placeholder="ครึ่งจาน" readonly style="background-color: #fff;"></a><br>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        <?php
                                                                                        } else if ($rows['RecommendKcal'] >= '1600' && $rows['RecommendKcal'] < '1800') {
                                                                                        ?>
                                                                                                <script src="assets/js/Drinkmilk0/1600/food.js"></script>

                                                                                                <img src="assets/img/D1-1400.jpeg" width="100%" style="max-width:500px;"><br>
                                                                                                <div class="d-flex justify-content-center">
                                                                                                        <div class="d-grid gap-1">
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง)/ทัพพี <input class="form-control md-3" type="text" value="" size="20" name="totalRice1" id="totalRice1" readonly style="background-color: #fff;"> </a> <br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ <input class="form-control" type="text" value="" size="20" name="totalMeet1" id="totalMeet1" readonly style="background-color: #fff;"></a>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้/ส่วน <input class="form-control" type="text" value="" size="20" name="totalFruit1" id="totalFruit1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#"  style="color: black;">นม/แก้ว <input class="form-control" type="text" value="" size="20" name="totalMilk1" id="totalMilk1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>

                                                                                                                </div>
                                                                                                                <div class="col">
                                                                                                                        <div class="input-group mb-3">
                                                                                                                                <a href="#" style="color: black;">ผัก <input class="form-control" type="number" value="" size="20" placeholder="ครึ่งจาน" readonly style="background-color: #fff;"></a><br>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        <?php
                                                                                        } else if ($rows['RecommendKcal'] >= '1800' && $rows['RecommendKcal'] < '2000') {
                                                                                        ?>
                                                                                                <script src="assets/js/Drinkmilk0/1800/food.js"></script>

                                                                                                <img src="assets/img/D1-1400.jpeg" width="100%" style="max-width:500px;"><br>
                                                                                                <div class="d-flex justify-content-center">
                                                                                                        <div class="d-grid gap-1">
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง)/ทัพพี <input class="form-control md-3" type="text" value="" size="20" name="totalRice1" id="totalRice1" readonly style="background-color: #fff;"> </a> <br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ <input class="form-control" type="text" value="" size="20" name="totalMeet1" id="totalMeet1" readonly style="background-color: #fff;"></a>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้/ส่วน <input class="form-control" type="text" value="" size="20" name="totalFruit1" id="totalFruit1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#"  style="color: black;">นม/แก้ว <input class="form-control" type="text" value="" size="20" name="totalMilk1" id="totalMilk1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>

                                                                                                                </div>
                                                                                                                <div class="col">
                                                                                                                        <div class="input-group mb-3">
                                                                                                                                <a href="#" style="color: black;">ผัก <input class="form-control" type="number" value="" size="20" placeholder="ครึ่งจาน" readonly style="background-color: #fff;"></a><br>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        <?php
                                                                                        } else if ($rows['RecommendKcal'] >= '2000' && $rows['RecommendKcal'] < '2200') {
                                                                                        ?>
                                                                                                <script src="assets/js/Drinkmilk0/2000/food.js"></script>

                                                                                                <img src="assets/img/D1-1400.jpeg" width="100%" style="max-width:500px;"><br>
                                                                                                <div class="d-flex justify-content-center">
                                                                                                        <div class="d-grid gap-1">
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง)/ทัพพี <input class="form-control md-3" type="text" value="" size="20" name="totalRice1" id="totalRice1" readonly style="background-color: #fff;"> </a> <br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ <input class="form-control" type="text" value="" size="20" name="totalMeet1" id="totalMeet1" readonly style="background-color: #fff;"></a>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้/ส่วน <input class="form-control" type="text" value="" size="20" name="totalFruit1" id="totalFruit1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" style="color: black;">นม/แก้ว <input class="form-control" type="text" value="" size="20" name="totalMilk1" id="totalMilk1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>

                                                                                                                </div>
                                                                                                                <div class="col">
                                                                                                                        <div class="input-group mb-3">
                                                                                                                                <a href="#" style="color: black;">ผัก <input class="form-control" type="number" value="" size="20" placeholder="ครึ่งจาน" readonly style="background-color: #fff;"></a><br>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        <?php
                                                                                        } else if ($rows['RecommendKcal'] >= '2200' && $rows['RecommendKcal'] < '2400') {
                                                                                        ?>
                                                                                                <script src="assets/js/Drinkmilk0/2200/food.js"></script>

                                                                                                <img src="assets/img/D1-1400.jpeg" width="100%" style="max-width:500px;"><br>
                                                                                                <div class="d-flex justify-content-center">
                                                                                                        <div class="d-grid gap-1">
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง)/ทัพพี <input class="form-control md-3" type="text" value="" size="20" name="totalRice1" id="totalRice1" readonly style="background-color: #fff;"> </a> <br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ <input class="form-control" type="text" value="" size="20" name="totalMeet1" id="totalMeet1" readonly style="background-color: #fff;"></a>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้/ส่วน <input class="form-control" type="text" value="" size="20" name="totalFruit1" id="totalFruit1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#"  style="color: black;">นม/แก้ว <input class="form-control" type="text" value="" size="20" name="totalMilk1" id="totalMilk1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>

                                                                                                                </div>
                                                                                                                <div class="col">
                                                                                                                        <div class="input-group mb-3">
                                                                                                                                <a href="#" style="color: black;">ผัก <input class="form-control" type="number" value="" size="20" placeholder="ครึ่งจาน" readonly style="background-color: #fff;"></a><br>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        <?php
                                                                                        } else if ($rows['RecommendKcal'] >= '2400' && $rows['RecommendKcal'] < '2600') {
                                                                                        ?>
                                                                                                <script src="assets/js/Drinkmilk0/2400/food.js"></script>

                                                                                                <img src="assets/img/D1-1400.jpeg" width="100%" style="max-width:500px;"><br>
                                                                                                <div class="d-flex justify-content-center">
                                                                                                        <div class="d-grid gap-1">
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง)/ทัพพี <input class="form-control md-3" type="text" value="" size="20" name="totalRice1" id="totalRice1" readonly style="background-color: #fff;"> </a> <br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ <input class="form-control" type="text" value="" size="20" name="totalMeet1" id="totalMeet1" readonly style="background-color: #fff;"></a>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้/ส่วน <input class="form-control" type="text" value="" size="20" name="totalFruit1" id="totalFruit1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" style="color: black;">นม/แก้ว <input class="form-control" type="text" value="" size="20" name="totalMilk1" id="totalMilk1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>

                                                                                                                </div>
                                                                                                                <div class="col">
                                                                                                                        <div class="input-group mb-3">
                                                                                                                                <a href="#" style="color: black;">ผัก <input class="form-control" type="number" value="" size="20" placeholder="ครึ่งจาน" readonly style="background-color: #fff;"></a><br>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        <?php
                                                                                        } else if ($rows['RecommendKcal'] >= '2600') {
                                                                                        ?>
                                                                                                <script src="assets/js/Drinkmilk0/2600/food.js"></script>

                                                                                                <img src="assets/img/D1-1400.jpeg" width="100%" style="max-width:500px;"><br>
                                                                                                <div class="d-flex justify-content-center">
                                                                                                        <div class="d-grid gap-1">
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง)/ทัพพี <input class="form-control md-3" type="text" value="" size="20" name="totalRice1" id="totalRice1" readonly style="background-color: #fff;"> </a> <br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ <input class="form-control" type="text" value="" size="20" name="totalMeet1" id="totalMeet1" readonly style="background-color: #fff;"></a>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้/ส่วน <input class="form-control" type="text" value="" size="20" name="totalFruit1" id="totalFruit1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#"  style="color: black;">นม/แก้ว <input class="form-control" type="text" value="" size="20" name="totalMilk1" id="totalMilk1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>

                                                                                                                </div>
                                                                                                                <div class="col">
                                                                                                                        <div class="input-group mb-3">
                                                                                                                                <a href="#" style="color: black;">ผัก <input class="form-control" type="number" value="" size="20" placeholder="ครึ่งจาน" readonly style="background-color: #fff;"></a><br>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        <?php
                                                                                        }
                                                                                }
                                                                                ////กินนม 1 แก้ว
                                                                                else if ($rows['DrinkMike'] == '1') {
                                                                                        if ($rows['RecommendKcal'] < '1200') {
                                                                                        ?>
                                                                                                <script src="assets/js/Drinkmilk1/1200/food.js"></script>

                                                                                                <img src="assets/img/D1-1400.jpeg" width="100%" style="max-width:500px;"><br>
                                                                                                <div class="d-flex justify-content-center">
                                                                                                        <div class="d-grid gap-1">
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง)/ทัพพี <input class="form-control md-3" type="text" value="" size="20" name="totalRice1" id="totalRice1" readonly style="background-color: #fff;"> </a> <br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ <input class="form-control" type="text" value="" size="20" name="totalMeet1" id="totalMeet1" readonly style="background-color: #fff;"></a>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้/ส่วน <input class="form-control" type="text" value="" size="20" name="totalFruit1" id="totalFruit1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#"  style="color: black;">นม/แก้ว <input class="form-control" type="text" value="" size="20" name="totalMilk1" id="totalMilk1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>

                                                                                                                </div>
                                                                                                                <div class="col">
                                                                                                                        <div class="input-group mb-3">
                                                                                                                                <a href="#" style="color: black;">ผัก <input class="form-control" type="number" value="" size="20" placeholder="ครึ่งจาน" readonly style="background-color: #fff;"></a><br>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        <?php
                                                                                        } else if ($rows['RecommendKcal'] >= '1200' && $rows['RecommendKcal'] < '1400') {
                                                                                        ?>
                                                                                                <script src="assets/js/Drinkmilk1/1200/food.js"></script>

                                                                                                <img src="assets/img/D1-1400.jpeg" width="100%" style="max-width:500px;"><br>
                                                                                                <div class="d-flex justify-content-center">
                                                                                                        <div class="d-grid gap-1">
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง)/ทัพพี <input class="form-control md-3" type="text" value="" size="20" name="totalRice1" id="totalRice1" readonly style="background-color: #fff;"> </a> <br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ <input class="form-control" type="text" value="" size="20" name="totalMeet1" id="totalMeet1" readonly style="background-color: #fff;"></a>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้/ส่วน <input class="form-control" type="text" value="" size="20" name="totalFruit1" id="totalFruit1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#"  style="color: black;">นม/แก้ว <input class="form-control" type="text" value="" size="20" name="totalMilk1" id="totalMilk1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>

                                                                                                                </div>
                                                                                                                <div class="col">
                                                                                                                        <div class="input-group mb-3">
                                                                                                                                <a href="#" style="color: black;">ผัก <input class="form-control" type="number" value="" size="20" placeholder="ครึ่งจาน" readonly style="background-color: #fff;"></a><br>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>




                                                                                        <?php
                                                                                        } else if ($rows['RecommendKcal'] >= '1400' && $rows['RecommendKcal'] < '1600') {
                                                                                        ?>

                                                                                                <script src="assets/js/Drinkmilk1/1400/food.js"></script>

                                                                                                <img src="assets/img/D1-1400.jpeg" width="100%" style="max-width:500px;"><br>
                                                                                                <div class="d-flex justify-content-center">
                                                                                                        <div class="d-grid gap-1">
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง)/ทัพพี <input class="form-control md-3" type="text" value="" size="20" name="totalRice1" id="totalRice1" readonly style="background-color: #fff;"> </a> <br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ <input class="form-control" type="text" value="" size="20" name="totalMeet1" id="totalMeet1" readonly style="background-color: #fff;"></a>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้/ส่วน <input class="form-control" type="text" value="" size="20" name="totalFruit1" id="totalFruit1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#"  style="color: black;">นม/แก้ว <input class="form-control" type="text" value="" size="20" name="totalMilk1" id="totalMilk1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>

                                                                                                                </div>
                                                                                                                <div class="col">
                                                                                                                        <div class="input-group mb-3">
                                                                                                                                <a href="#" style="color: black;">ผัก <input class="form-control" type="number" value="" size="20" placeholder="ครึ่งจาน" readonly style="background-color: #fff;"></a><br>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>



                                                                                        <?php
                                                                                        } else if ($rows['RecommendKcal'] >= '1600' && $rows['RecommendKcal'] < '1800') {
                                                                                        ?>
                                                                                                <script src="assets/js/Drinkmilk1/1600/food.js"></script>

                                                                                                <img src="assets/img/D1-1400.jpeg" width="100%" style="max-width:500px;"><br>
                                                                                                <div class="d-flex justify-content-center">
                                                                                                        <div class="d-grid gap-1">
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง)/ทัพพี <input class="form-control md-3" type="text" value="" size="20" name="totalRice1" id="totalRice1" readonly style="background-color: #fff;"> </a> <br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ <input class="form-control" type="text" value="" size="20" name="totalMeet1" id="totalMeet1" readonly style="background-color: #fff;"></a>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้/ส่วน <input class="form-control" type="text" value="" size="20" name="totalFruit1" id="totalFruit1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#"  style="color: black;">นม/แก้ว <input class="form-control" type="text" value="" size="20" name="totalMilk1" id="totalMilk1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>

                                                                                                                </div>
                                                                                                                <div class="col">
                                                                                                                        <div class="input-group mb-3">
                                                                                                                                <a href="#" style="color: black;">ผัก <input class="form-control" type="number" value="" size="20" placeholder="ครึ่งจาน" readonly style="background-color: #fff;"></a><br>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        <?php
                                                                                        } else if ($rows['RecommendKcal'] >= '1800' && $rows['RecommendKcal'] < '2000') {
                                                                                        ?>
                                                                                                <script src="assets/js/Drinkmilk1/1800/food.js"></script>

                                                                                                <img src="assets/img/D1-1400.jpeg" width="100%" style="max-width:500px;"><br>
                                                                                                <div class="d-flex justify-content-center">
                                                                                                        <div class="d-grid gap-1">
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง)/ทัพพี <input class="form-control md-3" type="text" value="" size="20" name="totalRice1" id="totalRice1" readonly style="background-color: #fff;"> </a> <br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ <input class="form-control" type="text" value="" size="20" name="totalMeet1" id="totalMeet1" readonly style="background-color: #fff;"></a>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้/ส่วน <input class="form-control" type="text" value="" size="20" name="totalFruit1" id="totalFruit1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#"  style="color: black;">นม/แก้ว <input class="form-control" type="text" value="" size="20" name="totalMilk1" id="totalMilk1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>

                                                                                                                </div>
                                                                                                                <div class="col">
                                                                                                                        <div class="input-group mb-3">
                                                                                                                                <a href="#" style="color: black;">ผัก <input class="form-control" type="number" value="" size="20" placeholder="ครึ่งจาน" readonly style="background-color: #fff;"></a><br>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        <?php
                                                                                        } else if ($rows['RecommendKcal'] >= '2000' && $rows['RecommendKcal'] < '2200') {
                                                                                        ?>
                                                                                                <script src="assets/js/Drinkmilk1/2000/food.js"></script>

                                                                                                <img src="assets/img/D1-1400.jpeg" width="100%" style="max-width:500px;"><br>
                                                                                                <div class="d-flex justify-content-center">
                                                                                                        <div class="d-grid gap-1">
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง)/ทัพพี <input class="form-control md-3" type="text" value="" size="20" name="totalRice1" id="totalRice1" readonly style="background-color: #fff;"> </a> <br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ <input class="form-control" type="text" value="" size="20" name="totalMeet1" id="totalMeet1" readonly style="background-color: #fff;"></a>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้/ส่วน <input class="form-control" type="text" value="" size="20" name="totalFruit1" id="totalFruit1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" style="color: black;">นม/แก้ว <input class="form-control" type="text" value="" size="20" name="totalMilk1" id="totalMilk1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>

                                                                                                                </div>
                                                                                                                <div class="col">
                                                                                                                        <div class="input-group mb-3">
                                                                                                                                <a href="#" style="color: black;">ผัก <input class="form-control" type="number" value="" size="20" placeholder="ครึ่งจาน" readonly style="background-color: #fff;"></a><br>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>

                                                                                        <?php
                                                                                        } else if ($rows['RecommendKcal'] >= '2200' && $rows['RecommendKcal'] < '2400') {
                                                                                        ?>
                                                                                                <script src="assets/js/Drinkmilk1/2200/food.js"></script>

                                                                                                <img src="assets/img/D1-1400.jpeg" width="100%" style="max-width:500px;"><br>
                                                                                                <div class="d-flex justify-content-center">
                                                                                                        <div class="d-grid gap-1">
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง)/ทัพพี <input class="form-control md-3" type="text" value="" size="20" name="totalRice1" id="totalRice1" readonly style="background-color: #fff;"> </a> <br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ <input class="form-control" type="text" value="" size="20" name="totalMeet1" id="totalMeet1" readonly style="background-color: #fff;"></a>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้/ส่วน <input class="form-control" type="text" value="" size="20" name="totalFruit1" id="totalFruit1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" style="color: black;">นม/แก้ว <input class="form-control" type="text" value="" size="20" name="totalMilk1" id="totalMilk1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>

                                                                                                                </div>
                                                                                                                <div class="col">
                                                                                                                        <div class="input-group mb-3">
                                                                                                                                <a href="#" style="color: black;">ผัก <input class="form-control" type="number" value="" size="20" placeholder="ครึ่งจาน" readonly style="background-color: #fff;"></a><br>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        <?php
                                                                                        } else if ($rows['RecommendKcal'] >= '2400' && $rows['RecommendKcal'] < '2600') {
                                                                                        ?>
                                                                                                <script src="assets/js/Drinkmilk1/2400/food.js"></script>

                                                                                                <img src="assets/img/D1-1400.jpeg" width="100%" style="max-width:500px;"><br>
                                                                                                <div class="d-flex justify-content-center">
                                                                                                        <div class="d-grid gap-1">
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง)/ทัพพี <input class="form-control md-3" type="text" value="" size="20" name="totalRice1" id="totalRice1" readonly style="background-color: #fff;"> </a> <br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ <input class="form-control" type="text" value="" size="20" name="totalMeet1" id="totalMeet1" readonly style="background-color: #fff;"></a>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้/ส่วน <input class="form-control" type="text" value="" size="20" name="totalFruit1" id="totalFruit1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#"  style="color: black;">นม/แก้ว <input class="form-control" type="text" value="" size="20" name="totalMilk1" id="totalMilk1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>

                                                                                                                </div>
                                                                                                                <div class="col">
                                                                                                                        <div class="input-group mb-3">
                                                                                                                                <a href="#" style="color: black;">ผัก <input class="form-control" type="number" value="" size="20" placeholder="ครึ่งจาน" readonly style="background-color: #fff;"></a><br>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        <?php
                                                                                        } else if ($rows['RecommendKcal'] >= '2600') {
                                                                                        ?>
                                                                                                <script src="assets/js/Drinkmilk1/2600/food.js"></script>

                                                                                                <img src="assets/img/D1-1400.jpeg" width="100%" style="max-width:500px;"><br>
                                                                                                <div class="d-flex justify-content-center">
                                                                                                        <div class="d-grid gap-1">
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง)/ทัพพี <input class="form-control md-3" type="text" value="" size="20" name="totalRice1" id="totalRice1" readonly style="background-color: #fff;"> </a> <br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ <input class="form-control" type="text" value="" size="20" name="totalMeet1" id="totalMeet1" readonly style="background-color: #fff;"></a>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้/ส่วน <input class="form-control" type="text" value="" size="20" name="totalFruit1" id="totalFruit1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#"  style="color: black;">นม/แก้ว <input class="form-control" type="text" value="" size="20" name="totalMilk1" id="totalMilk1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>

                                                                                                                </div>
                                                                                                                <div class="col">
                                                                                                                        <div class="input-group mb-3">
                                                                                                                                <a href="#" style="color: black;">ผัก <input class="form-control" type="number" value="" size="20" placeholder="ครึ่งจาน" readonly style="background-color: #fff;"></a><br>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        <?php
                                                                                        }
                                                                                }
                                                                                ////กินนม 2 แก้ว
                                                                                else {

                                                                                        if ($rows['RecommendKcal'] < '1200') {
                                                                                        ?>
                                                                                                <script src="assets/js/Drinkmilk2/1200/food.js"></script>

                                                                                                <img src="assets/img/D1-1400.jpeg" width="100%" style="max-width:500px;"><br>
                                                                                                <div class="d-flex justify-content-center">
                                                                                                        <div class="d-grid gap-1">
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง)/ทัพพี <input class="form-control md-3" type="text" value="" size="20" name="totalRice1" id="totalRice1" readonly style="background-color: #fff;"> </a> <br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ <input class="form-control" type="text" value="" size="20" name="totalMeet1" id="totalMeet1" readonly style="background-color: #fff;"></a>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้/ส่วน <input class="form-control" type="text" value="" size="20" name="totalFruit1" id="totalFruit1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#"  style="color: black;">นม/แก้ว <input class="form-control" type="text" value="" size="20" name="totalMilk1" id="totalMilk1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>

                                                                                                                </div>
                                                                                                                <div class="col">
                                                                                                                        <div class="input-group mb-3">
                                                                                                                                <a href="#" style="color: black;">ผัก <input class="form-control" type="number" value="" size="20" placeholder="ครึ่งจาน" readonly style="background-color: #fff;"></a><br>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        <?php
                                                                                        }
                                                                                        if ($rows['RecommendKcal'] >= '1200' && $rows['RecommendKcal'] < '1400') {
                                                                                        ?>

                                                                                                <script src="assets/js/Drinkmilk2/1200/food.js"></script>

                                                                                                <img src="assets/img/D1-1400.jpeg" width="100%" style="max-width:500px;"><br>
                                                                                                <div class="d-flex justify-content-center">
                                                                                                        <div class="d-grid gap-1">
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง)/ทัพพี <input class="form-control md-3" type="text" value="" size="20" name="totalRice1" id="totalRice1" readonly style="background-color: #fff;"> </a> <br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ <input class="form-control" type="text" value="" size="20" name="totalMeet1" id="totalMeet1" readonly style="background-color: #fff;"></a>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้/ส่วน <input class="form-control" type="text" value="" size="20" name="totalFruit1" id="totalFruit1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#"  style="color: black;">นม/แก้ว <input class="form-control" type="text" value="" size="20" name="totalMilk1" id="totalMilk1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>

                                                                                                                </div>
                                                                                                                <div class="col">
                                                                                                                        <div class="input-group mb-3">
                                                                                                                                <a href="#" style="color: black;">ผัก <input class="form-control" type="number" value="" size="20" placeholder="ครึ่งจาน" readonly style="background-color: #fff;"></a><br>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>

                                                                                        <?php
                                                                                        } else if ($rows['RecommendKcal'] >= '1400' && $rows['RecommendKcal'] < '1600') {
                                                                                        ?>
                                                                                                <script src="assets/js/Drinkmilk2/1400/food.js"></script>

                                                                                                <img src="assets/img/D1-1400.jpeg" width="100%" style="max-width:500px;"><br>
                                                                                                <div class="d-flex justify-content-center">
                                                                                                        <div class="d-grid gap-1">
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง)/ทัพพี <input class="form-control md-3" type="text" value="" size="20" name="totalRice1" id="totalRice1" readonly style="background-color: #fff;"> </a> <br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ <input class="form-control" type="text" value="" size="20" name="totalMeet1" id="totalMeet1" readonly style="background-color: #fff;"></a>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้/ส่วน <input class="form-control" type="text" value="" size="20" name="totalFruit1" id="totalFruit1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#"  style="color: black;">นม/แก้ว <input class="form-control" type="text" value="" size="20" name="totalMilk1" id="totalMilk1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>

                                                                                                                </div>
                                                                                                                <div class="col">
                                                                                                                        <div class="input-group mb-3">
                                                                                                                                <a href="#" style="color: black;">ผัก <input class="form-control" type="number" value="" size="20" placeholder="ครึ่งจาน" readonly style="background-color: #fff;"></a><br>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        <?php
                                                                                        } else if ($rows['RecommendKcal'] >= '1600' && $rows['RecommendKcal'] < '1800') {
                                                                                        ?>
                                                                                                <script src="assets/js/Drinkmilk2/1600/food.js"></script>

                                                                                                <img src="assets/img/D1-1400.jpeg" width="100%" style="max-width:500px;"><br>
                                                                                                <div class="d-flex justify-content-center">
                                                                                                        <div class="d-grid gap-1">
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง)/ทัพพี <input class="form-control md-3" type="text" value="" size="20" name="totalRice1" id="totalRice1" readonly style="background-color: #fff;"> </a> <br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ <input class="form-control" type="text" value="" size="20" name="totalMeet1" id="totalMeet1" readonly style="background-color: #fff;"></a>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้/ส่วน <input class="form-control" type="text" value="" size="20" name="totalFruit1" id="totalFruit1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#"  style="color: black;">นม/แก้ว <input class="form-control" type="text" value="" size="20" name="totalMilk1" id="totalMilk1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>

                                                                                                                </div>
                                                                                                                <div class="col">
                                                                                                                        <div class="input-group mb-3">
                                                                                                                                <a href="#" style="color: black;">ผัก <input class="form-control" type="number" value="" size="20" placeholder="ครึ่งจาน" readonly style="background-color: #fff;"></a><br>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        <?php
                                                                                        } else if ($rows['RecommendKcal'] >= '1800' && $rows['RecommendKcal'] < '2000') {
                                                                                        ?>
                                                                                                <script src="assets/js/Drinkmilk2/1800/food.js"></script>

                                                                                                <img src="assets/img/D1-1400.jpeg" width="100%" style="max-width:500px;"><br>
                                                                                                <div class="d-flex justify-content-center">
                                                                                                        <div class="d-grid gap-1">
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง)/ทัพพี <input class="form-control md-3" type="text" value="" size="20" name="totalRice1" id="totalRice1" readonly style="background-color: #fff;"> </a> <br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ <input class="form-control" type="text" value="" size="20" name="totalMeet1" id="totalMeet1" readonly style="background-color: #fff;"></a>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้/ส่วน <input class="form-control" type="text" value="" size="20" name="totalFruit1" id="totalFruit1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#"  style="color: black;">นม/แก้ว <input class="form-control" type="text" value="" size="20" name="totalMilk1" id="totalMilk1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>

                                                                                                                </div>
                                                                                                                <div class="col">
                                                                                                                        <div class="input-group mb-3">
                                                                                                                                <a href="#" style="color: black;">ผัก <input class="form-control" type="number" value="" size="20" placeholder="ครึ่งจาน" readonly style="background-color: #fff;"></a><br>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        <?php
                                                                                        } else if ($rows['RecommendKcal'] >= '2000' && $rows['RecommendKcal'] < '2200') {
                                                                                        ?>
                                                                                                <script src="assets/js/Drinkmilk2/2000/food.js"></script>

                                                                                                <img src="assets/img/D1-1400.jpeg" width="100%" style="max-width:500px;"><br>
                                                                                                <div class="d-flex justify-content-center">
                                                                                                        <div class="d-grid gap-1">
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง)/ทัพพี <input class="form-control md-3" type="text" value="" size="20" name="totalRice1" id="totalRice1" readonly style="background-color: #fff;"> </a> <br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ <input class="form-control" type="text" value="" size="20" name="totalMeet1" id="totalMeet1" readonly style="background-color: #fff;"></a>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้/ส่วน <input class="form-control" type="text" value="" size="20" name="totalFruit1" id="totalFruit1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#"  style="color: black;">นม/แก้ว <input class="form-control" type="text" value="" size="20" name="totalMilk1" id="totalMilk1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>

                                                                                                                </div>
                                                                                                                <div class="col">
                                                                                                                        <div class="input-group mb-3">
                                                                                                                                <a href="#" style="color: black;">ผัก <input class="form-control" type="number" value="" size="20" placeholder="ครึ่งจาน" readonly style="background-color: #fff;"></a><br>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        <?php
                                                                                        } else if ($rows['RecommendKcal'] >= '2200' && $rows['RecommendKcal'] < '2400') {
                                                                                        ?>
                                                                                                <script src="assets/js/Drinkmilk2/2200/food.js"></script>

                                                                                                <img src="assets/img/D1-1400.jpeg" width="100%" style="max-width:500px;"><br>
                                                                                                <div class="d-flex justify-content-center">
                                                                                                        <div class="d-grid gap-1">
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง)/ทัพพี <input class="form-control md-3" type="text" value="" size="20" name="totalRice1" id="totalRice1" readonly style="background-color: #fff;"> </a> <br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ <input class="form-control" type="text" value="" size="20" name="totalMeet1" id="totalMeet1" readonly style="background-color: #fff;"></a>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้/ส่วน <input class="form-control" type="text" value="" size="20" name="totalFruit1" id="totalFruit1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#"  style="color: black;">นม/แก้ว <input class="form-control" type="text" value="" size="20" name="totalMilk1" id="totalMilk1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>

                                                                                                                </div>
                                                                                                                <div class="col">
                                                                                                                        <div class="input-group mb-3">
                                                                                                                                <a href="#" style="color: black;">ผัก <input class="form-control" type="number" value="" size="20" placeholder="ครึ่งจาน" readonly style="background-color: #fff;"></a><br>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        <?php
                                                                                        } else if ($rows['RecommendKcal'] >= '2400' && $rows['RecommendKcal'] < '2600') {
                                                                                        ?>
                                                                                                <script src="assets/js/Drinkmilk2/2400/food.js"></script>

                                                                                                <img src="assets/img/D1-1400.jpeg" width="100%" style="max-width:500px;"><br>
                                                                                                <div class="d-flex justify-content-center">
                                                                                                        <div class="d-grid gap-1">
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง)/ทัพพี <input class="form-control md-3" type="text" value="" size="20" name="totalRice1" id="totalRice1" readonly style="background-color: #fff;"> </a> <br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ <input class="form-control" type="text" value="" size="20" name="totalMeet1" id="totalMeet1" readonly style="background-color: #fff;"></a>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้/ส่วน <input class="form-control" type="text" value="" size="20" name="totalFruit1" id="totalFruit1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#"  style="color: black;">นม/แก้ว <input class="form-control" type="text" value="" size="20" name="totalMilk1" id="totalMilk1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>

                                                                                                                </div>
                                                                                                                <div class="col">
                                                                                                                        <div class="input-group mb-3">
                                                                                                                                <a href="#" style="color: black;">ผัก <input class="form-control" type="number" value="" size="20" placeholder="ครึ่งจาน" readonly style="background-color: #fff;"></a><br>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        <?php
                                                                                        } else if ($rows['RecommendKcal'] >= '2600') {
                                                                                        ?>
                                                                                                <script src="assets/js/Drinkmilk2/2600/food.js"></script>

                                                                                                <img src="assets/img/D1-1400.jpeg" width="100%" style="max-width:500px;"><br>
                                                                                                <div class="d-flex justify-content-center">
                                                                                                        <div class="d-grid gap-1">
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: black;" id="Rice">ข้าว (แป้ง)/ทัพพี <input class="form-control md-3" type="text" value="" size="20" name="totalRice1" id="totalRice1" readonly style="background-color: #fff;"> </a> <br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="color: black;">เนื้อสัตว์ <input class="form-control" type="text" value="" size="20" name="totalMeet1" id="totalMeet1" readonly style="background-color: #fff;"></a>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">ผลไม้/ส่วน <input class="form-control" type="text" value="" size="20" name="totalFruit1" id="totalFruit1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col">
                                                                                                                                <div class="input-group mb-3">
                                                                                                                                        <a href="#" style="color: black;">นม/แก้ว <input class="form-control" type="text" value="" size="20" name="totalMilk1" id="totalMilk1" readonly style="background-color: #fff;"></a><br>
                                                                                                                                </div>
                                                                                                                        </div>

                                                                                                                </div>
                                                                                                                <div class="col">
                                                                                                                        <div class="input-group mb-3">
                                                                                                                                <a href="#" style="color: black;">ผัก <input class="form-control" type="number" value="" size="20" placeholder="ครึ่งจาน" readonly style="background-color: #fff;"></a><br>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                        <?php
                                                                                        }
                                                                                }
                                                                        }
                                                                        ?>

                                                                </div>
                                                                <div class="d-flex justify-content-center">

                                                                        <div class="row row-cols-12">
                                                                                <p>
                                                                                        <b>
                                                                                                <div class="col md-9">ปริมาณพลังงานที่ต้องการ</div>
                                                                                                <div class="col md-3"> <?php echo ($rows['RecommendKcal']); ?></div>
                                                                                        </b>
                                                                                </p>
                                                                        </div>

                                                                </div>
                                                        </div>
                                                </div>


                                                <?php
                                                foreach ($db->to_Obj($sql) as $rows) { ?>



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
                                                                                <img src="assets/img/ผลไม้.png" style="width: 100%;;max-width:500px;"><br>

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
                                                                                <img src="assets/img/ข้าวแป้ง.png" style="width: 100%;;max-width:500px;"><br>

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
                                                                                <img src="assets/img/เนื้อสัตว์.png" style="width: 100%;;max-width:500px;"><br>
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
                                                <div class="card5 text-center">
                                                        <div class="card5-header">
                                                                <br>
                                                                <h1>Step 1 : มื้อเช้า</h1>

                                                        </div>
                                                        <div class="card-body">
                                                                <div class="card5-content">

                                                                        <div class="d-grid gap-4">
                                                                                <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                                                                        <div class="col-md-4">
                                                                                                <label for="DiffRice1" class="form-label">ข้าว/แป้ง</label>
                                                                                        </div>
                                                                                        <div class="col-md-5">
                                                                                                <div class="input-group w-auto justify-content-end align-items-center">
                                                                                                        <input type="button" value="-" class="button-minus border rounded-circle  icon-shape icon-sm mx-1 " data-field="DiffRice1" id="decremR1">
                                                                                                        <input type="text" step="1" max="10" value="0" class="quantity-field border-0 text-center w-25" name="DiffRice1" id="DiffRice1" onInput="addFood();" value="0" readonly>
                                                                                                        <input type="button" value="+" class="button-plus border rounded-circle icon-shape icon-sm " data-field="DiffRice1" id="incremR1">
                                                                                                </div>
                                                                                        </div>



                                                                                </div>
                                                                                <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                                                                        <div class="col-md-4">
                                                                                                <label for="DiffRice1" class="form-label">เนื้อสัตว์</label>
                                                                                        </div>

                                                                                        <div class="col-md-5">
                                                                                                <div class="input-group w-auto justify-content-end align-items-center">
                                                                                                        <input type="button" value="-" class="button-minus border rounded-circle  icon-shape icon-sm mx-1 " data-field="DiffMeet1" id="decremM1">
                                                                                                        <input type="text" step="1" max="10" value="0" class="quantity-field border-0 text-center w-25" name="DiffMeet1" id="DiffMeet1" onInput="addFood();" value="0" readonly>
                                                                                                        <input type="button" value="+" class="button-plus border rounded-circle icon-shape icon-sm " data-field="DiffMeet1" id="incremM1">
                                                                                                </div>
                                                                                        </div>

                                                                                </div>

                                                                                <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                                                                        <div class="col-md-4">
                                                                                                <label for="DiffRice1" class="form-label">ผลไม้</label>
                                                                                        </div>

                                                                                        <div class="col-md-5">
                                                                                                <div class="input-group w-auto justify-content-end align-items-center">
                                                                                                        <input type="button" value="-" class="button-minus border rounded-circle  icon-shape icon-sm mx-1 " data-field="DiffFruit1" id="decremFruit1">
                                                                                                        <input type="text" step="1" max="10" value="0" class="quantity-field border-0 text-center w-25" name="DiffFruit1" id="DiffFriut1" onInput="addFood();" value="0" readonly>
                                                                                                        <input type="button" value="+" class="button-plus border rounded-circle icon-shape icon-sm " data-field="DiffFruit1" id="incremFruit1">
                                                                                                </div>
                                                                                        </div>

                                                                                </div>

                                                                                <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                                                                        <div class="col-md-4">
                                                                                                <label for="DiffRice1" class="form-label">นม</label>
                                                                                        </div>

                                                                                        <div class="col-md-5">
                                                                                                <div class="input-group w-auto justify-content-end align-items-center">
                                                                                                        <input type="button" value="-" class="button-minus border rounded-circle  icon-shape icon-sm mx-1 " data-field="DiffMilk1" id="decremMilk1">
                                                                                                        <input type="text" step="1" max="10" value="0" class="quantity-field border-0 text-center w-25" name="DiffMilk1" id="DiffMilk1" onInput="addFood();" value="0" readonly>
                                                                                                        <input type="button" value="+" class="button-plus border rounded-circle icon-shape icon-sm " data-field="DiffMilk1" id="incremMilk1">
                                                                                                </div>
                                                                                        </div>

                                                                                </div>
                                                                                <div class="d-grid gap-2">
                                                                                        <div class="circle" style="display: flex;flex-wrap: nowrap;justify-content: center;">
                                                                                                <div class="half-circle">
                                                                                                        <img id="scream" width="350px" height="100%" src="https://ichef.bbci.co.uk/news/640/cpsprodpb/0E1B/production/_113111630_fruitandveg.jpg" alt="The Scream" style="object-fit: cover;">

                                                                                                </div>


                                                                                                <div class="half-circle-right">
                                                                                                        <div id="middleTop">
                                                                                                                <div id="box">
                                                                                                                        <div class="circle-top1">

                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                        <div id="middleBottom">
                                                                                                                <div id="box">
                                                                                                                        <div class="circle-bottom1">


                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>

                                                                                        <div class="d-flex justify-content-start">
                                                                                                <div class="me-auto ps-3 bd-highlight">
                                                                                                        <div class="Fruit1">

                                                                                                        </div>
                                                                                                </div>
                                                                                                <div class="pe-3 bd-highlight">
                                                                                                        <div class="Milk1">

                                                                                                        </div>
                                                                                                </div>



                                                                                        </div>
                                                                                </div>
                                                                        </div>

                                                                </div>
                                                        </div>
                                                </div>
                                        </div>

                                </div>

                        </section><!-- End Hero -->

                        <!-- ======= Hero Section 2 มื้อกลางวัน ======= -->
                        <section id="hero" class="hero align-items-center">
                                <div class="container">
                                        <div class="row">
                                                <div class="card6 text-center">

                                                        <br>
                                                        <h1>Step 2 : มื้อกลางวัน</h1>


                                                        <div class="card-body">
                                                                <div class="card6-content">
                                                                        <div class="d-grid gap-4">
                                                                                <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                                                                        <div class="col-md-4">
                                                                                                <label for="DiffRice1" class="form-label">ข้าว/แป้ง</label>
                                                                                        </div>
                                                                                        <div class="col-md-5">
                                                                                                <div class="input-group w-auto justify-content-end align-items-center">
                                                                                                        <input type="button" value="-" class="button-minus border rounded-circle  icon-shape icon-sm mx-1 " data-field="DiffRice2" id="decremR2">
                                                                                                        <input type="text" step="1" max="10" value="0" class="quantity-field border-0 text-center w-25" name="DiffRice2" id="DiffRice2" onInput="addFood();" value="0" readonly>
                                                                                                        <input type="button" value="+" class="button-plus border rounded-circle icon-shape icon-sm " data-field="DiffRice2" id="incremR2">
                                                                                                </div>
                                                                                        </div>



                                                                                </div>
                                                                                <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                                                                        <div class="col-md-4">
                                                                                                <label for="DiffRice1" class="form-label">เนื้อสัตว์</label>
                                                                                        </div>

                                                                                        <div class="col-md-5">
                                                                                                <div class="input-group w-auto justify-content-end align-items-center">
                                                                                                        <input type="button" value="-" class="button-minus border rounded-circle  icon-shape icon-sm mx-1 " data-field="DiffMeet2" id="decremM2">
                                                                                                        <input type="text" step="1" max="10" value="0" class="quantity-field border-0 text-center w-25" name="DiffMeet2" id="DiffMeet2" onInput="addFood();" value="0" readonly>
                                                                                                        <input type="button" value="+" class="button-plus border rounded-circle icon-shape icon-sm " data-field="DiffMeet2" id="incremM2">
                                                                                                </div>
                                                                                        </div>

                                                                                </div>

                                                                                <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                                                                        <div class="col-md-4">
                                                                                                <label for="DiffRice1" class="form-label">ผลไม้</label>
                                                                                        </div>

                                                                                        <div class="col-md-5">
                                                                                                <div class="input-group w-auto justify-content-end align-items-center">
                                                                                                        <input type="button" value="-" class="button-minus border rounded-circle  icon-shape icon-sm mx-1 " data-field="DiffFruit2" id="decremFruit2">
                                                                                                        <input type="text" step="1" max="10" value="0" class="quantity-field border-0 text-center w-25" name="DiffFruit2" id="DiffFruit2" onInput="addFood();" value="0" readonly>
                                                                                                        <input type="button" value="+" class="button-plus border rounded-circle icon-shape icon-sm " data-field="DiffFruit2" id="incremFruit2">
                                                                                                </div>
                                                                                        </div>

                                                                                </div>

                                                                                <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                                                                        <div class="col-md-4">
                                                                                                <label for="DiffRice1" class="form-label">นม</label>
                                                                                        </div>

                                                                                        <div class="col-md-5">
                                                                                                <div class="input-group w-auto justify-content-end align-items-center">
                                                                                                        <input type="button" value="-" class="button-minus border rounded-circle  icon-shape icon-sm mx-1 " data-field="DiffMilk2" id="decremMilk2">
                                                                                                        <input type="text" step="1" max="10" value="0" class="quantity-field border-0 text-center w-25" name="DiffMilk2" id="DiffMilk2" onInput="addFood();" value="0" readonly>
                                                                                                        <input type="button" value="+" class="button-plus border rounded-circle icon-shape icon-sm " data-field="DiffMilk2" id="incremMilk2">
                                                                                                </div>
                                                                                        </div>

                                                                                </div>
                                                                                <div class="d-grid gap-2">
                                                                                        <div class="circle" style="display: flex;flex-wrap: nowrap;justify-content: center;">
                                                                                                <div class="half-circle">
                                                                                                        <img id="scream" width="350px" height="100%" src="https://ichef.bbci.co.uk/news/640/cpsprodpb/0E1B/production/_113111630_fruitandveg.jpg" alt="The Scream" style="object-fit: cover;">

                                                                                                </div>
                                                                                                <div class="half-circle-right">
                                                                                                        <div id="middleTop">
                                                                                                                <div id="box">
                                                                                                                        <div class="circle-top2">

                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                        <div id="middleBottom">
                                                                                                                <div id="box">
                                                                                                                        <div class="circle-bottom2">


                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>

                                                                                        <div class="d-flex justify-content-start">
                                                                                                <div class="me-auto ps-3 bd-highlight">
                                                                                                        <div class="Fruit2">

                                                                                                        </div>
                                                                                                </div>
                                                                                                <div class="pe-3 bd-highlight">
                                                                                                        <div class="Milk2">

                                                                                                        </div>
                                                                                                </div>



                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>

                                </div>
                        </section><!-- End Hero -->

                        <!-- ======= Hero Section 3 มืื้อเย็น ======= -->
                        <section id="hero" class="hero align-items-center">
                                <div class="container">
                                        <div class="row">
                                                <div class="card7 text-center">

                                                        <br>
                                                        <h1>Step 3 : มื้อเย็น</h1>

                                                        <div class="card-body">
                                                                <div class="card7-content">
                                                                        <div class="d-grid gap-4">
                                                                                <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                                                                        <div class="col-md-4">
                                                                                                <label for="DiffRice1" class="form-label">ข้าว/แป้ง</label>
                                                                                        </div>
                                                                                        <div class="col-md-5">
                                                                                                <div class="input-group w-auto justify-content-end align-items-center">
                                                                                                        <input type="button" value="-" class="button-minus border rounded-circle  icon-shape icon-sm mx-1 " data-field="DiffRice3" id="decremR3">
                                                                                                        <input type="text" step="1" max="10" value="0" class="quantity-field border-0 text-center w-25" name="DiffRice3" id="DiffRice3" onInput="addFood();" value="0" readonly>
                                                                                                        <input type="button" value="+" class="button-plus border rounded-circle icon-shape icon-sm " data-field="DiffRice3" id="incremR3">
                                                                                                </div>
                                                                                        </div>



                                                                                </div>
                                                                                <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                                                                        <div class="col-md-4">
                                                                                                <label for="DiffRice1" class="form-label">เนื้อสัตว์</label>
                                                                                        </div>

                                                                                        <div class="col-md-5">
                                                                                                <div class="input-group w-auto justify-content-end align-items-center">
                                                                                                        <input type="button" value="-" class="button-minus border rounded-circle  icon-shape icon-sm mx-1 " data-field="DiffMeet3" id="decremM3">
                                                                                                        <input type="text" step="1" max="10" value="0" class="quantity-field border-0 text-center w-25" name="DiffMeet3" id="DiffMeet3" onInput="addFood();" value="0" readonly>
                                                                                                        <input type="button" value="+" class="button-plus border rounded-circle icon-shape icon-sm " data-field="DiffMeet3" id="incremM3">
                                                                                                </div>
                                                                                        </div>

                                                                                </div>

                                                                                <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                                                                        <div class="col-md-4">
                                                                                                <label for="DiffRice1" class="form-label">ผลไม้</label>
                                                                                        </div>

                                                                                        <div class="col-md-5">
                                                                                                <div class="input-group w-auto justify-content-end align-items-center">
                                                                                                        <input type="button" value="-" class="button-minus border rounded-circle  icon-shape icon-sm mx-1 " data-field="DiffFruit3" id="decremFruit3">
                                                                                                        <input type="text" step="1" max="10" value="0" class="quantity-field border-0 text-center w-25" name="DiffFruit3" id="DiffFruit3" onInput="addFood();" value="0" readonly>
                                                                                                        <input type="button" value="+" class="button-plus border rounded-circle icon-shape icon-sm " data-field="DiffFruit3" id="incremFruit3">
                                                                                                </div>
                                                                                        </div>

                                                                                </div>

                                                                                <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                                                                        <div class="col-md-4">
                                                                                                <label for="DiffRice1" class="form-label">นม</label>
                                                                                        </div>

                                                                                        <div class="col-md-5">
                                                                                                <div class="input-group w-auto justify-content-end align-items-center">
                                                                                                        <input type="button" value="-" class="button-minus border rounded-circle  icon-shape icon-sm mx-1 " data-field="DiffMilk3" id="decremMilk3">
                                                                                                        <input type="text" step="1" max="10" value="0" class="quantity-field border-0 text-center w-25" name="DiffMilk3" id="DiffMilk3" onInput="addFood();" value="0" readonly>
                                                                                                        <input type="button" value="+" class="button-plus border rounded-circle icon-shape icon-sm " data-field="DiffMilk3" id="incremMilk3">
                                                                                                </div>
                                                                                        </div>

                                                                                </div>
                                                                                <div class="d-grid gap-2">
                                                                                        <div class="circle" style="display: flex;flex-wrap: nowrap;justify-content: center;">
                                                                                                <div class="half-circle">
                                                                                                        <img id="scream" width="350px" height="100%" src="https://ichef.bbci.co.uk/news/640/cpsprodpb/0E1B/production/_113111630_fruitandveg.jpg" alt="The Scream" style="object-fit: cover;">

                                                                                                </div>
                                                                                                <div class="half-circle-right">
                                                                                                        <div id="middleTop">
                                                                                                                <div id="box">
                                                                                                                        <div class="circle-top3">

                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                        <div id="middleBottom">
                                                                                                                <div id="box">
                                                                                                                        <div class="circle-bottom3">


                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>

                                                                                        <div class="d-flex justify-content-start">
                                                                                                <div class="me-auto ps-3 bd-highlight">
                                                                                                        <div class="Fruit3">

                                                                                                        </div>
                                                                                                </div>
                                                                                                <div class="pe-3 bd-highlight">
                                                                                                        <div class="Milk3">

                                                                                                        </div>
                                                                                                </div>



                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>

                                </div>
                                <br>
                                <div class="foot">
                                        <center>
                                                <div class="d-flex justify-content-center">
                                                        <div class="col-12 mx-auto">
                                                                <button class="btn btn-primary btn-lg" type="submit">บันทึกสัดส่วนอาหาร <i class="bi bi-arrow-right-circle-fill"></i></button>
                                                        </div>
                                                </div>
                                        </center>
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

                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                <!-- Template Main JS File -->

                <script src="assets/js/main.js"></script>

                <script>

                </script>


        </body>

        </html>
<?php } ?>