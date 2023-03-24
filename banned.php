<?php

session_name("BRICK-SESSION");
session_start();
include('SiT_3/config.php');



$currentID = $_SESSION['id'];

$bannedSQL = "SELECT * FROM `moderation` WHERE `active`='yes' AND `user_id`='$currentID'";
  $banned = $conn->query($bannedSQL);
  if($banned->num_rows != 0) {
    $bannedRow = $banned->fetch_assoc();
    $banID = $bannedRow['id'];
    $currentDate = strtotime($curDate);
    $banEnd = strtotime($bannedRow['issued'])+($bannedRow['length']*60);
    
    
  

?>
<html>
  <head>
    <link rel="stylesheet" href="/style.css" type="text/css">
    <title>Banned - Talka-boutit</title>
  </head>
      <body>
        <div id="body">
          <div id="box">
            <h3>
              
            Account Blocked
            </h3>
  <p class="intro">
        <p> &nbsp; The Talka-Boutit team has decided to block the account</p>
            &nbsp; <?php if($loggedIn) {echo  $userRow->{'username'}.'</a></div>';}
     ?>
                      <div id="box">
<div style="margin:10px">
              Date: <?php echo gmdate('m/d/Y',strtotime($bannedRow['issued'])); ?> <br>
              Moderator Note:<br>
              <div style="border:1px solid;width:400px;height:150px;background-color:#F9FBFF">
                <?php echo  $bannedRow['admin_note']; ?>
              </div>
  Community Guidelines:
<ul>
<li>• Be respectful to all users and staff of the website.</li>
<li>• Be civil, and don't post inappropriate things on the forums.  </li>
<li>• Follow the Terms of Service, and the community guidelines, so the site is safe for everyone.</li>
<li>• Don't be rude to others who use the website.</li>
</ul>

    <?php 
    if($currentDate >= $banEnd) {
      if(isset($_POST['unban'])) {
        $unbanSQL = "UPDATE `moderation` SET `active`='no' WHERE `id`='$banID'";
        $unban = $conn->query($unbanSQL);
        header("Refresh:0");
      }
      ?>You can now reactivate your account<br>
      <form action="" method="POST">
        <input type="submit" name="unban" value="Reactivate my account">
      </form>
      <?php
    } else {
           if($bannedRow['length'] >= 36792000) echo 'Your account has been permanently disabled.'; //if the account was banned forever.
else
      echo 'Your account has been disabled. You may re-activate it after '  .  date('m-d-Y H:i:s',$banEnd); //if the account was banned temporarily.
      



    }?>
            </div>
          </div>
        </div>
  <?php 
  }
  ?>

        <?php



 


?>
         <div id="body">
          <div id="box">
            <h3>
              
            Appeals
            </h3>
            <div style="margin:10px">
              You may file an appeal by contacting us on our <a href="https://discord.gg/P5cY9Q59SS">Discord Server.</a>
<ul>
<li>• Show a screenshot of your ban to a moderator by messaging them.</li>
<li>• Be reasonable, and do not argue with our moderation team.  </li>
<li>• We do not accept appeals from those who intentionally break the Terms of Service.</li>
<li>• Do not appeal a ban that is less than 10 minutes long.</li>
</ul>
  </body>