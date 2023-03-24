
# talka-boutit

Talk-aboutit is a modification of the brick hill 2o17 website. Its supposed to resemble an old forum website.

# Setting up

You will need

- A web host that supports php
- PHPMyadmin
- MYSql
- A brain

Talka-boutit was originally set up in ct8.pl. You may set it up in any hosting service that supports PHP.

Setup mysql and PHPMyadmin and then download the sql file included.

Go to SiT_3\config.php and connect the db

  $conn = mysqli_connect( "localhost" , "db name", "db password" , "db login");

# Editing users permissions

In PHPMYADMIN, go to the users tab, and edit the user you want. 

You can set the user's power to 6 for full admin privliges.