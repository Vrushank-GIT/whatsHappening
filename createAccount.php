<?php
// Initialize the session
session_start();

// Include database connection file
require_once 'functions.php';
$connect = db_connect();

// Define variables and initialize with empty values
$groupName = $groupType = $contactName = $contactEmail = $imageName = $groupDesc = $username = $password = "";
$groupName_err = $groupType_err = $contactName_err = $contactEmail_err = $imageName_err = $groupDesc_err = $username_err = $password_err = "";


// Password validation rules
function validatePassword($password) {
  $errors = [];
  // Check for at least 7 characters
  if (strlen($password) < 7) {
      $errors[] = "Password must be at least 7 characters long.";
  }
  // Check for at least one capital letter
  if (!preg_match("/[A-Z]/", $password)) {
      $errors[] = "Password must contain at least one capital letter.";
  }
  // Check for at least one number
  if (!preg_match("/[0-9]/", $password)) {
      $errors[] = "Password must contain at least one number.";
  }
  // Check for at least one special character
  if (!preg_match("/[^a-zA-Z0-9]/", $password)) {
      $errors[] = "Password must contain at least one special character.";
  }
  return $errors;
}

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate group name
    if(empty(trim($_POST["group_name"]))){
        $groupName_err = "Please enter group name.";
    } else{
        $groupName = trim($_POST["group_name"]);
    }

    // Validate group type
    if(empty(trim($_POST["group_type"]))){
        $groupType_err = "Please enter group type.";
    } else{
        $groupType = trim($_POST["group_type"]);
    }

    // Validate contact name
    if(empty(trim($_POST["contact_name"]))){
        $contactName_err = "Please enter contact name.";
    } else{
        $contactName = trim($_POST["contact_name"]);
    }

    // Validate contact email
    if(empty(trim($_POST["contact_email"]))){
        $contactEmail_err = "Please enter contact email.";
    } else{
        $contactEmail = trim($_POST["contact_email"]);
    }

    // Validate image name
    if(empty(trim($_POST["image_name"]))){
        $imageName_err = "Please enter image name.";
    } else{
        $imageName = "files/images/events/" . trim($_POST['image_name']).".jpg";
    }

    // Validate group description
    if(empty(trim($_POST["group_description"]))){
        $groupDesc_err = "Please enter group description.";
    } else{
        $groupDesc = trim($_POST["group_description"]);
    }

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
        $passwordErrors = validatePassword($password);
        if (!empty($passwordErrors)) {
            $password_err = implode("<br>", $passwordErrors);
        }
    }

    // Check input errors before inserting into database
    if(empty($groupName_err) && empty($groupType_err) && empty($contactName_err) && empty($contactEmail_err) && empty($imageName_err) && empty($groupDesc_err) && empty($username_err) && empty($password_err)){
        
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
      
      // Prepare an insert statement for Groups table
        $insertGroupQuery = "INSERT INTO Groups (GroupName, GroupImage, GroupType, GroupDesc, ContactName, ContactEmail) VALUES (?, ?, ?, ?, ?, ?)";

        if($insertGroupStmt = mysqli_prepare($connect, $insertGroupQuery)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($insertGroupStmt, "ssssss", $groupName,$imageName, $groupType, $groupDesc, $contactName, $contactEmail);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($insertGroupStmt)){
                // Get the newly inserted GroupID
                $groupID = mysqli_insert_id($connect);

                // Close statement
                mysqli_stmt_close($insertGroupStmt);

                    // Prepare an insert statement for Login table
                $insertLoginQuery = "INSERT INTO Login (GroupID, Username, Password) VALUES (?, ?, ?)";
                if($insertLoginStmt = mysqli_prepare($connect, $insertLoginQuery)){

                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($insertLoginStmt, "iss", $groupID, $username, $hashedPassword);

                    // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($insertLoginStmt)){
                        // Redirect to post page
                        $_SESSION["login"] = true;
                        $_SESSION["AccountID"] = mysqli_insert_id($connect);
                        $_SESSION["GroupID"] = $groupID;
                        header("location: post.php");
                        exit;
                    } else{
                        echo "Something went wrong. Please try again later.";
                    }

                    // Close statement
                    mysqli_stmt_close($insertLoginStmt);
                }
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close connection
            mysqli_close($connect);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ZenBlog Bootstrap Template - Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS Files -->
  <link href="assets/css/variables.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: ZenBlog
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
  * Author: BootstrapMade.com
  * License: https:///bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>What's Happening</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li class="dropdown"><a href="events.php"><span>Events</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="events.php">All Events</a></li>
              <li><a href="events.php?event_type=Music">Music</a></li>
              <li class="dropdown"><a href="events.php?event_type=Art+Culture"><span>Art+Culture</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="events.php?event_type=Sports">Sport</a></li>
              <li><a href="events.php?event_type=Food">Food</a></li>
              <li><a href="events.php?event_type=Fund Raiser">Fund Raiser</a></li>
            </ul>
          </li>
          <li><a href="groups.php">Community Groups</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="post.php">Post Event</a></li>
          <li class="dropdown"><a href="login.php">Login<i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
             <li><a href="login.php">Login</a></li>
             <li><a href="logout.php">Logout</a></li>
            </ul>
        </ul>
      </nav><!-- .navbar -->

      <div class="position-relative">
        <a href="#" class="mx-2"><span class="bi-facebook"></span></a>
        <a href="#" class="mx-2"><span class="bi-twitter"></span></a>
        <a href="#" class="mx-2"><span class="bi-instagram"></span></a>

        <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
        <i class="bi bi-list mobile-nav-toggle"></i>

        <!-- ======= Search Form ======= -->
        <div class="search-form-wrap js-search-form-wrap">
          <form action="search-result.html" class="search-form">
            <span class="icon bi-search"></span>
            <input type="text" placeholder="Search" class="form-control">
            <button class="btn js-search-close"><span class="bi-x"></span></button>
          </form>
        </div><!-- End Search Form -->

      </div>

    </div>

  </header><!-- End Header -->

  <main id="main">
  <section id="contact" class="contact mb-5">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-12 text-center mb-5">
          <h1 class="page-title">Create Account</h1>
        </div>
      </div>

      <div class="form mt-5">
        <form method="post" action="createAccount.php" role="form">
           <h4>Tell us about your group:</h4> 
          <div class="form-group">
            <input type="text" name="group_name" class="form-control" id="group_name" placeholder="Your Community Group" required>
          </div>
          <div class="form-group">
            <input type="text" name="group_type" class="form-control" id="group_type" placeholder="What type of group are you?" required>
          </div>
          <div class="form-group">
            <input type="text" name="contact_name" class="form-control" id="contact_name" placeholder="Provide a Contact Name for your group" required>
          </div>
          <div class="form-group">
            <input type="email" name="contact_email" class="form-control" id="contact_email" placeholder="Provide a Contact Email for your group" required>
          </div>
          <div class="form-group">
            <input type="text" name="image_name" class="form-control" id="image_name" placeholder="Group Image Name" required>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="group_description" rows="5" placeholder="Tell us about your group" required></textarea>
          </div>
          <br></br>
          <h4>Create Account:</h4>
          <div class="form-group">
            <input type="text" name="username" class="form-control" id="username" placeholder="Create Username" required>
          </div>
          <div class="form-group">
            <input type="password" name="password" class="form-control" id="password" placeholder="Create Password" required>
          </div>
          <br></br>
          <div class="text-center"><button name="submit" type="submit" id="submit" style="background-color: green;">submit</button></div>
        </form>
      </div><!-- End Contact Form -->

    </div>
  </section>
</main><!-- End #main -->


  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content">
      <div class="container">

        <div class="row g-5">
          <div class="col-lg-4">
            <h3 class="footer-heading">About What's Happening</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam ab, perspiciatis beatae autem deleniti voluptate nulla a dolores, exercitationem eveniet libero laudantium recusandae officiis qui aliquid blanditiis omnis quae. Explicabo?</p>
            <p><a href="about.php" class="footer-link-more">Learn More</a></p>
          </div>
          <div class="col-6 col-lg-2">
            <h3 class="footer-heading">Navigation</h3>
            <ul class="footer-links list-unstyled">
              <li><a href="index.php"><i class="bi bi-chevron-right"></i> Home</a></li>
              <li><a href="events.php"><i class="bi bi-chevron-right"></i> Events</a></li>
              <li><a href="groups.php"><i class="bi bi-chevron-right"></i> Community Groups</a></li>
              <li><a href="about.php"><i class="bi bi-chevron-right"></i> About</a></li>
               <li><a href="post.php"><i class="bi bi-chevron-right"></i> Post Event</a></li>
              <li><a href="login.php"><i class="bi bi-chevron-right"></i> Login</a></li>
            </ul>
          </div>
         <div class="col-6 col-lg-2">
            <h3 class="footer-heading">Events</h3>
            <ul class="footer-links list-unstyled">
              <li><a href="events.php"><i class="bi bi-chevron-right"></i> All Events</a></li>
              <li><a href="events.php?event_type=Music"><i class="bi bi-chevron-right"></i> Music</a></li>
              <li><a href="events.php?event_type=Art+Culture"><i class="bi bi-chevron-right"></i> Art+Culture</a></li>
              <li><a href="events.php?event_type=Sports"><i class="bi bi-chevron-right"></i> Sports</a></li>
              <li><a href="events.php?event_type=Food"><i class="bi bi-chevron-right"></i> Food</a></li>
              <li><a href="events.php?event_type=Fund Raiser"><i class="bi bi-chevron-right"></i> Fund Raiser</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="footer-legal">
      <div class="container">

        <div class="row justify-content-between">
          <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
            <div class="copyright">
              © Copyright <strong><span>ZenBlog</span></strong>. All Rights Reserved
            </div>

            <div class="credits">
              <!-- All the links in the footer should remain intact. -->
              <!-- You can delete the links only if you purchased the pro version. -->
              <!-- Licensing information: https://bootstrapmade.com/license/ -->
              <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>

          </div>

          <div class="col-md-6">
            <div class="social-links mb-3 mb-lg-0 text-center text-md-end">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

          </div>

        </div>

      </div>
    </div>

  </footer>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>