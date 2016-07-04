<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>EGyaan</title>  
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="description" content="">
        <meta name="keywords" content=" ">
        <meta name="author" content="Huban Creative">

        <!-- Base Css Files -->
       
        <link href="../style/css/animate.min.css" rel="stylesheet" />
        
        <!-- Code Highlighter for Demo -->
        
                <!-- Extra CSS Libraries Start -->
                <link href="../style/style.css" rel="stylesheet" type="text/css" />
                <!-- Extra CSS Libraries End -->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <link rel="shortcut icon" href="assets/img/favicon.ico">
    </head>
    <body class="fixed-left login-page">
        <!-- Modal Start -->
          <!-- Modal Task Progress -->  
  
    
    
  <!-- Begin page -->
  <div class="container">
    <div class="full-content-center">
      <div class="login-wrap animated flipInX">
        <div class="login-block">
          <img src="../style/images/logo.png" alt="Logo"></p>
          Teacher Login<br><br>
          <form role="form" action="Login_form.php" method="post">
            <div class="form-group login-input">
            <i class="fa fa-user overlay"></i>
            <input type="text" name="usr" id="usr" class="form-control text-input" placeholder="Username">
            </div>
            <div class="form-group login-input">
            <i class="fa fa-key overlay"></i>
            <input type="password" name="pwd" id="pwd" class="form-control text-input" placeholder="********">
            </div>
            
            <div class="row">
              <div class="col-sm-12">
              <button type="submit" class="btn btn-orange-1 btn-block" id="login">LOGIN</button>
              </div>
              
            </div>
          </form>
          <i> Username: np@gmail.com</i><br><i>Password: np123</i>
        </div>
      </div>
      <strong><a href="../">Back To Select Login</a></strong><br><br>
      <div id="error"></div>
      
    </div>
  </div>
  <!-- the overlay modal element -->
  <div class="md-overlay"></div>
  <!-- End of eoverlay modal -->
  <script>
    var resizefunc = [];
  </script>

  <script src="../JQuery/jquery.min.js"></script>
  <script src="JQuery/login.js"></script>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

  <!-- Demo Specific JS Libraries -->

  </body>
</html>
