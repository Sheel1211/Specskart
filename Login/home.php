<?php
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['Username']))
{

?>

<html>
<head>
<title>
Home
</title>

</head>
<body>
    <h2>Hello,<?php echo $_SESSION['name']; ?></h2><br>
    <a href="logout.php">Logout</a>
</body>
</html>
<?php
}
else{
    header("location: index.php");
     exit();
}