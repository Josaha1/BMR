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
  <link href="assets/css/login.css" rel="stylesheet">


</head>

<body>
  <div class="d-grid gap-3">
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
    <div class="p-2">
      <div class="login-wrap">
        <form class="mb-3" name="bmrform" action="loginform.php" method="post">
          <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">เข้าสู่ระบบ</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">ลงทะเบียน</label>
            <div class="login-form">
              <div class="sign-in-htm">
                <div class="group">
                  <label for="user" class="label">เลขบัตรประชาชน</label>
                  <input id="Cid" name="Cid" type="text" class="input" placeholder="X-XXXX-XXXXX-XX-X">
                </div>

                <div class="group">
                  <input id="check" type="checkbox" class="check" checked>
                  <label for="check"><span class="icon"></span> Keep me Signed in</label>
                </div>
                <center>
                  <div class="group">
                    <button type="submit" name="btnSave" class="btn btn-primary btn-lg" value="Login">เข้าสู่ระบบ</button>
                  </div>
                </center>
                <div class="hr"></div>
                <div class="foot-lnk">
                  <a href="#forgot">Forgot Password?</a>
                </div>
              </div>
              <div class="sign-up-htm">
                <div class="group">
                  <label for="RCid" class="label">เลขบัตรประชาชน</label>
                  <input id="RCid" name="RCid" type="text" class="input" maxlength="13" placeholder="X-XXXX-XXXXX-XX-X">
                  
                </div>
                <div class="group">
                  <center>
                    <div class="app-paper">
                      <form class="mb-3" name="bmrform" action="update.php" method="post">

                        <input type="radio" name="gender" id="1" class="hidebx" value="ชาย" style="">
                        <label for="1" class="lbl-radio">
                          <div class="display-box">
                            <div class="size"> <i class="fas fa-male" style="font-size: 40px;"></i><br>ผู้ชาย</div>
                          </div>
                        </label>
                        <input type="radio" name="gender" id="2" class="hidebx" value="หญิง" style="">
                        <label for="2" class="lbl-radio">
                          <div class="display-box">
                            <div class="size"><i class="fas fa-female" style="font-size: 40px;"></i><br>ผู้หญิง</div>
                          </div>
                        </label>
                    </div>
                  </center>
                </div>
                <div class="group">
                  <label for="FName" class="label">ชื่อ</label>
                  <input id="FName" name="FName" type="text" class="input" data-type="text">
                </div>
                <div class="group">
                  <label for="LName" class="label">นามสกุล</label>
                  <input id="LName" name="LName" type="text" class="input" data-type="text">
                </div>
                <center>
                  <div class="group">
                    <button type="submit" name="btnRegis" class="btn btn-primary btn-lg" value="Login">ลงทะเบียน</button>
                  </div>
                </center>
                <div class="hr"></div>
                <div class="foot-lnk">
                  <label for="tab-1">Already Member?</a>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></scrip>
  <script src="assets/vendor/aos/aos.js"></scrip>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>