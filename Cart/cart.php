<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Document</title>
</head>
<body>
    
  <?php
session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["code"] == $key){
      unset($_SESSION["shopping_cart"][$key]);
      $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
      }
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
      }		
    }
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
      $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}

}
?>
<nav class="navbar">
  
  <div class="logo">
    <img src="../logo.png" alt="logo">
    <div class="text"> Specskart
    </div>
  </div>
  <div class="item search right" tabindex="0">
    <div class="search-group">
      <select>
        <option value="all">All</option>
        <option value="all">Spectacles</option>
        <option value="all">Eye Glasses</option>
        <option value="all">Contact Lenses </option>
        <option value="all">Sun Glasses</option>
      </select>
      <input type="text">
      <i class="material-icons search-icon">
        search
      </i>
    </div>
  </div>


  <a href="../index.php" class="  item">

    <div class="group">
      <i class="material-icons">
        account_circle
      </i>
      <div class="detail">
        Account
        <div class="sub">Sign In</div>
      </div>
    </div>
  </a>
  
  <a href="" class="item">
    <div class="group">
      

      <?php
      if (!empty($_SESSION["shopping_cart"])) {
        $cart_count = count(array_keys($_SESSION["shopping_cart"]));
      ?>
        <div class="cart_div">
          <a href="cart.php"><i class="material-icons">
            shopping_cart
            </i>
            <div class="detail">
              Cart<span>
                <?php echo $cart_count; ?></span></div>
          </a>
        </div>
        <?php
      }
      ?>
    </div>
  </a>
</nav>
<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
  $total_price = 0;
  ?>	
<table class="table">
<tbody>
  <tr>
    <td></td>
    <td>ITEM NAME</td>
    <td>QUANTITY</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>
</tr>	
<?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
  <td>
<img src='<?php echo "../".$product["image"]; ?>' width="50" height="40" />
</td>
<td><?php echo $product["name"]; ?><br />
<form method='post' action=''>
  <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onChange="this.form.submit()">
  <option <?php if($product["quantity"]==1) echo "selected";?>
value="1">1</option>
<option <?php if($product["quantity"]==2) echo "selected";?>
  value="2">2</option>
<option <?php if($product["quantity"]==3) echo "selected";?>
value="3">3</option>
<option <?php if($product["quantity"]==4) echo "selected";?>
value="4">4</option>
<option <?php if($product["quantity"]==5) echo "selected";?>
value="5">5</option>
</select>
</form>
</td>
<td><?php echo "₹".$product["price"]; ?></td>
<td><?php echo "₹".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "₹".$total_price; ?></strong>
</td>
</tr>
<tr>
  <td>

    <button class="place-order place-order--default">
      <div class="default text">Place Order</div>
      <div class="forklift">
    <div class="upper"></div>
    <div class="lower"></div>
  </div>
  <div class="box animation"></div>
  <div class="done text">Done</div>
</button>	
</td>
</tr>
</tbody>
</table>
<?php
}else{
	echo "<h3>Your cart is empty!</h3>";
	}
?>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
  <?php echo $status; ?>
</div>

<!-- footer starts  -->
<footer style="margin-top:20vmax">
  <div class="row">
    <div class="col">
      <img src="../logo.png" class="footer_logo">
      <p class="footer_about">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Obcaecati commodi earum totam sapiente non ab exercitationem perspiciatis, maxime quasi. Adipisci similique non fugit obcaecati eos quidem officia laboriosam esse a ab neque cupiditate nulla cumque, vero id eligendi harum rem repudiandae illum tempora, corporis sunt.
        
        </p>
    </div>
    <div class="col">
      <h3>Reach Us <div class="bottom_line"><span></span></div>
    </h3>
      <a href="">
        <p style="line-height:0.5">GCET College</p>
        <p>Vallabh Vidyanagar,Anand </p>
      </a>
      <p class="footer_email"><a href="specskart@gmail.com">
          specskart@gmail.com</a></p>
      <h4>+91 9898989898</h4>
    </div>
    <div class="col">
      <h3>Links <div class="bottom_line"><span></span></div>
      </h3>
      <ul>
        <li><a href="">HOME</a></li>
        <li><a href="">ABOUT US</a></li>
        <li><a href="">EVENTS</a></li>
        <li><a href="">TEAM</a></li>
        <li><a href="">CONTACT US</a></li>
      </ul>
    </div>
    <div class="col">
      <h3>Follow Us<div class="bottom_line"><span></span></div>
      </h3>

      <div class="social_icons">
        <a href="">
          <ion-icon class="social_icon" name="logo-facebook"></ion-icon>
        </a>
        <a href="">
          <ion-icon class="social_icon" name="logo-linkedin"></ion-icon>
        </a>
        <a href="">
          <ion-icon class="social_icon" name="logo-twitter"></ion-icon>
        </a>
        <a href="">
          <ion-icon class="social_icon" name="logo-instagram"></ion-icon>
        </a>
      </div>
    </div>
  </div>
  <hr>
  <p class="copyright">Specskart © 2022 | All Rights Reserved</p>
</footer>
</body>
<script src="../Login/script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</html>