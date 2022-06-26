<?php
ob_start(); 
session_start();
if (!$_SESSION["Cid"]){  //check session

  Header("Location: Login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

}else{ 
?>
<?php include("class_lib/db_conf.php"); ?>
<?php include("class_lib/database.php"); ?>
<?php $db=new Database(); ?>
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
  <!-- =======================================================
  * Template Name: FlexStart - v1.9.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <script type="text/javascript">
      
      function calcBMR()
      {
      var weight = parseFloat(document.bmrform.weight.value);
      var height = parseFloat(document.bmrform.height.value);
      var age = parseFloat(document.bmrform.age.value);
      //var bmr2 = parseFloat(document.bmrform.bmr2.value) ;
      var gender = parseFloat(document.bmrform.gender.value) ;
      if(gender=="1") 
      //English-BMR = 66 + ( 6.23 x weight in pounds ) + ( 12.7 x height in inches ) - ( 6.8 x age in year )
      //Metric-BMR = 66 + ( 13.7 x weight in kilos ) + ( 5 x height in cm ) - ( 6.8 x age in years )
          {
              var bmr = (66 + (13.7 * weight) + (5 * height) - (6.8 * age));
              //var plan = (66 + (13.7 * weight) + (5 * height) - (6.8 * age)) * bmr2;
          }
  
      if (gender=="2")
      //English-Women: BMR = 655 + ( 4.35 x weight in pounds ) + ( 4.7 x height in inches ) - ( 4.7 x age in years)
      //Women: BMR = 655 + ( 9.6 x weight in kilos ) + ( 1.8 x height in cm ) - ( 4.7 x age in years )
          {
              var bmr = (665 + (9.6 * weight) + (1.8 * height) - (4.7 * age));
              //var plan = (665 + (9.6 * weight) + (1.8 * height) - (4.7 * age)) * bmr2;
          }
      document.bmrform.bmr.value = Math.round(bmr);
      //document.bmrform.plan.value = Math.round(plan * 100)/100.0;  
          }
      function calcTDEE()
      {
      var weight = parseFloat(document.bmrform.weight.value);
      var height = parseFloat(document.bmrform.height.value);
      var age = parseFloat(document.bmrform.age.value);
      var bmr2 = parseFloat(document.bmrform.bmr2.value) ;
      var gender = parseFloat(document.bmrform.gender.value) ;
      if(gender=="1") 
      //English-BMR = 66 + ( 6.23 x weight in pounds ) + ( 12.7 x height in inches ) - ( 6.8 x age in year )
      //Metric-BMR = 66 + ( 13.7 x weight in kilos ) + ( 5 x height in cm ) - ( 6.8 x age in years )
          {
              var bmr = (66 + (13.7 * weight) + (5 * height) - (6.8 * age));
              var plan = (66 + (13.7 * weight) + (5 * height) - (6.8 * age)) * bmr2;
          }
  
      else if (gender=="2")
      //English-Women: BMR = 655 + ( 4.35 x weight in pounds ) + ( 4.7 x height in inches ) - ( 4.7 x age in years)
      //Women: BMR = 655 + ( 9.6 x weight in kilos ) + ( 1.8 x height in cm ) - ( 4.7 x age in years )
          {
              var bmr = (665 + (9.6 * weight) + (1.8 * height) - (4.7 * age));
              var plan = (665 + (9.6 * weight) + (1.8 * height) - (4.7 * age)) * bmr2;
          }
      //document.bmrform.bmr.value = Math.round(bmr * 100)/100.0;
      document.bmrform.plan.value = Math.round(plan);  
          }

          function calDift()
      {
      var weight = parseFloat(document.bmrform.weight.value);
      var height = parseFloat(document.bmrform.height.value);
      var age = parseFloat(document.bmrform.age.value);
      var bmr2 = parseFloat(document.bmrform.bmr2.value) ;
      var gender = parseFloat(document.bmrform.gender.value) ;
      var Futureweight = parseFloat(document.bmrform.Futureweight.value);
      var FixDay = parseFloat(document.bmrform.FixDay.value);
      if(gender=="1") 
      //English-BMR = 66 + ( 6.23 x weight in pounds ) + ( 12.7 x height in inches ) - ( 6.8 x age in year )
      //Metric-BMR = 66 + ( 13.7 x weight in kilos ) + ( 5 x height in cm ) - ( 6.8 x age in years )
          {
              var bmr = (66 + (13.7 * weight) + (5 * height) - (6.8 * age));
              var plan = (66 + (13.7 * weight) + (5 * height) - (6.8 * age)) * bmr2;
              var KcalPerDay = 500;
              var Fixweek = 7;
              var DayPerWeek = Fixweek/FixDay;
              var KcalTarget = (weight-Futureweight)/0.5;
              var DiffKcal = (KcalTarget)*(KcalPerDay*DayPerWeek);
              var RecommendKcal = plan-DiffKcal;
          
          }
  
      else if (gender=="2")
      //English-Women: BMR = 655 + ( 4.35 x weight in pounds ) + ( 4.7 x height in inches ) - ( 4.7 x age in years)
      //Women: BMR = 655 + ( 9.6 x weight in kilos ) + ( 1.8 x height in cm ) - ( 4.7 x age in years )
          {
            var bmr = (66 + (13.7 * weight) + (5 * height) - (6.8 * age));
              var plan = (66 + (13.7 * weight) + (5 * height) - (6.8 * age)) * bmr2;
              var KcalPerDay = 500;
              var Fixweek = 7;
              var DayPerWeek = Fixweek/FixDay;
              var KcalTarget = (weight-Futureweight)/0.5;
              var DiffKcal = (KcalTarget)*(KcalPerDay*DayPerWeek);
              var RecommendKcal = plan-DiffKcal;
          }
      //document.bmrform.bmr.value = Math.round(bmr * 100)/100.0;
      document.bmrform.DiffKcal.value = Math.round(DiffKcal);  
      document.bmrform.RecommendKcal.value = Math.round(RecommendKcal);
          }
  </script>

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
    <section id="hero" class="hero d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="card text-center">
            <div class="card-header">
            <h1>Step 1 : BMR</h1>
            <p>BMR ย่อมาจาก Basal Metabolic Rate หรือเราสามารถเรียกได้ว่าเป็นอัตราการเผาผลาญพลังงานในแต่ละวัน โดยค่าพลังงานนี้ร่างกายจะใช้ในการขับเคลื่อนระบบเเละควบคุมอวัยวะต่างๆ ในร่างกายค่ะ เรามาหาค่าพลังงานที่ใช้ในส่วนนี้กันก่อนค่ะ โดยการกรอกข้อมูลในเครื่องคำนวณด้านล่างนี้ค่ะ</p>
            </div>
            <div class="card-body">
              
              <div class="app-paper">
              <form class="mb-3" name="bmrform" action="update.php"  method="post">
                
                <input type="radio" name="gender" id="1" class="hidebx" value="1" style="">
                <label for="1" class="lbl-radio">
                  <div class="display-box">
                    <div class="size">ผู้ชาย</div>
                  </div>
                </label>     
                <input type="radio" name="gender" id="2" class="hidebx" value="2" style="">
                <label for="2" class="lbl-radio">
                  <div class="display-box">
                    <div class="size">ผู้หญิง</div>
                  </div>
                </label> 
              </div>
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
                <div class="d-grid gap-2 col-6 mx-auto">
                <button type="button" class="btn btn-secondary btn-lg" onClick="calcBMR();" id="calc">คำนวน</button>
                </div>  
                </div>
              <div class="bmr">
                <div class="content2">
                    <div class="form-control" style="">
                        <label for="bmr">BMR  ของคุณคือ</label>
                        <input class="form-control" type="number" value="" size="20" placeholder="" name="bmr" id="bmr" readonly>
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
          <div class="card text-center">
            <div class="card-header">
            <h1>Step 2 : TDEE</h1>
            <p>หลังจากเราได้ค่าการเผาผลาญ (ฺBMR) ที่เป็นพลังงานเพียวๆ เเบบไม่ได้ทำกิจกรรมอะไรเเล้ว เราก็จะมาเพิ่มในส่วนของกิจกรรมอื่นๆ ตามลักษณะการใช้ชีวิต เช่น การทำกิจกรรมนอกบ้าน หรือการไปออกกำลังกาย เพื่อหาค่าการเผาผลาญส่วนที่เพิ่มเติมลงไป (TDEE)
  TDEE คือ Total Daily Energy Expenditure หรือ ค่าของพลังงานที่ใช้กิจกรรมอื่นในแต่ละวัน โดยเลือกจากกิจกรรมตาม list ด้านล่างค่ะ ค่าที่ออกมาจะได้ค่าของการเผาผลาญพลังงานที่เป็นค่าเพียวๆ เเละค่าจากการทำกิจกรรมร่วมกันค่ะ</p>
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
              <div class="content">
                <div class="d-grid gap-2 col-6 mx-auto">
                <button type="button" class="btn btn-secondary btn-lg" onClick="calcTDEE();" id="calc">คำนวน</button>
                </div>  
                </div>
              <div class="bmr">
                <div class="content2">
                  <div class="form-control" style="">
                      <label for="plan">TDEE  ของคุณคือ</label>
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
          <div class="card text-center">
            <div class="card-header">
              <br>
            <h1>Step 3 : Diet Planning</h1>
            <p>เมื่อเราได้ค่าการเผาผลาญพลังงานต่อวันออกมาเเล้ว ทีนี้จะเป็นการกำหนดเป้าหมายคร่าวๆเพื่อให้เราทราบว่าถ้าหากเราต้องการที่จะลดน้ำหนักให้ได้ตามระยะเวลาที่วางไว้ เราควรจะลดการรับพลังงานจากอาหารให้เหลือวันละเท่าไหร่<br><br>

  โดยการใส่เป้าหมายของน้ำหนักจำนวน กิโลกรัมที่ต้องการลดเเละระยะเวลาในการลด เเต่ระยะเวลาควรมีกรอบเวลาอยู่ที่ไม่น้อยกว่า 30 วัน เเละควรกำหนดเป้าหมายน้ำหนักเเบ่งเป็นระยะ ไม่ควรหักโหมจนเกินไป โดยเฉลี่ยนเเล้วการลดน้ำหนักที่ดีเเละทำให้มีสุขภาพที่ดีด้วยจะต้องอยู่ที่ประมาณ 1-2 กิโลกรัมต่อสัปดาห์<br><br>

  ผลจากเครื่องคำนวณนี้จะเป็นพลังงานที่ต้องลด เเละ ปริมาณที่ใช้ได้ต่อวันค่ะ เเต่ต้องเตือนไว้ว่า ค่าที่ได้เป็นค่าที่ได้จากการคำนวณจากสูตรทางคณิตศาสตร์ ค่ะควรจะยึดไว้เป็นกรอบไว้คร่าวๆนะคะ เพื่อวางเเผนการลดน้ำหนักให้มีประสิทธิภาพ เพราะร่างกายเเต่ละคนไม่เหมือนกันค่ะ ระยะเวลาเเละผลลัพธ์อาจต่างกันค่ะ</p>
            </div>
            <div class="card-body">                                    
              <div class="content">
                <div class="mb-3 row">
                  <label for="Futureweight" class="col-sm-4 col-form-label">เป้าหมายน้ำหนักที่ต้องการ (kg.)</label>
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
                <div class="d-grid gap-2 col-6 mx-auto">
                <button type="button" class="btn btn-secondary btn-lg" onClick="calDift();" id="calc">คำนวน</button>
                </div>  
                </div>
              <div class="bmr">
                <div class="content2">
                  <div class="form-control" style="">
                      <label for="DiffKcal">ปริมาณพลังงานที่ต้องลดต่อวัน (kcal)</label>
                      <input class="form-control" type="number" value="" size="60" name="DiffKcal" id="DiffKcal" readonly>
                  </div>
                  <br>
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
          <div class="card text-center">
            <div class="card-header">
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
      <div class="d-grid gap-2 col-6 mx-auto">
      <button class="btn btn-primary btn-lg" type="submit">ไปคำนวนพลังงานอาหาร  <i class="bi bi-arrow-right-circle-fill" style="font-size:36px;"></i></button>
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