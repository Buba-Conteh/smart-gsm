<?php
session_start();


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="../../../../favicon.ico"> -->

    <title>Floating labels example for Bootstrap</title>
 
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!-- <link href="floating-labels.css" rel="stylesheet"> -->
  </head>

  <body>
    <div class="container">

    
    <div class="col-6 offset-2 mt-5">
    <?php
  if (isset($_SESSION['failed'])) {
    $masage=$_SESSION['failed'];
    echo "<div class=\"alert alert-danger mt-2\"> $masage</div>";
    unset($_SESSION['failed']);
  }
  
  ?>
           <div class="card shadow ">
             
             <div class="card-header">
               <h2> Sine In As User</h2>
             </div>
             <div class="card-body">
              <form action="process-login.php" method="POST">

                <div class="col-sm-12">
                <input type="email" name="email" class="form-control" id="staticEmail" value="email@example.com" required>
                </div>

                
                <!-- <div class="form-group row"> -->
                <!-- <label for="inputPassword" class="col-sm-2 col-form-label">Password</label> -->
                <div class="col-sm-12">
                <input type="password"  class="form-control" id="inputPassword" name="password" placeholder="Password" required>
                
                </div>
                
                <a href="#">Forgot your password</a>

                <button type="submit" name="sineUp" class="btn form-control btn-outline-primary mt-3"><b>Sine In</b></button>

              </form>
             </div>
           </div>
          </div>

                </div>
            </div>
        </form> -->
    </div>
    
  </body>
</html>
