<?php
session_name("BRICK-SESSION");
session_start();
include('SiT_3/config.php');

$currentID = $_SESSION['id'];

$bannedSQL = "SELECT * FROM `moderation` WHERE `active`='yes' AND `user_id`='$currentID'";
$banned = $conn->query($bannedSQL);

if ($banned->num_rows != 0) {
    $bannedRow = $banned->fetch_assoc();
    $banID = $bannedRow['id'];
    $currentDate = strtotime($curDate);
    $banEnd = strtotime($bannedRow['issued']) + ($bannedRow['length'] * 60);
?>

<html>

<head>
    <link rel="stylesheet" href="/style.css" type="text/css">
    <style>
        .admin-note {
            border: 1px solid;
            width: 400px;
            max-width: 100%;
            background-color: #F9FBFF;
            margin-bottom: 10px;
            padding: 10px;
            overflow: auto; /* Enable scrolling if the content exceeds the box height */
        }
    </style>
    <title>
        <?php
        if ($bannedRow['length'] == 0) {
            echo "Moderation Warning";
        } else {
            echo "Banned - Talka-boutit";
        }
        ?>
    </title>
</head>

<body>
    <div id="body">
        <div id="box">
            <div style="margin:10px;">
                <?php
                if ($bannedRow['length'] == 0) {
                    echo '<h3>Account Warning</h3>';
                } else {
                    echo '<h3>Account Blocked</h3>';
                }
                ?>
                <p class="intro">
                    <p>&nbsp; The Talka-Boutit team has decided to
                        <?php
                        if ($bannedRow['length'] == 0) {
                            echo 'warn the account of';
                        } else {
                            echo 'block the account of';
                        }
                        ?>
                    </p>
                    &nbsp; <?php if ($loggedIn) {
                                echo  $userRow->{'username'} . '</a></div>';
                            } ?>
                    <div style="padding-left: 10px;">
                        Date: <?php echo gmdate('m/d/Y', strtotime($bannedRow['issued'])); ?> <br>

                        <?php if (!empty($bannedRow['offensive_content'])) { ?>
                            Offensive Content:<br>
                            <div class="admin-note">
                                <?php echo $bannedRow['offensive_content']; ?>
                            </div>
                        <?php } ?>

                        Moderator Note:<br>
                        <div class="admin-note">
                            <?php
                            if (!empty($bannedRow['admin_note'])) {
                                echo $bannedRow['admin_note'];
                            } else {
                                echo 'Your account has been ';
                                if ($bannedRow['length'] == 0) {
                                    echo 'warned by an admin for a violation of the Community Guidelines.';
                                } else {
                                    echo 'blocked by an admin for a violation of the Community Guidelines.';
                                }
                            }
                            ?>
                        </div>

                        Community Guidelines:
                        <ul style="padding-left: 10px;">
                            <li>• Be respectful to all users and staff of the website.</li>
                            <li>• Be civil, and don't post inappropriate things on the forums. </li>
                            <li>• Follow the Terms of Service, and the community guidelines, so the site is safe for everyone.</li>
                            <li>• Don't be rude to others who use the website.</li>
                        </ul>

                        <p style="padding-left: 10px;">You may submit an appeal to <a href="mailto:appeals@catzlol12.ct8.pl">appeals@catzlol12.ct8.pl</a> if you feel you have been wrongfully banned.</p>

                        <?php
                        if ($currentDate >= $banEnd) {
                            if (isset($_POST['unban'])) {
                                $unbanSQL = "UPDATE `moderation` SET `active`='no' WHERE `id`='$banID'";
                                $unban = $conn->query($unbanSQL);
                                header("Refresh:0");
                            }
                        ?>
                            <p style="padding-left: 10px;">You can now reactivate your account</p>
                            <form action="" method="POST">
                                <input type="submit" name="unban" value="Reactivate my account">
                            </form>
                        <?php
                        } else {
                            if ($bannedRow['length'] >= 36792000) {
                                echo '<p style="padding-left: 10px;">Your account has been permanently disabled.</p>'; //if the account was banned forever.
                            } else {
                                echo '<p style="padding-left: 10px;">Your account has been disabled. You may re-activate it after '  .  date('m-d-Y H:i:s', $banEnd) . '</p>'; //if the account was banned temporarily.
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    }
    ?>
    <?php
    ?>
</body>

</html>
