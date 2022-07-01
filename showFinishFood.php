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
        <section id="" class="">


            <div class="container">
                <div class="d-flex justify-content-center">
                    <div class="row row-cols-12 row-cols-lg-12 g-2 g-lg-3">
                        <?php
                        foreach ($db->to_Obj($sql) as $rows) {
                        ?>
                             <section >
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
                         <section >
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
                        <?php } ?>
                    </div>
                </div>

            </div>
        </section>
    </body>

    </html>







<?php } ?>