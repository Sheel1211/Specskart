<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css">
  <title>Document</title>
</head>

<body>

</body>

</html>
<?php
session_start();
include('../DB/db_conn.php');
$status = "";
if (isset($_POST['code']) && $_POST['code'] != "") {
  $code = $_POST['code'];
  $result = mysqli_query(
    $conn,
    "SELECT * FROM `products` WHERE `code`='$code'"
  );
  $row = mysqli_fetch_assoc($result);
  $name = $row['name'];
  $code = $row['code'];
  $price = $row['price'];
  $image = $row['image'];

  $cartArray = array(
    $code => array(
      'name' => $name,
      'code' => $code,
      'price' => $price,
      'quantity' => 1,
      'image' => $image
    )
  );

  if (empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
  } else {
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if (in_array($code, $array_keys)) {
      $status = "<div class='box' style='color:red;'>
	Product is already added to your cart!</div>";
    } else {
      $_SESSION["shopping_cart"] = array_merge(
        $_SESSION["shopping_cart"],
        $cartArray
      );
      $status = "<div class='box'>Product is added to your cart!</div>";
    }
  }
}
?>
<nav class="navbar">
  <i class="material-icons menu-icon">
    menu
  </i>
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

<div class="products">
  <h1>Featured Products</h1>
  <div class="cards">

    <?php
    $result = mysqli_query($conn, "SELECT * FROM `products`");
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<div class='product_wrapper'>
  <form method='post' action=''>
  <input type='hidden' name='code' value=" . $row['code'] . " />
  <div class='image'><img src='../" . $row['image'] . "' /></div>
  <div class='name'>" . $row['name'] . "</div>
  <div class='price'>₹" . $row['price'] . "</div>
  <button type='submit' class='buy'>Buy Now</button>
  </form>
  </div>";
    }
    mysqli_close($conn);
    ?>
  </div>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
  <?php echo $status; ?>
</div>
<!-- footer starts  -->
<footer>
  <div class="row">
    <div class="col">
      <img src="./img/logo.png" class="footer_logo">
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


<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>