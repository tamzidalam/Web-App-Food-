<?php
    session_start();
    if(isset($_GET['varname'])){
        $var_value = $_GET['varname'];
        $_SESSION['var'] = $var_value;
         }
       //echo $var_value;
    $con = mysqli_connect("localhost","root","","webtech");
    if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_GET["id"],
                    'item_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                );
                $_SESSION["cart"][$count] = $item_array;
                //echo '<script>window.location="ProductPage.php"</script>';
            }else{
                echo '<script>window.alert("Item already added \nIf you want to change the quantity then remove the item and add it again")</script>';
                //echo '<script>window.location="ProductPage.php"</script>';
            }
        }else{
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }
    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["product_id"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    //echo '<script>alert("Product has been Removed...!")</script>';
                    //echo '<script>window.location="ProductPage.php"</script>';
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Page</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');
        *{
            font-family: 'Titillium Web', sans-serif;
        }
    </style>
</head>
<body>
        <nav class="navbar navbar-expand-md navbar-dark" style="background: #CB0648">
                <!-- Brand -->
                <a class="navbar-brand" href="#">food village</a>
              
                <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <!-- Navbar links -->
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                      <a class="nav-link" href="profile.php"><i class="fas fa-user"></i>&nbsp; Profile &nbsp;</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp; Logout &nbsp;</a>
                    </li> 
                  </ul>
                </div> 
              </nav>
              <div>
                  <button class="btn btn-link" type="submit" style="color: #CB0648;"><a href="HomePage.php" style="color: #CB0648;"><i class="fas fa-arrow-left"></i></a></button>
              </div>
              <div class="container">
                  <div class="row mt-2 pb-3">
                  <?php

                    $var_val= $_SESSION['var'];

                   
                   $query = "SELECT * FROM pizza  WHERE restId='$var_val' ORDER BY id ASC";
                     $result = mysqli_query($con,$query);
                         if(mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                      <form method="post" action="ProductPage.php?action=add&id=<?php echo $row["id"]; ?>">
                          <div class="card-deck">
                              <div class="card p-2 border-secondary mb-2">
                                  <img src="pro_image/<?php echo $row["product_image"]; ?>" class="card-img-top" height="250">
                                  <div class="card-body p-1">
                                      <h4 class="card-title text-center text-info"><?php echo $row["product_name"]; ?></h4>
                                      <h5 class="card-text text-center text-danger"><i class="fas fa-money-bill"></i>&nbsp;<?php echo $row["product_price"]; ?></h5>
                                      <input type="text" name="quantity" class="form-control" value="1">
                                      <input type="hidden" name="hidden_name" value="<?php echo $row["product_name"]; ?>">
                                      <input type="hidden" name="hidden_price" value="<?php echo $row["product_price"]; ?>">
                                      <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"
                                       value="Add to Cart">
                                       
                                    </div>
                                  <div class="card-footer p-1">
                                      <a href=""></a>
                                  </div>
                              </div>
                          </div>
                      </div>
                      </form>
                            <?php }} ?> 
                  </div>
              </div>
              <h3 style="color: #CB0648"><i class="fas fa-shopping-cart"></i> Cart</h3>
            <div class="table-responsive-sm">
            <table class="table table-hover table-bordered">
            <thead style="background: #CB0648">
            <tr>
                <th width="30%" class="text-white-50">Product Name</th>
                <th width="10%" class="text-white-50">Quantity</th>
                <th width="13%" class="text-white-50">Price Details</th>
                <th width="10%" class="text-white-50">Total Price</th>
                <th width="17%" class="text-white-50">Remove Item</th>
            </tr>
            </thead>
            <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <tbody>
                        <tr>
                            <td><?php echo $value["item_name"]; ?></td>
                            <td><?php echo $value["item_quantity"]; ?></td>
                            <td>$ <?php echo $value["product_price"]; ?></td>
                            <td>
                                $ <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>
                            <td><a href="ProductPage.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                                        class="text-danger"><i class="fas fa-times"></i> Remove</span></a></td>

                        </tr>
                        <?php
                        $total = $total + ($value["item_quantity"] * $value["product_price"]);
                    }
                        ?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right">$ <?php echo number_format($total, 2); ?></th>
                            <td></td>
                        </tr>
                        <?php
                    }
                ?>
                </tbody>
            </table>
            <button class="btn btn-link btn-block" type="submit" style="background: #CB0648; color: #FFFFFF"><a href="checkout.php" style="color:#FFFFFF"><i class="far fa-check-square"></i> Checkout</a>
            </button>
        </div>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>