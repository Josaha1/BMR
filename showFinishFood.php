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
                        <li class="dropdown"><a class="nav-link scrollto active" href="showMyDetail.php"><span>หน้าหลัก</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                                <li><a href="showMyDetail.php">ผลสรุปของผู้ใช้งาน</a></li>
                            </ul>
                        <li><a class="nav-link" href="index.php">คำนวนพลังงาน</a></li>
                        <li class="dropdown"><a href="showFoodDesign.php"><span>อาหารแนะนำ</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="showFoodDesign.php">ออกแบบอาหาร</a></li>
                                <li><a href="showFinishFood.php">ปริมาณอาหารต่อวัน</a></li>
                                <li><a href="carorie.php">ค้นหาอาหาร</a></li>
                            </ul>
                        </li>
                        <li><a class="nav-link" href="logout.php">ออกจากระบบ</a></li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->

            </div>
        </header><!-- End Header -->
        <!-- ======= Hero Section 1 มื้อเช้า ======= -->
        <div id="printable">
            <?php
            foreach ($db->to_Obj($sql) as $rows) {
            ?>
                <section id="hero" class="hero align-items-center">
                    <div class="container">
                        <a href="carorie.php"><button class="btn btn-primary" style="width:100%;border-radius:30px;margin-top:10px;margin-bottom:15px;font-size:20px;">เพิ่มปริมาณพลังงานที่ต้องการในแต่ละวัน</button></a>
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
                                                    <label for="DiffRice1" class="form-label">ข้าว/แป้ง </label>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="input-group w-auto justify-content-end align-items-center">

                                                        <input type="text" step="1" max="10" value="<?php echo ($rows['Rice1']); ?>" class="quantity-field border-0 text-center w-50" name="DiffRice1" id="DiffRice1" onInput="addFood();"  readonly>

                                                    </div>
                                                </div>



                                            </div>
                                            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                                <div class="col-md-4">
                                                    <label for="DiffRice1" class="form-label">เนื้อสัตว์</label>
                                                </div>

                                                <div class="col-md-7">
                                                    <div class="input-group w-auto justify-content-end align-items-center">

                                                        <input type="text" step="1" max="10" value="<?php echo ($rows['Meet1']); ?>" class="quantity-field border-0 text-center w-50" name="DiffMeet1" id="DiffMeet1" onInput="addFood();"  readonly>

                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                                <div class="col-md-4">
                                                    <label for="DiffRice1" class="form-label">ผลไม้</label>
                                                </div>

                                                <div class="col-md-7">
                                                    <div class="input-group w-auto justify-content-end align-items-center">

                                                        <input type="text" step="1" max="10" value="<?php echo ($rows['Fruit1']); ?>" class="quantity-field border-0 text-center w-50" name="DiffFruit1" id="DiffFriut1" onInput="addFood();" value="0" readonly>

                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                                <div class="col-md-4">
                                                    <label for="DiffRice1" class="form-label">นม</label>
                                                </div>

                                                <div class="col-md-7">
                                                    <div class="input-group w-auto justify-content-end align-items-center">

                                                        <input type="text" step="1" max="10" value="<?php echo ($rows['Milk1']); ?>" class="quantity-field border-0 text-center w-50" name="DiffMilk1" id="DiffMilk1" onInput="addFood();" value="0" readonly>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                                <div class="col-md-4">
                                                    <label for="DiffRice1" class="form-label">ผัก</label>
                                                </div>

                                                <div class="col-md-7">
                                                    <div class="input-group w-auto justify-content-end align-items-center">

                                                        <input type="text"  value="ครึ่งจาน" class="quantity-field border-0 text-center w-50" name="DiffMilk3" id="DiffMilk3" onInput="addFood();" value="0" readonly>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="d-grid gap-2">
                                                <div class="circle" style="display: flex;flex-wrap: nowrap;justify-content: center;">
                                                    <div class="half-circle">


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
                                                <div class="col-md-7">
                                                    <div class="input-group w-auto justify-content-end align-items-center">

                                                        <input type="text" step="1" max="10" value="<?php echo ($rows['Rice2']); ?>" class="quantity-field border-0 text-center w-50" name="DiffRice2" id="DiffRice2" onInput="addFood();" value="0" readonly>

                                                    </div>
                                                </div>



                                            </div>
                                            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                                <div class="col-md-4">
                                                    <label for="DiffRice1" class="form-label">เนื้อสัตว์</label>
                                                </div>

                                                <div class="col-md-7">
                                                    <div class="input-group w-auto justify-content-end align-items-center">

                                                        <input type="text" step="1" max="10" value="<?php echo ($rows['Meet2']); ?>" class="quantity-field border-0 text-center w-50" name="DiffMeet2" id="DiffMeet2" onInput="addFood();" value="0" readonly>

                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                                <div class="col-md-4">
                                                    <label for="DiffRice1" class="form-label">ผลไม้</label>
                                                </div>

                                                <div class="col-md-7">
                                                    <div class="input-group w-auto justify-content-end align-items-center">

                                                        <input type="text" step="1" max="10" value="<?php echo ($rows['Fruit2']); ?>" class="quantity-field border-0 text-center w-50" name="DiffFruit2" id="DiffFruit2" onInput="addFood();" value="0" readonly>

                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                                <div class="col-md-4">
                                                    <label for="DiffRice1" class="form-label">นม</label>
                                                </div>

                                                <div class="col-md-7">
                                                    <div class="input-group w-auto justify-content-end align-items-center">

                                                        <input type="text" step="1" max="10" value="<?php echo ($rows['Milk2']); ?>" class="quantity-field border-0 text-center w-50" name="DiffMilk2" id="DiffMilk2" onInput="addFood();" value="0" readonly>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                                <div class="col-md-4">
                                                    <label for="DiffRice1" class="form-label">ผัก</label>
                                                </div>

                                                <div class="col-md-7">
                                                    <div class="input-group w-auto justify-content-end align-items-center">

                                                        <input type="text" step="1" max="10" value="ครึ่งจาน" class="quantity-field border-0 text-center w-50" name="DiffMilk3" id="DiffMilk3" onInput="addFood();" value="0" readonly>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="d-grid gap-2">
                                                <div class="circle" style="display: flex;flex-wrap: nowrap;justify-content: center;">
                                                    <div class="half-circle">


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
                                                <div class="col-md-7">
                                                    <div class="input-group w-auto justify-content-end align-items-center">

                                                        <input type="text" step="1" max="10" value="<?php echo ($rows['Rice3']); ?>" class="quantity-field border-0 text-center w-50" name="DiffRice3" id="DiffRice3" onInput="addFood();" value="0" readonly>

                                                    </div>
                                                </div>



                                            </div>
                                            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                                <div class="col-md-4">
                                                    <label for="DiffRice1" class="form-label">เนื้อสัตว์</label>
                                                </div>

                                                <div class="col-md-7">
                                                    <div class="input-group w-auto justify-content-end align-items-center">

                                                        <input type="text" step="1" max="10" value="<?php echo ($rows['Meet3']); ?>" class="quantity-field border-0 text-center w-50" name="DiffMeet3" id="DiffMeet3" onInput="addFood();" value="0" readonly>

                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                                <div class="col-md-4">
                                                    <label for="DiffRice1" class="form-label">ผลไม้</label>
                                                </div>

                                                <div class="col-md-7">
                                                    <div class="input-group w-auto justify-content-end align-items-center">

                                                        <input type="text" step="1" max="10" value="<?php echo ($rows['Fruit3']); ?>" class="quantity-field border-0 text-center w-50" name="DiffFruit3" id="DiffFruit3" onInput="addFood();" value="0" readonly>

                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                                <div class="col-md-4">
                                                    <label for="DiffRice1" class="form-label">นม</label>
                                                </div>

                                                <div class="col-md-7">
                                                    <div class="input-group w-auto justify-content-end align-items-center">

                                                        <input type="text" step="1" max="10" value="<?php echo ($rows['Milk3']); ?>" class="quantity-field border-0 text-center w-50" name="DiffMilk3" id="DiffMilk3" onInput="addFood();" value="0" readonly>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                                <div class="col-md-4">
                                                    <label for="DiffRice1" class="form-label">ผัก</label>
                                                </div>

                                                <div class="col-md-7">
                                                    <div class="input-group w-auto justify-content-end align-items-center">

                                                        <input type="text" step="1" max="10" value="ครึ่งจาน" class="quantity-field border-0 text-center w-50" name="DiffMilk3" id="DiffMilk3" onInput="addFood();" value="0" readonly>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="d-grid gap-2">
                                                <div class="circle" style="display: flex;flex-wrap: nowrap;justify-content: center;">
                                                    <div class="half-circle">


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
                        <div id="non-printable">
                            <div class="foot">
                                <br>
                                <center>
                                    <div class="d-flex justify-content-center">
                                        <div class="col-12 mx-auto">

                                        </div>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                    <br>
                </section><!-- End Hero -->
            <?php } ?>
        </div>
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

    </body>

    </html>







<?php } ?>