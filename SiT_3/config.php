<?php
 error_reporting(0);
  
  
 
file_put_contents("/home/bricflrb/public_html/SiT_3/connections.txt",$_SERVER['REMOTE_ADDR']."\n", FILE_APPEND | LOCK_EX);
  

  $conn = mysqli_connect( "localhost" , "db name", "db password" , "db login");
  
  if(!$conn) {
    //include("site/maint.php");
    die("Database Error");
  }
  
  
  
  //sorry, but every page should require a session -lukey
  if(session_status() == PHP_SESSION_NONE) {
    session_name("BRICK-SESSION");
    session_start();
  }
?>
<?php
