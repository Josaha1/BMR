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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
    <!-- =======================================================
  * Template Name: FlexStart - v1.9.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <script type="text/javascript">
      function calcBMR() {
        var weight = parseFloat(document.bmrform.weight.value);
        var height = parseFloat(document.bmrform.height.value);
        var age = parseFloat(document.bmrform.age.value);
        //var bmr2 = parseFloat(document.bmrform.bmr2.value) ;
        var gender = parseFloat(document.bmrform.gender.value);
        if (gender == "1")
        //English-BMR = 66 + ( 6.23 x weight in pounds ) + ( 12.7 x height in inches ) - ( 6.8 x age in year )
        //Metric-BMR = 66 + ( 13.7 x weight in kilos ) + ( 5 x height in cm ) - ( 6.8 x age in years )
        {
          var bmr = (66 + (13.7 * weight) + (5 * height) - (6.8 * age));
          //var plan = (66 + (13.7 * weight) + (5 * height) - (6.8 * age)) * bmr2;
        }

        if (gender == "2")
        //English-Women: BMR = 655 + ( 4.35 x weight in pounds ) + ( 4.7 x height in inches ) - ( 4.7 x age in years)
        //Women: BMR = 655 + ( 9.6 x weight in kilos ) + ( 1.8 x height in cm ) - ( 4.7 x age in years )
        {
          var bmr = (665 + (9.6 * weight) + (1.8 * height) - (4.7 * age));
          //var plan = (665 + (9.6 * weight) + (1.8 * height) - (4.7 * age)) * bmr2;
        }
        document.bmrform.bmr.value = Math.round(bmr);
        //document.bmrform.plan.value = Math.round(plan * 100)/100.0;  
      }

      function calcTDEE() {
        var weight = parseFloat(document.bmrform.weight.value);
        var height = parseFloat(document.bmrform.height.value);
        var age = parseFloat(document.bmrform.age.value);
        var bmr2 = parseFloat(document.bmrform.bmr2.value);
        var gender = parseFloat(document.bmrform.gender.value);
        if (gender == "1")
        //English-BMR = 66 + ( 6.23 x weight in pounds ) + ( 12.7 x height in inches ) - ( 6.8 x age in year )
        //Metric-BMR = 66 + ( 13.7 x weight in kilos ) + ( 5 x height in cm ) - ( 6.8 x age in years )
        {
          var bmr = (66 + (13.7 * weight) + (5 * height) - (6.8 * age));
          var plan = (66 + (13.7 * weight) + (5 * height) - (6.8 * age)) * bmr2;
        } else if (gender == "2")
        //English-Women: BMR = 655 + ( 4.35 x weight in pounds ) + ( 4.7 x height in inches ) - ( 4.7 x age in years)
        //Women: BMR = 655 + ( 9.6 x weight in kilos ) + ( 1.8 x height in cm ) - ( 4.7 x age in years )
        {
          var bmr = (665 + (9.6 * weight) + (1.8 * height) - (4.7 * age));
          var plan = (665 + (9.6 * weight) + (1.8 * height) - (4.7 * age)) * bmr2;
        }
        //document.bmrform.bmr.value = Math.round(bmr * 100)/100.0;
        document.bmrform.plan.value = Math.round(plan);
      }

      function calDift() {
        var weight = parseFloat(document.bmrform.weight.value);
        var height = parseFloat(document.bmrform.height.value);
        var age = parseFloat(document.bmrform.age.value);
        var bmr2 = parseFloat(document.bmrform.bmr2.value);
        var gender = parseFloat(document.bmrform.gender.value);
        var Futureweight = parseFloat(document.bmrform.Futureweight.value);
        var FixDay = parseFloat(document.bmrform.FixDay.value);
        if (gender == "1")
        //English-BMR = 66 + ( 6.23 x weight in pounds ) + ( 12.7 x height in inches ) - ( 6.8 x age in year )
        //Metric-BMR = 66 + ( 13.7 x weight in kilos ) + ( 5 x height in cm ) - ( 6.8 x age in years )
        {
          var bmr = (66 + (13.7 * weight) + (5 * height) - (6.8 * age));
          var plan = (66 + (13.7 * weight) + (5 * height) - (6.8 * age)) * bmr2;
          var KcalPerDay = 500;
          var Fixweek = 7;
          var DayPerWeek = Fixweek / FixDay;
          var KcalTarget = (weight - Futureweight) / 0.5;
          var DiffKcal = (KcalTarget) * (KcalPerDay * DayPerWeek);
          var RecommendKcal = plan - DiffKcal;

        } else if (gender == "2")
        //English-Women: BMR = 655 + ( 4.35 x weight in pounds ) + ( 4.7 x height in inches ) - ( 4.7 x age in years)
        //Women: BMR = 655 + ( 9.6 x weight in kilos ) + ( 1.8 x height in cm ) - ( 4.7 x age in years )
        {
          var bmr = (66 + (13.7 * weight) + (5 * height) - (6.8 * age));
          var plan = (66 + (13.7 * weight) + (5 * height) - (6.8 * age)) * bmr2;
          var KcalPerDay = 500;
          var Fixweek = 7;
          var DayPerWeek = Fixweek / FixDay;
          var KcalTarget = (weight - Futureweight) / 0.5;
          var DiffKcal = (KcalTarget) * (KcalPerDay * DayPerWeek);
          var RecommendKcal = plan - DiffKcal;
        }
        //document.bmrform.bmr.value = Math.round(bmr * 100)/100.0;
        document.bmrform.DiffKcal.value = Math.round(DiffKcal);
        document.bmrform.RecommendKcal.value = Math.round(RecommendKcal);
      }
    </script>
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
  </head>

  <body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
      <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="index.php" class="logo d-flex align-items-center">
          <img src="assets/img/logo.png" alt="">
          <span>BMR Calculator</span>
        </a>

        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="#hero">หน้าหลัก</a></li>
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
    <section id="hero" class="hero d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="card1">
            <div class="card1 text-center">
              <div class="card1-header">
                <h1>Step 1 : BMR</h1>
                <p>BMR ย่อมาจาก Basal Metabolic Rate คือ จำนวนแคลอรี่พื้นฐานของแต่ละคนที่ร่างกายต้องใช้ในแต่ละวันโดยปราศจากการทำกิจกรรมใดๆ</p>
              </div>
              <div class="card-body">

                <div class="app-paper">
                  <form class="mb-3" name="bmrform" action="update.php" method="post">

                    <input type="radio" name="gender" id="1" class="hidebx" value="1" style="">
                    <label for="1" class="lbl-radio">
                      <div class="display-box">
                        <div class="size"> <i class="fas fa-male" style="font-size: 40px;"></i><br>ผู้ชาย</div>
                      </div>
                    </label>
                    <input type="radio" name="gender" id="2" class="hidebx" value="2" style="">
                    <label for="2" class="lbl-radio">
                      <div class="display-box">
                        <div class="size"><i class="fas fa-female" style="font-size: 40px;"></i><br>ผู้หญิง</div>
                      </div>
                    </label>
                </div>
                <div class="card1-content">
                  <div class="content">
                    <div class="mb-3 row">
                      <label for="weight" class="col-sm-4 col-form-label">น้ำหนัก/กิโลกรัม</label>
                      <div class="col-sm-6">
                        <input type="number" step="0.1" class="form-control" id="weight" name="weight">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="height" class="col-sm-4 col-form-label">ส่วนสูง/เซนติเมตร</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="height" name="height">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="age" class="col-sm-4 col-form-label">อายุ</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="age" name="age">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-center">
                  <div class="col-12 mx-auto">
                    <button type="button" class="btn btn-secondary btn-lg" onClick="calcBMR();" id="calc">คำนวน</button>
                  </div>
                </div>
                <div class="d-flex justify-content-center">
                  <div class="content2">
                    <div class="form-control" style="">
                      <label for="bmr">BMR ของคุณ คือ</label>
                      <input class="form-control" type="number" value="" size="20" placeholder="" name="bmr" id="bmr" readonly>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

    </section><!-- End Hero -->

    <!-- ======= Two Section ======= -->
    <section id="values" class="hero d-flex align-items-center">

      <div class="container">
        <div class="row">
          <div class="card2 text-center">
            <div class="card2-header">
              <h1>Step 2 : TDEE</h1>
              <p>TDEE คือ Total Daily Energy Expenditure คือ จำนวนแคลอรี่ทั้งหมดของแต่ละคน ที่ร่างกายต้องใช้ในแต่ละวัน (ขึ้นอยู่กับปริมาณกิจกรรมที่ต้องทำในแต่ละวัน)</p>
            </div>
            <div class="card-body">

              <div class="app-paper2">

                <input type="radio" name="bmr2" id="3" class="hidebx" value="1.2" style="">
                <label for="3" class="lbl-radio">
                  <div class="display-box">
                    <div class="size">ไม่ออกกำลังกายหรือออกกำลังกายน้อยมาก</div>
                  </div>
                </label>
                <input type="radio" name="bmr2" id="4" class="hidebx" value="1.375" style="">
                <label for="4" class="lbl-radio">
                  <div class="display-box">
                    <div class="size">ออกกำลังกายน้อยเล่นกีฬา 1-3 วัน/สัปดาห์</div>
                  </div>
                </label>
                <input type="radio" name="bmr2" id="5" class="hidebx" value="1.55" style="">
                <label for="5" class="lbl-radio">
                  <div class="display-box">
                    <div class="size">ออกกำลังกายปานกลางเล่นกีฬา 3-5 วัน/สัปดาห์</div>
                  </div>
                </label>
                <input type="radio" name="bmr2" id="6" class="hidebx" value="1.725" style="">
                <label for="6" class="lbl-radio">
                  <div class="display-box">
                    <div class="size">ออกกำลังกายหนักเล่นกีฬา 6-7 วัน/สัปดาห์</div>
                  </div>
                </label>
                <input type="radio" name="bmr2" id="7" class="hidebx" value="1.9" style="">
                <label for="7" class="lbl-radio">
                  <div class="display-box">
                    <div class="size">ออกกำลังกายหนักมากเป็นนักกีฬา</div>
                  </div>
                </label>
              </div>

              <div class="d-flex justify-content-center">
                <div class="col-12 mx-auto">
                  <button type="button" class="btn btn-secondary btn-lg" onClick="calcTDEE();" id="calc">คำนวน</button>
                </div>
              </div>
              <div class="d-flex justify-content-center">
                <div class="content2">
                  <div class="form-control" style="">
                    <label for="plan">TDEE ของคุณคือ</label>
                    <input class="form-control" type="number" value="" size="20" placeholder="" name="plan" id="plan" readonly>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
    </section><!-- End Two -->

    <!-- ======= Hero Section ======= -->
    <section id="counts" class="hero d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="card3 text-center">
            <div class="card3-header">
              <br>
              <h2>Step 3 : จำนวนแคลอรี่ในแต่ละวันเพื่อให้ได้น้ำหนักตามเป้าหมาย</h2>
              <p>โดยปกติถ้าเราได้รับพลังงานจากการรับประทานอาหารปริมาณลดลง ประมาณ 500 กิโลแคลอรี่ เมื่อเทียบกับค่า TDEE ต่อวัน น้ำหนักตัวจะลดลง 0.425 กิโลกรัมต่อสัปดาห์ อย่างไรก็ตามเราไม่ควรลดน้ำหนักตัวเร็วเกินไปซึ่งจะมีผลเสียต่อร่างกาย <br><b>ข้อแนะนำ</b> เมื่อเราต้องการลดน้ำหนักตัว คือ รับประทานอาหารปริมาณลดลง <b>300-500</b> กิโลแคลอรี่ต่อวัน เมื่อเทียบกับ TDEE </p>
            </div>
            <div class="card-body">
              <div class="card3-content">
                <div class="content">
                  <div class="mb-3 row">
                    <label for="Futureweight" class="col-sm-4 col-form-label">เป้าหมายน้ำหนักที่ต้องการ (กิโลกรัม)</label>
                    <div class="col-sm-6">
                      <input type="number" step="0.1" class="form-control" id="Futureweight" name="Futureweight">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="FixDay" class="col-sm-4 col-form-label">จำนวนวัน</label>
                    <div class="col-sm-6">
                      <input type="number" class="form-control" id="FixDay" name="FixDay">
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-flex justify-content-center">
                <div class="col-12 mx-auto">
                  <button type="button" class="btn btn-secondary btn-lg" onClick="calDift();" id="calc">คำนวน</button>
                </div>
              </div>
              <div class="d-flex justify-content-center">
                <div class="content2">
                  <div class="form-control" style="">
                    <label for="DiffKcal">ปริมาณพลังงานที่ต้องลดต่อวัน (kcal)</label>
                    <input class="form-control" type="number" value="" size="60" name="DiffKcal" id="DiffKcal" readonly>
                  </div>
                </div>
              </div>
              <div class="d-flex justify-content-center">
                <div class="content2">
                  <div class="form-control" style="">
                    <label for="RecommendKcal">ปริมาณพลังงานที่แนะนำต่อวัน (kcal)</label>
                    <input class="form-control" type="number" value="" size="20" name="RecommendKcal" id="RecommendKcal" readonly>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

    </section><!-- End Hero -->

    <!-- ======= Hero Section ======= -->
    <section id="values" class="hero align-items-center">
      <div class="container">
        <div class="row">
          <div class="card4 text-center">
            <div class="card4-header">
              <br>
              <h1>Step 4 : ท่านดื่มนมหรือไม่</h1>

            </div>
            <div class="card-body">
              <div class="app-paper2">

                <input type="radio" name="DrinkMike" id="8" class="hidebx" value="0" style="">
                <label for="8" class="lbl-radio">
                  <div class="display-box">
                    <div class="size">ไม่ดื่มนมเลย</div>
                  </div>
                </label>
                <input type="radio" name="DrinkMike" id="9" class="hidebx" value="1" style="">
                <label for="9" class="lbl-radio">
                  <div class="display-box">
                    <div class="size">ดื่มวันละ 1 แก้ว</div>
                  </div>
                </label>
                <input type="radio" name="DrinkMike" id="10" class="hidebx" value="2" style="">
                <label for="10" class="lbl-radio">
                  <div class="display-box">
                    <div class="size">ดื่มวันละ 2 แก้ว</div>
                  </div>
                </label>
              </div>

            </div>
          </div>
        </div>
        <br>
        <div class="foot">
          <center>
            <div class="d-flex justify-content-center">
              <div class="col-12 mx-auto">
                <button class="btn btn-primary btn-lg" type="submit">ไปคำนวนพลังงานอาหาร <i class="bi bi-arrow-right-circle-fill"></i></button>
              </div>
            </div>
          </center>
        </div>
    </section><!-- End Hero -->


    </form>
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

  </body>

  </html>
<?php } ?>