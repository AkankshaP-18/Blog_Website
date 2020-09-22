<?php
    $path = '../';
    include_once($path."class/login.php");
    include_once("class/author_class.php");

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
      $post_id = $_GET['post_id'];
      // print_r($post_id);
    
    $categoryList = $author_class->getCategoryData();     
    $PostData = $author_class->getPostEditData($post_id);     
    // echo "<pre>";
    // print_r($PostData);
    // echo "</pre>"; 

?>
<!doctype html>
<html lang="en">

  <head>
    <title>Travel With Us</title>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

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

      <?php include_once('headerAuthor.php'); ?>
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-10 offset-2">
            <form>
              <div class="row">
                <div class="col-sm-12 col-lg-6 col-md-6">
                  <div class="form-group">
                    <input type="hidden" name="userid" id="userid" value="<?php  echo $UserId;  ?>">
                    <input type="hidden" name="postid" id="postid" value="<?php  echo $post_id;  ?>">
                    <label for="clinic">Category List: <span class="text-danger">*</span></label>
                    <select class="form-control" id="category" name="category">
                      <!-- <option>--Select Category--</option> -->
                      <?php
                        foreach ($categoryList as $key => $value) {
                      ?>
                          <option id="<?php echo $value['CATEGORY_ID']; ?>"<?php echo  ($PostData['CATE_DETAIL']['TITLE'] == $value['TITLE']) ? " selected='selected'" : ""; ?>><?php echo $value['TITLE']; ?></option>
                      <?php
                        }
                      ?>
                    </select>
                  </div>

                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-lg-6 col-md-6">
                  <div class="form-group">
                    <label for="title">Add Title:</label>
                    <input type="text" class="form-control" id="tilte" name="title" value="<?php echo $PostData['TITLE']; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-lg-6 col-md-6">
                  <div class="form-group">
                    <label for="summ">Add Summary:</label>
                    <input type="text" class="form-control" id="summ" name="summary" value="<?php echo $PostData['SUMMARY']; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-lg-6 col-md-6">
                  <div class="form-group">
                    <label for="comment">Add Content:</label>
                      <textarea class="form-control" rows="5" id="comment" name="comment"><?php echo $PostData['CONTENT']; ?></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-lg-6 col-md-6">
                    <button type="button" class="btn btn-primary btnupdate">Update</button>
                </div>
              </div>
            </form>  
          </div>
        </div>
        
      </div>
    
  </div>


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
    <script src="js/sweetalert.min.js"></script>
    <script src="js/author.js"></script>
    <script src="js/main.js"></script>

  </body>

</html>

