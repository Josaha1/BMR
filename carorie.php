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
    $sql = "SELECT * FROM `food` WHERE `Catagorie` = '1'";
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


        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Template Main CSS File -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/FoodDesign.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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
                                <li><a href="#">ค้นหาอาหาร</a></li>
                            </ul>
                        </li>
                        <li><a class="nav-link" href="logout.php">ออกจากระบบ</a></li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->

            </div>
        </header><!-- End Header -->
        <!-- ======= Hero Section 1 มื้อเช้า ======= -->
        <div class="ReCal">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <div class="card">
                        <div class="card1-body">
                            <div class="RecomCal">
                                <form id="FoodRecom" name="FoodRecom" action="assets/assesment/caroriesSend.php" method="POST">
                                    <label for="RecomCal" class="form-label">พลังงานที่ต้องการในแต่ละวัน</label>
                                    <?php
                                    $Cid = $_SESSION['Cid'];
                                    $sqlCal = "SELECT * FROM `bmrcal` WHERE `Cid` = '$Cid'  
                                    ORDER BY `bmrcal`.`RegisId`  DESC
                                    LIMIT 1";
                                    foreach ($db->to_Obj($sqlCal) as $rows) {
                                    ?>
                                        <div class="d-flex justify-content-center">
                                            <input type="text" class="form-control" id="" name="RecomCal" placeholder="พลังงานที่ต้องการในแต่ละวัน" value="<?php echo ($rows['RecommendKcal']) ?>" readonly>
                                        <?php } ?>
                                        </div>
                                        <div class="CalFood">
                                            <label for="total" class="form-label">พลังงานจากอาหารที่เลือกล่าสุด</label>
                                            <div class="d-flex justify-content-center">
                                                <?php
                                                $Cid = $_SESSION['Cid'];
                                                $sqlCal = "SELECT * FROM `bmrcal` WHERE `Cid` = '$Cid'  
                                    ORDER BY `bmrcal`.`RegisId`  DESC
                                    LIMIT 1";
                                                foreach ($db->to_Obj($sqlCal) as $rows) {
                                                ?>
                                                    <input type="text" class="form-control" id="total" name="total" value="<?php echo ($rows['CalForFood']); ?>" placeholder="พลังงานจากอาหารที่เลือก" readonly>
                                                <?php } ?>
                                            </div>
                                            <input type="text" class="form-control" id="FoodName" name="FoodName" placeholder="รายการอาหาร" value="" readonly>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <section id="hero" class="hero align-items-center">
                <div class="d-flex justify-content-center">
                    <div class="card">
                        <div class="card-body">
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                                <img src="assets/img/breakfasticon.png" style=""> อาหาร
                            </button>


                            <div>
                                <div class="collapse collapse-horizontal" id="collapseWidthExample">
                                    <br>
                                    <input type="text" class="form-control mb-3 p-3" placeholder="Search" id="search-input">
                                    <?php
                                    foreach ($db->to_Obj($sql) as $rows) {
                                    ?>
                                        <ul class="list-group list-group-flush text-primary h5">
                                            <li class="list-group-item">
                                                <div class="card card-body" style="width: 100%">
                                                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">


                                                        <input type="checkbox" class="btn-check" name="Food" id="btncheck<?php echo ($rows['FID']) ?>" autocomplete="off" value="<?php echo ($rows['KCal']) ?>">
                                                        <label class="btn btn-outline-primary" for="btncheck<?php echo ($rows['FID']) ?>">
                                                            <div class="row row-cols-2 row-cols-lg-2">
                                                                <div class="col">
                                                                    <div class="p-3"><?php echo ($rows['FoodName']) ?></div>
                                                                </div>

                                                                <div class="col">
                                                                    <div class="p-3"><?php echo ($rows['KCal']) ?> kcal</div>
                                                                </div>
                                                            </div>
                                                        </label>


                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    <?php } ?>

                                </div>
                            </div>
                            <div class="card2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample2" aria-expanded="false" aria-controls="collapseWidthExample">
                                    <img src="assets/img/fruiticon.png" style=""> ขนม / ผลไม้
                                </button>


                                <div>
                                    <div class="collapse collapse-horizontal" id="collapseWidthExample2">
                                        <br>
                                        <input type="text" class="form-control mb-3 p-3" placeholder="Search" id="search-input2">
                                        <?php
                                        $sql2 = "SELECT * FROM `food` WHERE `Catagorie` = '2'";
                                        foreach ($db->to_Obj($sql2) as $rows) {
                                        ?>
                                            <ul class="list-group list-group-flush text-primary h5">
                                                <li class="list-group-item2">
                                                    <div class="card card-body" style="width: 100%">
                                                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">


                                                            <input type="checkbox" class="btn-check" name="Food" id="btncheck<?php echo ($rows['FID']) ?>" autocomplete="off" value="<?php echo ($rows['KCal']) ?>">
                                                            <label class="btn btn-outline-primary" for="btncheck<?php echo ($rows['FID']) ?>">
                                                                <div class="row row-cols-2 row-cols-lg-2">
                                                                    <div class="col">
                                                                        <div class="p-3"><?php echo ($rows['FoodName']) ?></div>
                                                                    </div>

                                                                    <div class="col">
                                                                        <div class="p-3"><?php echo ($rows['KCal']) ?> kcal</div>
                                                                    </div>
                                                                </div>
                                                            </label>


                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>

                                        <?php } ?>

                                    </div>
                                </div>



                            </div>
                            <div class="card2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample3" aria-expanded="false" aria-controls="collapseWidthExample">
                                    <img src="assets/img/watericon.png" style=""> เครื่องดื่ม
                                </button>


                                <div>
                                    <div class="collapse collapse-horizontal" id="collapseWidthExample3">
                                    <br>
                                    <input type="text" class="form-control mb-3 p-3" placeholder="Search" id="search-input3">
                                        <?php
                                        $sql3 = "SELECT * FROM `food` WHERE `Catagorie` = '4'";
                                        foreach ($db->to_Obj($sql3) as $rows) {
                                        ?>
                                           <ul class="list-group list-group-flush text-primary h5">
                                                <li class="list-group-item3">
                                                    <div class="card card-body" style="width: 100%">
                                                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">


                                                            <input type="checkbox" class="btn-check" name="Food" id="btncheck<?php echo ($rows['FID']) ?>" autocomplete="off" value="<?php echo ($rows['KCal']) ?>">
                                                            <label class="btn btn-outline-primary" for="btncheck<?php echo ($rows['FID']) ?>">
                                                                <div class="row row-cols-2 row-cols-lg-2">
                                                                    <div class="col">
                                                                        <div class="p-3"><?php echo ($rows['FoodName']) ?></div>
                                                                    </div>

                                                                    <div class="col">
                                                                        <div class="p-3"><?php echo ($rows['KCal']) ?> kcal</div>
                                                                    </div>
                                                                </div>
                                                            </label>


                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        <?php } ?>

                                    </div>
                                </div>

                            </div>

                        </div>
                        <p>หมายเหตุ : ปริมาณอาหารเท่ากับ 1 จาน</p>
                    </div>
                </div>
                <div class="footButton">
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-success">บันทึก</button>
                    </div>
                    </form>
                </div>
            </section>
            <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>





        </div>
        <!-- Vendor JS Files -->


        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <!-- Template Main JS File -->

        <script src="assets/js/main.js"></script>
        <script>
            document.querySelector('#search-input').addEventListener('input', filterList);
            document.querySelector('#search-input2').addEventListener('input', filterList2);
            document.querySelector('#search-input3').addEventListener('input', filterList3);
            function filterList() {
                const searchInput = document.querySelector('#search-input');
                const filter = searchInput.value.toLowerCase();
                const listItems = document.querySelectorAll('.list-group-item');

                listItems.forEach((item) => {
                    let text = item.textContent
                    if (text.toLowerCase().includes(filter.toLowerCase())) {
                        item.style.display = '';
                    } else {
                        item.style.display = 'none';
                    }
                })
            }
            function filterList2() {
                const searchInput = document.querySelector('#search-input2');
                const filter = searchInput.value.toLowerCase();
                const listItems = document.querySelectorAll('.list-group-item2');

                listItems.forEach((item) => {
                    let text = item.textContent
                    if (text.toLowerCase().includes(filter.toLowerCase())) {
                        item.style.display = '';
                    } else {
                        item.style.display = 'none';
                    }
                })
            }
            function filterList3() {
                const searchInput = document.querySelector('#search-input3');
                const filter = searchInput.value.toLowerCase();
                const listItems = document.querySelectorAll('.list-group-item3');

                listItems.forEach((item) => {
                    let text = item.textContent
                    if (text.toLowerCase().includes(filter.toLowerCase())) {
                        item.style.display = '';
                    } else {
                        item.style.display = 'none';
                    }
                })
            }
            $('input:checkbox').change(function() {
                var RecomCal = document.FoodRecom.RecomCal.value;
                var total = 0;
               
                
                
                $('input:checkbox:checked').each(function() {
                    total += isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val());
                   
                });
          
                $("#total").val(total);
               
                if (total > RecomCal) {

                    Swal.fire({
                        icon: 'error',

                        text: 'พลังงานเกิน โปรดนำอาหารบางรายการออก!',

                    })
                }
            });
        </script>
    </body>

    </html>







<?php } ?>