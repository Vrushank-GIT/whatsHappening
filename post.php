<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["login"]) || $_SESSION["login"] !== true){
    header("location: login.php");
    exit;
} else {
  $groupID = $_SESSION['GroupID'];
    
  // Query the database to get the group name
  require_once 'functions.php';
  $connect = db_connect();
  $query = "SELECT GroupName FROM groups WHERE GroupID = $groupID";
  $result = mysqli_query($connect, $query);
  
  if(mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $groupName = $row['GroupName'];
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ZenBlog Bootstrap Template - Contact</title>
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
          </li>
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
<?php
            // connection made with database 

            $error = '';
            $name = '';
            $title = '';
            $date = '';
            $time = '';
            $type = '';
            $img_name = '';
            $description = '';



            if (isset($_POST['submit'])) {
                $name = clean_text($_POST['group_name']);
                $groupId = '';
                $sql = "SELECT * FROM groups WHERE GroupName = ?;";
                // Prepare the statement
                $stmt = $connect->prepare($sql);

                // Bind the parameter
                $stmt->bind_param("s", $name);

                // Execute the statement
                $stmt->execute();

                // Get the result set
                $result = $stmt->get_result();

                // $groupIDResult = $connect->query($sql);
                if($result->num_rows > 0) {
                  while($row = $result -> fetch_assoc()) {
                    $groupId = $row["GroupID"];
                  }
                }
                else{
                  echo "ERROR";
                }
                $stmt->close();

                $date = clean_text($_POST['event_date']);
                $time = clean_text($_POST['event_time']);
                $eventDate = $date . ' ' . $time;

                $type = clean_text($_POST['event_type']);
                $eventTypeId = '';



                $sql = "SELECT * FROM eventtypes WHERE TypeName = ?;";
                // Prepare the statement
                $stmt = $connect->prepare($sql);

                // Bind the parameter
                $stmt->bind_param("s", $type);

                // Execute the statement
                $stmt->execute();

                // Get the result set
                $result = $stmt->get_result();

                // $eventTypeResult = $connect->query();
                if($result->num_rows > 0) {
                  while($row = $result -> fetch_assoc()) {
                    $eventTypeId = $row["EventTypeID"];
                  }
                }
                else{
                  echo "ERROR";
                }
                $stmt->close();

                $title = clean_text($_POST['event_title']);
                $img_name = "files/images/events/" . clean_text($_POST['image_name']) . ".jpg";
                $description = clean_text($_POST['event_description']);
                $submitDate = date("Y-m-d H:i:s");

                if ($name == '' || $title == '' || $date == '' || $type == '' || $img_name == '' || $description == '') {
                    $error = 'Please fill in all fields.';
                } else {
                  $sql = "INSERT INTO events (EventTitle, EventDate, EventImage, EventDesc, SubmitDate, GroupID, EventTypeID) VALUES (?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $connect->prepare($sql);
                    $stmt->bind_param("sssssss", $title, $eventDate, $img_name, $description, $submitDate, $groupId, $eventTypeId);
                    if ($stmt->execute()) {
                        echo "New record inserted successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    $error = 'Event successfully posted.';
                    header('Location:http://localhost/events.php');
                    exit();
                }
                
            
            }
            function clean_text($string)
            {
                $string = trim($string);
                $string = stripslashes($string);
                $string = htmlspecialchars($string);
                return $string;
            }
            $connect -> close();
?>
<main id="main">
    <section id="contact" class="contact mb-5">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <h1 class="page-title">Post New Event</h1>
                </div>
            </div>
            <div class="text-center">
                <a><strong><?php echo $groupName !== "" ? $groupName : ''; ?></strong></a>
            </div>
            <div class="form mt-5">
                <form method="post" action="post.php" role="form">
                    <div class="form-group">
                        <input type="text" name="group_name" class="form-control" id="group_name" placeholder="Your Community Group" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="event_title" class="form-control" id="event_title" placeholder="Your Event Title" required>
                    </div>
                    <div class="form-group">
                        <input type="date" name="event_date" class="form-control" id="event_date" placeholder="Your Event Date (Format: year-month-day)" required>
                    </div>
                    <div class="form-group">
                        <input type="time" name="event_time" class="form-control" id="event_time" placeholder="Your Event Time (Format: Hours-minutes-seconds)" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="event_type" class="form-control" id="event_type" placeholder="Your Event Type" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="image_name" class="form-control" id="image_name" placeholder="Image Name" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="event_description" rows="5" placeholder="The Event Description" required></textarea>
                    </div>
                    <div class="text-center"><button name="submit" type="submit" id="submit" >submit</button></div>
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
              � Copyright <strong><span>ZenBlog</span></strong>. All Rights Reserved
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