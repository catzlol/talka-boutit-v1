<?php
include('../../SiT_3/config.php');
include('../../SiT_3/header.php');

if(!$loggedIn) {header('Location: ../'); die();}

?>

<!DOCTYPE html>
  <head>
    <title>Upload - TDBDNH 3</title>
  </head>
  <body>
    <div id="body">
      <div id="box" style="text-align:center;">
        <h3>Upload</h3>
        <div style="display:inline-block;">
          <a style="font-weight:bold;font-size:18px;color:#333;margin:5px;" href="tshirt"><img src="_tshirt.png"><br>T-Shirt</a>
        </div>
        <div style="display:inline-block;">
          <a style="font-weight:bold;font-size:18px;color:#333;margin:5px;" href="shirt"><img src="_shirt.png"><br>Shirt</a>
        </div>
        <div style="display:inline-block;">
          <a style="font-weight:bold;font-size:18px;color:#333;margin:5px;" href="pants"><img src="_pants.png"><br>Pants</a>
        </div>
        <?php 
        if ($power >= 1) {
          ?> 
          <div style="display:inline-block;">
            <a style="font-weight:bold;font-size:18px;color:#333;margin:5px;" href="hat"><img src="_hat.png"><br>Hat</a>
          </div>
          <div style="display:inline-block;">
            <a style="font-weight:bold;font-size:18px;color:#333;margin:5px;" href="tool"><img src="_pants.png"><br>Tool</a>
          </div>
<div style="display:inline-block;">
            <a style="font-weight:bold;font-size:18px;color:#333;margin:5px;" href="face"><img src="_shirt.png"><br>Face</a>
          </div>
<div style="display:inline-block;">
<a style="font-weight:bold;font-size:18px;color:#333;margin:5px;" href="head"><img src="_shirt.png"><br>Head</a>
</div>
<div style="display:inline-block;">
<a style="font-weight:bold;font-size:18px;color:#333;margin:5px;" href="/shop/help/"><img src="_hat.png"><br>Hat, Head and Tool Exporting Guide</a>
        
          </div>
          <?php
        }
        ?>
      </div>
    </div>
  <?php include('../../SiT_3/footer.php'); ?>
  </body>
</html>