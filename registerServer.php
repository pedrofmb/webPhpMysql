<?php

$hostOrigin = $_SERVER["HTTP_ORIGIN"]; // http://localhost:83

$schema = $_SERVER["REQUEST_SCHEME"]; //http
$serverName = $_SERVER["SERVER_NAME"]; //localhost
$port = $_SERVER["SERVER_PORT"]; // 83

require("connect.php");
require("common.backend/cadena.php");
$link = Conectar();

if( ($port != 80 && $hostOrigin == $schema . "://" . $serverName . ":" . $port) || ($port == 80 && $hostOrigin == $schema . "://" . $serverName))
{

    $query = "INSERT INTO registration (registerDateTime, playerName, dateOfBirth, teamLastPlayed, levelOfMostRecentTeam, guardianName1, guardianCellNumber1, guardianOtherNumber1, 
              guardianEmail1,guardianMailingAddress1, guardianName2, guardianCellNumber2, guardianOtherNumber2, guardianEmail2, guardianMailingAddress2, idEvent) 
              VALUES 
              (now(), '".unicodeReplaceEntities::UTF8entities($_POST["playerName"])."',
              '".$_POST["dateOfBirth"]."',
              '".unicodeReplaceEntities::UTF8entities($_POST["teamLastPlayedFor"])."',
              '".unicodeReplaceEntities::UTF8entities($_POST["levelOfMostRecentTeam"])."',
              '".unicodeReplaceEntities::UTF8entities($_POST["nameGuardian1"])."',
              '".unicodeReplaceEntities::UTF8entities($_POST["cellNumberGuardian1"])."',
              '".unicodeReplaceEntities::UTF8entities($_POST["otherNumberGuardian1"])."',
              '".unicodeReplaceEntities::UTF8entities($_POST["emailGuardian1"])."',
              '"."Street: ".unicodeReplaceEntities::UTF8entities($_POST["streetGuardian1"]). ", Town: " . unicodeReplaceEntities::UTF8entities($_POST["townGuardian1"]) . ", State: " . unicodeReplaceEntities::UTF8entities($_POST["stateGuardian1"]) . ", Zip: " . unicodeReplaceEntities::UTF8entities($_POST["zipGuardian1"])  ."',
              '".unicodeReplaceEntities::UTF8entities($_POST["nameGuardian2"])."',
              '".unicodeReplaceEntities::UTF8entities($_POST["cellNumberGuardian2"])."',
              '".unicodeReplaceEntities::UTF8entities($_POST["otherNumberGuardian2"])."',
              '".unicodeReplaceEntities::UTF8entities($_POST["emailGuardian2"])."',
              '"."Street: ".unicodeReplaceEntities::UTF8entities($_POST["streetGuardian2"]). ", Town: " . unicodeReplaceEntities::UTF8entities($_POST["townGuardian2"]) . ", State: " . unicodeReplaceEntities::UTF8entities($_POST["stateGuardian2"]) . ", Zip: " . unicodeReplaceEntities::UTF8entities($_POST["zipGuardian2"])  ."',
              '".$_POST["page"]."'
              )";
              
    $result = mysql_query($query,$link);

    $affectRows = mysql_affected_rows();

    if($affectRows > 0)
    {
        //Send Email

        $to  = $_POST["emailGuardian1"] . ', ';
        $to .= $_POST["emailGuardian1"];

        // title
        $title = 'HHD event';

        // message
        $message = '
        <html>
        <head>
        <title>HDD Event</title>
        </head>
        <body>
        <p>Thank you for submitting your registration for this HHD event. To complete the final step of registration, please click on the link below to submit your payment.</p>
        <p>&nbsp;</p>
        <p><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=AED49RRKRY33Q" target="_blank">Paypal</a></p>
        <p>&nbsp;</p>
        <p>Once payment is received, your registration will be reviewed and you will be notified whether or not you were accepted into this event. No consideration will be given until payment has been submitted.</p>
        <p>As with all HHD events, there are limited spots available and registrations are frequently denied due to being at capacity. In the event that there is not a spot for your player, you will be notified and a full refund will be given.</p>
        <p><br /></p>
        <p>Thank you for registering, you will hear from us shortly.</p>
        </body>
        </html>
        ';

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		$headers .= 'To: '. $_POST["nameGuardian1"] .' <'. $_POST["emailGuardian1"] .'>' . "\r\n";
		$headers .= 'From: HHDHOCKEY <info@hhdhockey.com>' . "\r\n";

        // sent
        $emailSend = mail($to, $title, $message, $headers);

        echo '{"status": true, "message":"", "emailConfirm" : '. $emailSend .'}';
    }
    else
        echo '{"status": false,"message":""}';
}
else
{
    die();
}

?>