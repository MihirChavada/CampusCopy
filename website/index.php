<?php include "conn.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@1,700&family=Roboto+Slab&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <!-- <link rel="stylesheet" href="animation.css"> -->
</head>

<body class="background">

  <!-- Navabr Section Start -->
  <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary p-0" style="background: rgb(24,47,51);">
    <div class="container-fluid text-light">
      <div class="col-md-4">
        <img src="./images/logo.png" class="img-fluid" alt="" width="15%" height="15%">
      </div>
      <div>
          <?php 

            session_start();
            error_reporting(E_ERROR | E_PARSE);
              
            if (session_status() == PHP_SESSION_ACTIVE){

              if($_SESSION['logged_in']===true)
              {
                ?>
                <h4 style="text-align:left;" class="f">Hello <?php echo $_SESSION['firstname']; ?></h4>
             <?php }
            }
            error_reporting();

             
             
        ?>

      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav ms-auto me-2 my-2 my-lg-0 navbar-nav-scroll col-md-6" style="--bs-scroll-height: 100px;">
          <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="#">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="#upload">Upload</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="#about_us">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="#contact_us">Contact Us</a>
          </li>
          <?php 
                if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in'])
                {         
          ?>
          <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" data-bs-target="#modal" data-bs-toggle="modal">Login</a>
          </li>
          <?php }
          else{
          ?>
          <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="logout.php">logout</a>
          </li>
          <?php
          }
          ?>

          <!-- <li class="nav-item">
            <a class="nav-link active text-light"  href="admin.php">Admin</a>
          </li> -->

        </ul>
      </div>
    </div>
  </nav>

  <div class="modal" tabindex="-1" id="modal" data-bs-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content login_background">
        <div class="modal-header" style="border-bottom: none;">
          <h3 class="col text-center">Welcome</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        <div class="modal-body">
          <div class="container-fluid">
            <div class="row justify-content-center align-content-center">
              <form action="login.php" method="post" class="form">
                <p class="col text-center">Sign in to your account</p>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email</label>
                  <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input name="password" type="password" class="form-control" id="exampleInputPassword1" required>
                </div>
                <div class="d-flex justify-content-around">
                  <div class="mb-3 form-check">
                    <a href="#">Forgot Password</a>
                  </div>
                  <div class="mb-3 form-check">
                    <a href="registration.html">Create Account</a>
                  </div>
                </div>
                <div class="md-3 align-content-center text-center"><button type="submit" class="btn btn-primary">Login</button></div>

              </form>
            </div>
          </div>

          <svg width="100%" height="100%" id="svg" viewBox="0 0 1440 490" xmlns="http://www.w3.org/2000/svg" class="transition duration-300 ease-in-out delay-150">
            <style>
              .path-0 {
                animation: pathAnim-0 4s;
                animation-timing-function: linear;
                animation-iteration-count: infinite;
              }

              @keyframes pathAnim-0 {
                0% {
                  d: path("M 0,500 C 0,500 0,166 0,166 C 125.73333333333335,191.86666666666667 251.4666666666667,217.73333333333332 412,206 C 572.5333333333333,194.26666666666668 767.8666666666666,144.93333333333334 945,132 C 1122.1333333333334,119.06666666666666 1281.0666666666666,142.53333333333333 1440,166 C 1440,166 1440,500 1440,500 Z");
                }

                25% {
                  d: path("M 0,500 C 0,500 0,166 0,166 C 121.86666666666667,179.33333333333334 243.73333333333335,192.66666666666669 393,176 C 542.2666666666667,159.33333333333331 718.9333333333334,112.66666666666666 898,106 C 1077.0666666666666,99.33333333333334 1258.5333333333333,132.66666666666669 1440,166 C 1440,166 1440,500 1440,500 Z");
                }

                50% {
                  d: path("M 0,500 C 0,500 0,166 0,166 C 176.66666666666669,197.86666666666667 353.33333333333337,229.73333333333332 519,219 C 684.6666666666666,208.26666666666668 839.3333333333333,154.93333333333334 991,139 C 1142.6666666666667,123.06666666666666 1291.3333333333335,144.53333333333333 1440,166 C 1440,166 1440,500 1440,500 Z");
                }

                75% {
                  d: path("M 0,500 C 0,500 0,166 0,166 C 133.7333333333333,159.60000000000002 267.4666666666666,153.20000000000002 436,152 C 604.5333333333334,150.79999999999998 807.8666666666668,154.8 981,158 C 1154.1333333333332,161.2 1297.0666666666666,163.6 1440,166 C 1440,166 1440,500 1440,500 Z");
                }

                100% {
                  d: path("M 0,500 C 0,500 0,166 0,166 C 125.73333333333335,191.86666666666667 251.4666666666667,217.73333333333332 412,206 C 572.5333333333333,194.26666666666668 767.8666666666666,144.93333333333334 945,132 C 1122.1333333333334,119.06666666666666 1281.0666666666666,142.53333333333333 1440,166 C 1440,166 1440,500 1440,500 Z");
                }
              }
            </style>
            <defs>
              <linearGradient id="gradient" x1="0%" y1="50%" x2="100%" y2="50%">
                <stop offset="5%" stop-color="#152f33"></stop>
                <stop offset="95%" stop-color="#00e0be"></stop>
              </linearGradient>
            </defs>
            <path d="M 0,500 C 0,500 0,166 0,166 C 125.73333333333335,191.86666666666667 251.4666666666667,217.73333333333332 412,206 C 572.5333333333333,194.26666666666668 767.8666666666666,144.93333333333334 945,132 C 1122.1333333333334,119.06666666666666 1281.0666666666666,142.53333333333333 1440,166 C 1440,166 1440,500 1440,500 Z" stroke="none" stroke-width="0" fill="url(#gradient)" fill-opacity="0.53" class="transition-all duration-300 ease-in-out delay-150 path-0"></path>
            <style>
              .path-1 {
                animation: pathAnim-1 4s;
                animation-timing-function: linear;
                animation-iteration-count: infinite;
              }

              @keyframes pathAnim-1 {
                0% {
                  d: path("M 0,500 C 0,500 0,333 0,333 C 199.33333333333331,332.3333333333333 398.66666666666663,331.66666666666663 551,347 C 703.3333333333334,362.33333333333337 808.6666666666667,393.6666666666667 949,394 C 1089.3333333333333,394.3333333333333 1264.6666666666665,363.66666666666663 1440,333 C 1440,333 1440,500 1440,500 Z");
                }

                25% {
                  d: path("M 0,500 C 0,500 0,333 0,333 C 203.06666666666666,312.3333333333333 406.1333333333333,291.66666666666663 543,288 C 679.8666666666667,284.33333333333337 750.5333333333333,297.6666666666667 889,308 C 1027.4666666666667,318.3333333333333 1233.7333333333333,325.66666666666663 1440,333 C 1440,333 1440,500 1440,500 Z");
                }

                50% {
                  d: path("M 0,500 C 0,500 0,333 0,333 C 136.53333333333336,358.8666666666667 273.0666666666667,384.7333333333333 422,373 C 570.9333333333333,361.2666666666667 732.2666666666667,311.93333333333334 904,299 C 1075.7333333333333,286.06666666666666 1257.8666666666668,309.5333333333333 1440,333 C 1440,333 1440,500 1440,500 Z");
                }

                75% {
                  d: path("M 0,500 C 0,500 0,333 0,333 C 141.86666666666667,329.6666666666667 283.73333333333335,326.33333333333337 428,313 C 572.2666666666667,299.66666666666663 718.9333333333334,276.3333333333333 888,278 C 1057.0666666666666,279.6666666666667 1248.5333333333333,306.33333333333337 1440,333 C 1440,333 1440,500 1440,500 Z");
                }

                100% {
                  d: path("M 0,500 C 0,500 0,333 0,333 C 199.33333333333331,332.3333333333333 398.66666666666663,331.66666666666663 551,347 C 703.3333333333334,362.33333333333337 808.6666666666667,393.6666666666667 949,394 C 1089.3333333333333,394.3333333333333 1264.6666666666665,363.66666666666663 1440,333 C 1440,333 1440,500 1440,500 Z");
                }
              }
            </style>
            <defs>
              <linearGradient id="gradient" x1="0%" y1="50%" x2="100%" y2="50%">
                <stop offset="5%" stop-color="#152f33"></stop>
                <stop offset="95%" stop-color="#00e0be"></stop>
              </linearGradient>
            </defs>
            <path d="M 0,500 C 0,500 0,333 0,333 C 199.33333333333331,332.3333333333333 398.66666666666663,331.66666666666663 551,347 C 703.3333333333334,362.33333333333337 808.6666666666667,393.6666666666667 949,394 C 1089.3333333333333,394.3333333333333 1264.6666666666665,363.66666666666663 1440,333 C 1440,333 1440,500 1440,500 Z" stroke="none" stroke-width="0" fill="url(#gradient)" fill-opacity="1" class="transition-all duration-300 ease-in-out delay-150 path-1"></path>
          </svg>
        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> -->
      </div>
    </div>
  </div>


  <!-- Navbar Section End -->

  <!-- Hero-section Start -->
  <div class="container-fluid">
    <div class="row justify-content-between align-content-center align-items-center">
      <div class="col-md-6 px-5">
        <h1 class="p-2 font-weight-bold font-italic display-1" style="margin-left:10%; color:rgb(24,47,51); font-size:50px; font-weight:900">
          Welcome to Website
        </h1>
        <p class="mt-1 lead" style="margin-left:10%;">Streamline Your Printing Process with Xerox: Meet Our Heroic
          Printing Management System.</p>

        <div style="margin-left:10%;">
          <button class="btn btn-grad active"   data-bs-target="#register" data-bs-toggle="modal" aria-current="page">Register</button>
        </div>
      </div>
      <div class="col-md-6 mb-5">
        <!-- <img src="../images/blob.svg" class="img-fluid" alt="" style="position: absolute;"> -->
        <div class="fancy-border-radius">
          <img src="./images/dashboard.png" class="img-fluid dashboard px-5" alt="">
        </div>

      </div>
    </div>
  </div>
  <!-- hero-section End -->

  <div class="container modal" id="register">

    <div class="row justify-content-center align-content-center flex-column">

      <form action="register.php" method="post" class="col-md-6 bg-light p-5 form rounded-4 shadow-lg " style="margin-top: 1.2rem;">

        <h1 class="col text-center">Registration</h1>
        <p class="col text-center">Sign in to your account</p>
        <div class="row">

          <div class="mb-3 col">
            <label for="exampleInputEmail1" class="form-label">First Name</label>
            <?php if (isset($_GET['firstname'])) { ?>
                <input type="text" name="firstname" value="<?php echo $_GET['name']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <?php }else{?>
                <input type="text" name="firstname"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <?php }?>    
          </div>

          <div class="mb-3 col">
            <label for="exampleInputEmail1" class="form-label">Last Name</label>
            <?php if (isset($_GET['lastname'])) { ?>
                  <input type="text" name="lastname" value="<?php echo $_GET['lastname']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <?php }else{?>
              <input type="text" name="lastname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <?php }?>
          </div>
        </div>


        <div class="row">
          <div class="mb-3 col">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <?php if (isset($_GET['email'])) { ?>
                <input type="text" name="email" value="<?php echo $_GET['email']; ?>"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <?php }else{?>
              <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <?php }?>  
          </div>

          <div class="mb-3 col">
            <label for="exampleInputEmail1" class="form-label">Mobile No</label>
            <?php if (isset($_GET['mobile'])) { ?>
                <input type="text" name="mobile" value="<?php echo $_GET['mobile']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <?php }else{?>
              <input type="text" name="mobile" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <?php }?>
          </div>
        </div>


        <div class="row">
          <div class="mb-3 col">
            <label for="exampleInputEmail1" class="form-label">Enrollment No / Roll No</label>
            <?php if (isset($_GET['enroll'])) { ?>
                <input type="text" name="enroll" value="<?php echo $_GET['enroll']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <?php }else{?>
                <input type="text" name="enroll" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <?php }?>
          </div>

          <div class="mb-3 col">
            <label for="exampleInputEmail1" class="form-label">Branch / Semester</label>
            <?php if (isset($_GET['sem'])) { ?>
                <input type="text" name="sem"  value="<?php echo $_GET['sem']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <?php }else{?>
              <input type="text" name="sem"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <?php } ?>
          </div>
        </div>

        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>

        <div class="mb-3 form-check">
          <a href="login.html" class="already">Already have an Account</a>
        </div>
        <div class="md-3 align-content-center text-center"><button type="submit" class="btn">Create Account</button></div>
      </form>


    </div>

  </div>

  <div class="container-fluid py-5 mt-5" style="background-color:rgb(24,47,51)" id="upload">
    <div class="row align-items-center justify-content-center align-content-center">
      <div class="col-md-5 mt-4 text-light">
        <h1 class="text-center">Upload Your Document</h1>
      </div>
    </div>
    <div class="row align-items-center justify-content-evenly align-content-center p-1">
      <div class="col-md-4">
        <img src="./images/Upload.png">
      </div>
      <div class="col-md-4">
        <form action="upload.php" method="post" enctype="multipart/form-data">
          <div>
            <label for="formFileLg" class="form-label text-light">Upload File</label>
            <input type="file" name="file" class="form-control form-control-lg" id="formFileLg" >
            <!--  -->
          </div>
          <select class="form-select mt-4" name="orin" style="background-color:rgb(0,223,192)" aria-label="Default select example">
            <option value="" disabled selected hidden>Print Orientation</option>
            <option value="LandScape" style="background-color:rgb(164,245,236)">LandScape</option>
            <option value="Portrait" style="background-color:rgb(164,245,236)">Portrait</option>
          </select>
          <select class="form-select mt-4" name="color" aria-label="Default select example">
            <option value="" disabled selected hidden>Print Color</option>
            <option value="Black & White">Black & White</option>
            <option value="Color">Color</option>
          </select>
          <select class="form-select mt-4" name="side" style="background-color:rgb(0,223,192)" aria-label="Default select example">
            <option value="" disabled selected hidden>Print Side</option>
            <option value="One Side" style="background-color:rgb(164,245,236)">One Side</option>
            <option value="Two Side" style="background-color:rgb(164,245,236)">Two Side</option>
          </select>
          <select class="form-select mt-4" name="type" aria-label="Default select example">
            <option value="" disabled selected hidden>Prints</option>
            <option value="Normal">Normal</option>
            <option value="Spiral">Spiral</option>
            <option value="Stappel">Stappel</option>
          </select>
          <!-- <button type="submit" class="btn">Create Account</button> -->
          <input type="submit" onclick="window.Location.href='http://localhost/DE/Admin/admin.php'" class="btn mt-3"  value="Upload" style="background-color:rgb(0,180,192);">
        </form>
      </div>
    </div>
  </div>
  <!-- About Us Start -->

  <div class="container py-5" id="about_us">
    <div class="row align-content-center justify-content-center align-items-center">
      <div class="col-md-2 mt-5">
        <h2 class="text-center fw-bold">About Us</h2>
        <div class="underline"></div>
      </div>
      <div class="row align-content-center justify-content-center align-items-center">
        <div class="col-md-8 mt-2">
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minus aperiam aut, totam porro dignissimos
            quisquam ducimus harum? Dolorem aliquam deleniti.</p>
        </div>
        <div class="row align-content-center justify-content-center align-items-center">
          <div class="col-md-6 mb-3">
            <h3 class="text-center fw-bold">Our Team</h3>
          </div>
        </div>
        <div class="row row-cols-1 row-cols-md-4 gx-4">
          <div class="col">
            <div class="card custom-2 h-100" style="background: rgb(24,47,51); border-style: none;">
              <img src="./images/logo.png" class="card-img-top rounded-circle custom-img mx-auto d-block mt-3" alt="...">
              <div class="card-body">
                <h5 class="card-title text-light text-center">Smit Doshi</h5>
                <p class="card-text text-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo,
                  laboriosam!</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 custom-2" style="background-color:rgb(24,47,51)">
              <img src="./images/logo.png" class="card-img-top rounded-circle custom-img mx-auto d-block mt-3 alt=" ..."" alt="...">
              <div class="card-body">
                <h5 class="card-title text-light text-center">Labdhi Gathani</h5>
                <p class="card-text text-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus,
                  magni!</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 custom-2" style="background-color:rgb(24,47,51)">
              <img src="./images/logo.png" class="card-img-top rounded-circle custom-img mx-auto d-block mt-3" alt="...">
              <div class="card-body">
                <h5 class="card-title text-light text-center">Mihir Chavda</h5>
                <p class="card-text text-light">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laboriosam,
                  accusantium!</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 custom-2" style="background-color:rgb(24,47,51)">
              <img src="./images/logo.png" class="card-img-top rounded-circle custom-img mx-auto d-block mt-3" alt="...">
              <div class="card-body">
                <h5 class="card-title text-light text-center">Mo-Arhan Jiya</h5>
                <p class="card-text  text-light">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Impedit,
                  error. </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- About Us End -->

  <!-- Contact Us Start -->
  <div class="container-fluid py-5" id="contact_us" style="background:rgb(24,47,51); color: white;">
    <div class="row justify-content-center align-content-center align-items-center mt-5">
      <div class="col-md-2">
        <h1 class="text-center">Contact Us</h1>
        <div class="underline" style="width:200px; border-color:white;"></div>
      </div>
    </div>

    <div class="row justify-content-center align-content-center align-items-center mt-4">
      <div class="col-md-3">
        <div class="row justify-content-center align-content-center align-items-center mr-0">
          <span class="col-md-2">
            <a href="#"><i class="fab fa-linkedin icon-color fa-2x" style="margin-right:0;"></i></a>
          </span>
          <span class="col m-0 p-0">
            <p class="mb-0">Linkedin</p>
            <p>Printing Printing</p>
          </span>
        </div>

        <div class="row justify-content-center align-content-center align-items-center">
          <div class="col-md-2">
            <a href="#"><i class="fas fa-user icon-color fa-2x"></i></a>
          </div>
          <div class="col m-0 p-0">
            <p class="mb-0">Linkedin</p>
            <p>Printing Printing</p>
          </div>
        </div>

        <div class="row justify-content-between align-content-center align-items-center">
          <div class="col-md-2">
            <a href="#"><i class="fas fa-map-marker-alt icon-color fa-2x"></i></a>
          </div>
          <div class="col m-0 p-0">
            <p class="mb-0">Linkedin</p>
            <p>Printing Printing</p>
          </div>
        </div>

        <div class="row justify-content-between align-content-center align-items-center">
          <div class="col-md-2">
            <a href="#"><i class="fas fa-envelope icon-color fa-2x"></i></a>
          </div>
          <div class="col m-0 p-0">
            <p class="mb-0">Linkedin</p>
            <p>Printing Printing</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <h4 class="mb-3">Message Us</h4>
        <form action="contactus.php" method="post">
          <div class="mb-3">
            <input type="email" name="email" placeholder="Name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Email">
          </div>
          <div class="mb-3">
            <input type="text" name="subject" placeholder="Subject" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
            <textarea rows=5 placeholder="Feedback..." name="feedback" class="form-control" id="exampleFormControlTextarea1"></textarea>
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <button type="submit" class="btn" style="background-color:rgb(0,224,190)">Submit</button>
        </form>
      </div>
    </div>
    <!-- Contact Us End -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>