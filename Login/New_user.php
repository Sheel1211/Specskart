<?php 
session_start();
include "db_conn.php";
if (isset($_POST['uname']) && isset($_POST['psword']) && isset($_POST['psword1']))
{
  function validate($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
  }
  $uname=validate($_POST['uname']);
  $pass=validate($_POST['psword']);
  
  if(empty($uname)){
    header("location: index.php?error=Username is required");
    exit();
  }
  else if(empty($pass))
  {
    header("location: index.php?error=Password is required");
    exit();
  }
  else{
    $sql="Select * from users where Username='$uname' AND pass_word='$pass'";
    $result=mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)===1)
    {
        $row=mysqli_fetch_assoc($result);
        if($row['Username']===$uname && $row['pass_word']=== $pass){
           $_SESSION['Username']=$row['Username'];
           $_SESSION['name']=$row['name'];
           $_SESSION['id']=$row['id'];
           header("location: home.php");
           exit();
        }
        
    }
    else{
        header("location: index.php?error=Username or Password is incorrect");
        exit();
    }
  }
}

else{
    header("location: index.php");
    exit();
}
?>

<html>
<head>
<title>
login
</title>
<link rel="stylesheet" type="text/css" href="looks.css">
</head>
<body>
<form action="login.php" method="post">
<h1>Welcome to Specskart</h1>
<?php
if(isset($_GET['error'])){ ?>
<p class="error"><?php echo $_GET['error']; ?></p>
<?php } ?>
<label>Username</label>
<input type="text" name="uname" placeholder="Username">
<label>Password</label>
<input type="password" name="psword" placeholder="Password">
<label>Confirm Password</label>
<input type="password" name="psword1" placeholder="Password">
</form>
</body>
</html>