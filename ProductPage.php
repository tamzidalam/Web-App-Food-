<?php 
session_start();
//$restid=$_GET['varname'];
$connect = new PDO("mysql:host=localhost;dbname=webtech", "root", "");

$message = '';

if(isset($_POST["add_to_cart"]))
{
 if(isset($_COOKIE["shopping_cart"]))
 {
  $cookie_data = stripslashes($_COOKIE['shopping_cart']);

  $cart_data = json_decode($cookie_data, true);
 }
 else
 {
  $cart_data = array();
 }

 $item_id_list = array_column($cart_data, 'item_id');

 if(in_array($_POST["hidden_id"], $item_id_list))
 {
  foreach($cart_data as $keys => $values)
  {
   if($cart_data[$keys]["item_id"] == $_POST["hidden_id"])
   {
    $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"];
   }
  }
 }
 else
 {
  $item_array = array(
   'item_id'   => $_POST["hidden_id"],
   'item_name'   => $_POST["hidden_name"],
   'item_price'  => $_POST["hidden_price"],
   'item_quantity'  => $_POST["quantity"]
  );
  $cart_data[] = $item_array;
 }

 
 $item_data = json_encode($cart_data);
 setcookie('shopping_cart', $item_data, time() + (86400 * 30));
 header("location:ProductPage.php?success=1");
}

if(isset($_GET["action"]))
{
 if($_GET["action"] == "delete")
 {
  $cookie_data = stripslashes($_COOKIE['shopping_cart']);
  $cart_data = json_decode($cookie_data, true);
  foreach($cart_data as $keys => $values)
  {
   if($cart_data[$keys]['item_id'] == $_GET["id"])
   {
    unset($cart_data[$keys]);
    $item_data = json_encode($cart_data);
    setcookie("shopping_cart", $item_data, time() + (86400 * 30));
    header("location:ProductPage.php?remove=1");
   }
  }
 }
 if($_GET["action"] == "clear")
 {
  setcookie("shopping_cart", "", time() - 3600);
  header("location:ProductPage.php?clearall=1");
 }
}

if(isset($_GET["success"]))
{
 $message = '
 <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Item Added into Cart
 </div>
 ';
}

if(isset($_GET["remove"]))
{
 $message = '
 <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  Item removed from Cart
 </div>
 ';
}
if(isset($_GET["clearall"]))
{
 $message = '
 <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  Cart has been clear...
 </div>
 ';
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
</head>
<body>
        <nav class="navbar navbar-expand-md navbar-dark" style="background: #CB0648">
                <!-- Brand -->
                <a class="navbar-brand" href="HomePage.php">Food Village</a>
                
              
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
   <br />
  
   <br /><br />
   <?php
   
   
    $restid=!empty($_GET['varname'])?$_GET['varname'] : '';
    
    if($restid!= ''){
      $_SESSION['restid']=$restid;
    }
  
    if($restid == ''){
      $restid=$_SESSION['restid'];
    }
    

   
   
   $query = "SELECT * FROM pizza where product_code='$restid' ORDER BY id ASC";
   $statement = $connect->prepare($query);
   $statement->execute();
   $result = $statement->fetchAll();
   foreach($result as $row)
   {
   ?>

   <div class="col-md-3">
    <form method="post">
     <div style="border:1px   border-radius:5px; padding:16px ; align= center">
      <img src="images/<?php echo $row["image"]; ?>" class="img-responsive" /><br />

      <h4 class="text-info"><?php echo $row["name"]; ?></h4>

      <h4 class="text-danger">TK <?php echo $row["price"]; ?></h4>

      <input type="text" name="quantity" value="1" class="form-control" />
      <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
      <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
      <input type="hidden" name="hidden_id" value="<?php echo $row["id"]; ?>" />
      <input type="submit" name="add_to_cart" style="margin-top:5px; background-color: #CB0648; " class="btn btn-success" value="Add to Cart" />
     </div>
    </form>
   </div>

   <?php
   }
   ?>
   
   
   <div style="clear:both"></div>
   <br />
   <h3 style=" color: #000000;" >Cart</h3>
   <div class="table-responsive">
   <?php echo $message; ?>
   <div align="right">
    <a href="ProductPage.php?action=clear"><b>Clear Cart</b></a>
   </div>
   <table class="table table-bordered" style=" color: #000000;">
    <tr>
     <th width="40%">Item Name</th>
     <th width="10%">Quantity</th>
     <th width="20%">Price</th>
     <th width="15%">Total</th>
     <th width="5%">Action</th>
    </tr>
   <?php
   if(isset($_COOKIE["shopping_cart"]))
   {
    $total = 0;
    $cookie_data = stripslashes($_COOKIE['shopping_cart']);
    $cart_data = json_decode($cookie_data, true);
    foreach($cart_data as $keys => $values)
    {
   ?>
    <tr>
     <td><?php echo $values["item_name"]; ?></td>
     <td><?php echo $values["item_quantity"]; ?></td>
     <td>$ <?php echo $values["item_price"]; ?></td>
     <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
     <td><a href="ProductPage.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger" style=" color: #000000;">Remove</span></a></td>
    </tr>
   <?php 
     $total = $total + ($values["item_quantity"] * $values["item_price"]);
    }
   ?>
    <tr>
     <td colspan="3" align="right">Total</td>
     <td align="right">$ <?php echo number_format($total, 2); ?></td>
     <td></td>
    </tr>
   <?php
   }
   else
   {
    echo '
    <tr>
     <td colspan="5" align="center">No Item in Cart</td>
    </tr>
    ';
   }
   ?>
   </table>
   <button class="btn btn-link btn-block" type="submit" style="background: #CB0648; color: #FFFFFF"><a href="checkout.php" style="color:#FFFFFF"><i class="far fa-check-square"></i> Checkout</a>
            </button>
   </div>
  </div>
  <br />
 </body>
</html>
