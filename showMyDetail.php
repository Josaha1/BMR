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
    $sql = "SELECT bmrcal.RegisId,predmregis.Cid, predmregis.FName, predmregis.LName, predmregis.sex,bmrcal.weight,bmrcal.height,bmrcal.age,bmrcal.bmr2,bmrcal.bmr,bmrcal.plan,bmrcal.Futureweight,bmrcal.FixDay,bmrcal.RecommendKcal,bmrcal.DrinkMike FROM `predmregis` INNER JOIN bmrcal ON predmregis.Cid = bmrcal.Cid WHERE `predmregis`.`Cid` = '$Cid' ORDER BY `bmrcal`.`RegisId` DESC LIMIT 1 ";
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
        <link href="assets/css/showdetail.css" rel="stylesheet">
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
                    <div class="d-flex justify-content-center">
                        <div class="card">
                            <div class="card1-body">
                                <p class="card1-text">ชื่อ <?php echo ($rows['FName']); ?> <?php echo ($rows['LName']); ?></p>
                            </div>
                        </div>

                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="card">
                            <div class="card2-body">
                                <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                    <div class="col-md-4">
                                        เลขบัตรประชาชน
                                    </div>
                                    <div class="col-md-8">
                                        <p class="card2-text"> <?php echo ($rows['Cid']); ?></p>
                                    </div>
                                </div>
                                <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                    <div class="col-md-4">
                                        เพศ
                                    </div>
                                    <div class="col-md-8">
                                        <p class="card2-text"> <?php echo ($rows['sex']); ?></p>
                                    </div>
                                </div>
                                <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                    <div class="col-md-4">
                                        อายุ
                                    </div>
                                    <div class="col-md-8">
                                        <p class="card2-text"> <?php echo ($rows['age']); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="card">
                            <div class="card2-body">
                                <div class="row row-cols-2">
                                    <div class="col-md-8">
                                        น้ำหนัก
                                    </div>
                                    <div class="col-md-4">
                                        <p class="card2-text"> <?php echo ($rows['weight']); ?>&nbsp;&nbsp; กิโลกรัม</p>
                                    </div>
                                    
                                </div>
                                <div class="row row-cols-2 ">
                                    <div class="col-md-8">
                                        ส่วนสูง
                                    </div>
                                    <div class="col-md-4">
                                        <p class="card2-text"> <?php echo ($rows['height']); ?>&nbsp;&nbsp; เซนติเมตร</p>
                                    </div>
                                   
                                    
                                </div>
                                <div class="row row-cols-2">
                                    <div class="col-md-8">
                                        การดื่มนม
                                    </div>
                                    <div class="col-md-4">
                                        <?php if ($rows['DrinkMike'] == "0") { ?>
                                            <p class="card2-text">ไม่ดื่มนม</p>
                                        <?php } elseif ($rows['DrinkMike'] == "1") { ?>
                                            <p class="card2-text">ดื่มนม 1 แก้ว</p>
                                        <?php } elseif ($rows['DrinkMike'] == "2") { ?>
                                            <p class="card2-text">ดื่มนม 2 แก้ว</p>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="row row-cols-2 ">
                                    <div class="col-md-8">
                                        BMR :
                                    </div>
                                    <div class="col-md-4">
                                        <p class="card2-text"> <?php echo ($rows['bmr']); ?>&nbsp;&nbsp; กิโลแคลอรี่</p>
                                    </div>
                                    
                                </div>
                                <div class="row row-cols-2">
                                    <div class="col-md-8">
                                        กิจกรรมที่ทำ :
                                    </div>
                                    <div class="col-md-4">
                                        <?php if ($rows['bmr2'] == "1.2") { ?>
                                            <p class="card2-text">ไม่ออกกำลังกายหรือออกกำลังกายน้อยมาก</p>
                                        <?php } elseif ($rows['bmr2'] == "1.375") { ?>
                                            <p class="card2-text">ออกกำลังกายน้อยเล่นกีฬา 1-3 วัน/สัปดาห์</p>
                                        <?php } elseif ($rows['bmr2'] == "1.55") { ?>
                                            <p class="card2-text">ออกกำลังกายปานกลางเล่นกีฬา 3-5 วัน/สัปดาห์</p>
                                        <?php } elseif ($rows['bmr2'] == "1.725") { ?>
                                            <p class="card2-text">ออกกำลังกายหนักเล่นกีฬา 6-7 วัน/สัปดาห์</p>
                                        <?php } elseif ($rows['bmr2'] == "1.9") { ?>
                                            <p class="card2-text">ออกกำลังกายหนักมากเป็นนักกีฬา</p>
                                        <?php } ?>
                                    </div>

                                </div>
                                <div class="row row-cols-2">
                                    <div class="col-md-8">
                                        TDEE :
                                    </div>
                                    <div class="col-md-4">
                                        <p class="card2-text"> <?php echo ($rows['plan']); ?>&nbsp;&nbsp;  กิโลแคลอรี่</p>
                                    </div>
                                   
                                </div>
                                <div class="row row-cols-2">
                                    <div class="col-md-8">
                                        น้ำหนักที่ต้องการลด
                                    </div>
                                    <div class="col-md-4">
                                        <p class="card2-text"> <?php echo ($rows['Futureweight']); ?>&nbsp;&nbsp;  กิโลกรัม</p>
                                    </div>
                                    
                                </div>
                                <div class="row row-cols-2">
                                    <div class="col-md-8">
                                        จำนวนวันที่กำหนด
                                    </div>
                                    <div class="col-md-4">
                                        <p class="card2-text"> <?php echo ($rows['FixDay']); ?> วัน</p>
                                    </div>
                                   
                                </div>
                                <div class="row row-cols-2">
                                    <div class="col-md-8">
                                        พลังงานที่แนะนำ
                                    </div>
                                    <div class="col-md-4">
                                        <p class="card2-text"> <?php echo ($rows['RecommendKcal']); ?>&nbsp;&nbsp; กิโลแคลอรี่</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

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