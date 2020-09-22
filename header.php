      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3 ">
              <div class="site-logo">
                <a href="index.php" class="font-weight-bold">
                  <img src="images/logo.png" alt="Image" class="img-fluid">
                </a>
              </div>
            </div>

            <div class="col-9  text-right">
              

              <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>

              

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li class="active"><a href="index.php" class="nav-link">Home</a></li>
                  <!-- <li><a href="blog.php" class="nav-link">Blog</a></li> -->
                  <li><a data-toggle="modal" data-target="#exampleModal" class="nav-link">Login</a></li>
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>

          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <div class="form-wrap">
              <div class="tabs">
                <h3 class="signup-tab"><a class="active" href="#signup-tab-content">Sign Up</a></h3>
                <h3 class="login-tab"><a href="#login-tab-content">Login</a></h3>
              </div><!--.tabs-->
        
              <div class="tabs-content">
                <div id="signup-tab-content" class="active">
                  <form class="signup-form" action="" method="post">
                    <input type="text" class="input" id="first_name" name="first_name" autocomplete="off" placeholder="First Name">
                    <input type="text" class="input" id="last_name" name="last_name" autocomplete="off" placeholder="Last Name">
                    <input type="email" class="input" id="email" name="email" autocomplete="off" placeholder="Email">
                    <input type="text" class="input" id="mobile" name="mobile" autocomplete="off" placeholder="Mobile">
                    <input type="password" class="input" id="pass" name="password" autocomplete="off" placeholder="Password">
                    <input type="submit" class="btn btn-block btn-primary text-white py-3 px-4 btnsignup" data-dismiss="modal" value="Sign Up">
                  </form><!--.login-form-->
                  <div class="help-text">
                    <!-- <p>By signing up, you agree to our</p> -->
                    <!-- <p><a href="#">Terms of service</a></p> -->
                  </div><!--.help-text-->
                </div><!--.signup-tab-content-->
        
                <div id="login-tab-content">
                  <form class="login-form" action="" method="post">
                    <input type="text" class="input" id="user_login" name="user_name" autocomplete="off" placeholder="Email or Mobile">
                    <input type="password" class="input" id="user_pass" name="password" autocomplete="off" placeholder="Password">
                    <input type="checkbox" class="checkbox" id="remember_me">
                    <!-- <label for="remember_me">Remember me</label> -->
        
                    <input type="submit" class="btn btn-block btn-primary text-white py-3 px-4 btnlogin" data-dismiss="modal" value="Login">
                  </form><!--.login-form-->
                  <div class="help-text">
                    <p><a href="#">Forget your password?</a></p>
                  </div><!--.help-text-->
                </div><!--.login-tab-content-->
              </div><!--.tabs-content-->
            </div><!--.form-wrap--> 
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/login.js"></script>