<?php
    $path = '../';
    include_once($path."class/login.php");
    include_once($path."AUTHOR/class/author_class.php");
    include_once("class/guest_class.php");

    $class_login->isUserLoggedIn();

      if(!$class_login->isUserLoggedIn())
      {
        // header("Location: index.php");
        echo '<script>window.location.href="../index.php"</script>';
      }
       else
      {
        $UserId = $_SESSION['USER_ID'];
        // $LocationId = $_SESSION['LOCATION_ID'];

      }
      // print_r($UserId);

    $categoryList = $author_class->getCategoryData();     
    $postData     = $guest_class->getPostDetails();     
    $AuthorData     = $guest_class->getAuthorDetails();     
    // echo "<pre>";
    // print_r($postData);
    // echo "</pre>"; 

?>
<!doctype html>
<html lang="en">

  <head>
    <title>Trips &mdash; Website Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">
<style type="text/css">

</style>
  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



<?php include_once('headerGuest.php'); ?>

    <div class="ftco-blocks-cover-1">
      <div class="site-section-cover overlay" style="background-image: url('images/hero_1.jpg')">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-5" data-aos="fade-up">
              <h1 class="mb-3 text-white">Our Blog</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta veritatis in tenetur doloremque, maiores doloribus officia iste. Dolores.</p>
              
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="site-section">
      <div class="container-fluid"> 
        <div class="row">
          <div class="col-md-3 sidebar">
            <div class="sidebar-box">
              <div class="categories">
                <h3>Categories</h3>
                <?php  
                  foreach ($categoryList as $key => $value) {
                ?>
                    <li class="list" id="<?php  echo $value['CATEGORY_ID'];  ?>"><?php  echo $value['TITLE'];  ?></li>
                <?php 
                      }
                ?>
             <!--    <li><a href="">Brazil <span>(22)</span></a></li>
                <li><a href="">Europe <span>(37)</span></a></li>
                <li><a href="">Dubai <span>(42)</span></a></li>
                <li><a href="">Australia <span>(14)</span></a></li> -->
              </div>
            </div>
          </div>
          <div class="col-md-9 cont">
            <div class="row post_cate page_div">
              <?php 
                foreach ($postData as $key => $value) {
                 foreach ($value as $keys => $values) {
                   # code...
                 
              ?>

              <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="post-entry-1 h-100">
                  <a href="single.php?id=<?php echo $values['POST_ID']; ?>">
                    <img src="images/img_1.jpg" alt="Image"
                     class="img-fluid">
                  </a>
                  <div class="post-entry-1-contents">
                    
                    <h2><a href="single.php?id=<?php echo $values['POST_ID']; ?>"><?php  echo $values['TITLE']; ?></a></h2>
                    <span class="meta d-inline-block mb-3"><?php  echo date('d-M-Y', strtotime($values['PUBLISHED_ON'])); ?> <span class="mx-2">by</span> <?php echo $AuthorData['FIRST_NAME'] . " " . $AuthorData['LAST_NAME']; ?></span>
                    <p><?php  echo $values['SUMMARY']; ?></p>
                  </div>
                </div>
              </div>
             <?php
                  }
                }
              ?>

            </div>
          </div>
        </div>

        
        <div class="col-12 mt-5 text-center">
          <span class="p-3">1</span>
          <a href="#" class="p-3">2</a>
          <a href="#" class="p-3">3</a>
          <a href="#" class="p-3">4</a>
        </div>
        
      </div>
    </div> <!-- END .site-section -->

    <footer class="site-footer bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <h2 class="footer-heading mb-3">Instagram</h2>
            <div class="row">
              <div class="col-4 gal_col">
                <a href="#"><img src="images/insta_1.jpg" alt="Image" class="img-fluid"></a>
              </div>
              <div class="col-4 gal_col">
                <a href="#"><img src="images/insta_2.jpg" alt="Image" class="img-fluid"></a>
              </div>
              <div class="col-4 gal_col">
                <a href="#"><img src="images/insta_3.jpg" alt="Image" class="img-fluid"></a>
              </div>
              <div class="col-4 gal_col">
                <a href="#"><img src="images/insta_4.jpg" alt="Image" class="img-fluid"></a>
              </div>
              <div class="col-4 gal_col">
                <a href="#"><img src="images/insta_5.jpg" alt="Image" class="img-fluid"></a>
              </div>
              <div class="col-4 gal_col">
                <a href="#"><img src="images/insta_6.jpg" alt="Image" class="img-fluid"></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 ml-auto">
            <div class="row">
              <div class="col-lg-6 ml-auto">
                <h2 class="footer-heading mb-4">Quick Links</h2>
                <ul class="list-unstyled">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Blog</a></li>
                  <li><a href="#">Log In</a></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <h2 class="footer-heading mb-4">Newsletter</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt odio iure animi ullam quam, deleniti rem!</p>
                <form action="#" class="d-flex" class="subscribe">
                  <input type="text" class="form-control mr-3" placeholder="Email">
                  <input type="submit" value="Send" class="btn btn-primary">
                </form>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </footer>

    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/guest.js"></script>
    <script src="js/main.js"></script>

  </body>

</html>

