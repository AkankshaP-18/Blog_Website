     <style type="text/css">
       .active
       {
        /*color: orange;*/
       }
     </style>
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
                <ul class="site-menu main-menu js-clone-nav ml-auto" id="nav">
                  <li><a href="index.php" class="nav-link">Home</a></li>
                  <li><a href="blog.php" class="nav-link">Blog</a></li>
                  <li><a href="../logout.php" class="nav-link">Logout</a></li>
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>
      <script src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  $(function() {
      $('#nav a[href^="/' + location.pathname.split("/")[1] + '"]').addClass('active');
  });
  // $(function(){
  //     var current = location.pathname;
  //     // alert(current);
  //     $('#nav li a').each(function(){
  //         var $this = $(this);
  //         // if the current path is like this link, make it active
  //         if($this.attr('href').indexOf(current) !== -1){
  //           // alert(123);
  //             $this.addClass('active');
  //         }
  //         else
  //         {
  //           // alert(111);
  //         }
  //     })
  // })
});
</script>