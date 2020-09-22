    <?php include_once('header.php'); ?>
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
                    <input type="email" class="input" id="user_email" autocomplete="off" placeholder="Email">
                    <input type="text" class="input" id="user_name" autocomplete="off" placeholder="Username">
                    <input type="password" class="input" id="user_pass" autocomplete="off" placeholder="Password">
                    <input type="submit" class="btn btn-block btn-primary text-white py-3 px-4" value="Sign Up">
                  </form><!--.login-form-->
                  <div class="help-text">
                    <!-- <p>By signing up, you agree to our</p> -->
                    <!-- <p><a href="#">Terms of service</a></p> -->
                  </div><!--.help-text-->
                </div><!--.signup-tab-content-->
        
                <div id="login-tab-content">
                  <form class="login-form" action="" method="post">
                    <input type="text" class="input" id="user_login" autocomplete="off" placeholder="Email or Username">
                    <input type="password" class="input" id="user_pass" autocomplete="off" placeholder="Password">
                    <input type="checkbox" class="checkbox" id="remember_me">
                    <label for="remember_me">Remember me</label>
        
                    <input type="submit" class="btn btn-block btn-primary text-white py-3 px-4" value="Login">
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