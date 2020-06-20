<?php
	session_start();
	
	
	$file = fopen("session_info.txt", "r");
	$_SESSION["name"]=fgets($file);
    $username = fgets($file);
    echo $username; 
    fclose($file) ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
</head>
<body>
        <nav class="navbar navbar-expand-md navbar-dark" style="background: #CB0648">
                <!-- Brand -->
                <a class="navbar-brand" href="#">Food Village</a>
                <a href="#" class="previous round">&#8249;</a>
              
                <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <!-- Navbar links -->
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                      
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="Food_Delivery.html"><i class="fas fa-sign-out-alt"></i>&nbsp; Logout &nbsp;</a>
                    </li> 
                  </ul>
                </div> 
              </nav>
              
              <div class="container">
                  <div class="row mt-2 pb-3">
                      <?php
                      include 'config.php';
                      $stmt = $conn->prepare("SELECT * FROM restaurants");
                      $stmt->execute();
                      $result = $stmt->get_result();
                      while($row = $result->fetch_assoc()):
                      ?>
                      <div class="col-12 col-sm-6 col-md-4 col-lg-3" >
                      <div class="card-deck" id="results">
                              <div class="card p-2 border-secondary mb-2">
                              <form method="get" action="ProductPage.php">

                                  <img src="rest_image/<?= $row['restIcon']?>" class="card-img-top" height="250">
                                  <div class="card-body p-1">
                                  <h4 class="card-title text-center" style="color: #CB0648"><?= $row['restName']?></h4>                                                                      
                                    <input type="hidden" name="varname" value="<?=$row['restId']?>">
                                    <button class="btn btn-link btn-block" type="submit" style="background: #CB0648; color: #FFFFFF"><i class="fas fa-angle-double-right"></i> Visit Restaurant</button>
                                    
                                  </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                      <?php endwhile; ?>
                  </div>
              </div>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>