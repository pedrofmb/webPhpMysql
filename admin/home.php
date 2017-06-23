<?php
ini_set("session.gc_maxlifetime", "18000");
session_cache_expire(18000);
session_start();

require '../connect.php';
$link = Conectar();

if($_SESSION["user_id"]=='')
{
    echo "session error";
    echo "<script>location.replace('index.html')</script>";
    die();
}

?>

<!DOCTYPE html>

<html lang="en">
    <head>
          <title>Administrator</title>
            <meta charset="utf-8" />
            <meta name="apple-mobile-web-app-capable" content="yes">
            <meta name="apple-mobile-web-app-status-bar-style" content="black">
            <meta name="apple-mobile-web-app-title" content="Viewer">
            <meta name="msapplication-tap-highlight" content="no" />
            <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui">

            <meta http-equiv="cache-control" content="max-age=0" />
            <meta http-equiv="cache-control" content="no-cache" />
            <meta http-equiv="expires" content="0" />
            <meta http-equiv="pragma" content="no-cache" />

            <script src="../js/jquery-3.2.1.min.js" type="text/javascript"></script>
            <script src="../lib.frontend/common.js" type="text/javascript"></script>
            <script src="scripts/main.js" type="text/javascript"></script>
            <link rel="stylesheet" href="css/main.css" />

            <!-- for the most recent version -->
            <script src="../js/zebra_dialog.min.js"></script>
            <link rel="stylesheet" href="../css/zebra/flat/zebra_dialog.min.css">

            <!-- Bootstrap -->
            <link rel="stylesheet" href="../lib.frontend/bootstrap/css/bootstrap.min.css" >
            <link rel="stylesheet" href="../lib.frontend/bootstrap/css/bootstrap-theme.min.css" >
            <script src="../lib.frontend/bootstrap/js/bootstrap.min.js" ></script>

            <script>
                 $(document).ready(function(){
                     DataRegistration();

                     $("#logoutLink").click(function(){
                           
                           $.post("restOperations.php", 
                            {
                                'option' : 'logout'
                            }, function (data) {
                                location.replace('index.html');
                            },'text');
                     });

                 });
            </script>

    </head>
    <body style="background-color: white !important;">
        <section class="mainZone">
            <header>
                <div style="float:left;"><img src="images/user.png" width="16px" height="16px" align="abdmiddle" />&nbsp;<strong>User: <?php echo $_SESSION["user_email"]; ?></strong></div>
                <div style="float:right;"><a href="#" id="logoutLink"><strong>Logout</strong></a></div>
            </header>
            <br style="clear:both;" />
        </section>
        <section class="tableZone">
            <table id="tableList" class="table table-striped">
                <thead>
                    <th>Id</th>
                    <th>Date</td>
                    <th>Event</th>
                    <th>Player name</td>
                    <th>Date of birth</td>
                    <th>Team last play.</td>
                    <th>lev. Most rec. team</td>
                    <th>G. Name 1</td>
                    <th>G. Cells numbers 1</th>
                    <th>G. Email 1</th>
                    <th>G. Mailing 1</th>
                    <th>G. Name 2</td>
                    <th>G. Cells numbers 2</th>
                    <th>G. Email 2</th>
                    <th>G. Mailing 2</th>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </section>
    </body>
</html>
