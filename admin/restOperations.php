<?php
session_start();
require("../connect.php");
$link = Conectar();
$opcion = $_POST["option"];

switch ($opcion)
{
    case "login":
     {
        ValidateLogin(trim($_POST["email"]), trim($_POST["pass"]));
        break;
     }
    case "listRegistrations":
    {
        ListRegistrations();
        break;
    }
    case "logout":
    {
        Logout();
        break;
    }
}

////////////funciones//////////////////////////////

function ValidateLogin($_email, $_pass)
{
    global $link;
    $sql = "SELECT * FROM adminuser WHERE emailAdmin='$_email' AND passwordAdmin='$_pass'";
    $result = mysql_query($sql, $link);
    if(mysql_num_rows($result) == 1)
      {
        if($row = mysql_fetch_array($result))
         {
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["user_email"] = $row["emailAdmin"];
         }
         echo '{"status":true,"message":"User successfully logged"}';
      }
    else
      {
        $imagen_error = rawurlencode("<img src='images/error.png' width='16px' height='16px' align='absmiddle'/>&nbsp;");
        echo '{"status":false,"message":"'.$imagen_error.'User not found"}';
      }
}

function ListRegistrations()
{
    global $link;
    $array = array();
    $sql = "SELECT A.*, B.nameType FROM registration A INNER JOIN eventtype B ON A.idEvent = B.id ORDER BY registerDateTime DESC";
    $result = mysql_query($sql, $link);

     while($row = mysql_fetch_assoc($result))
     {
         array_push($array, $row);
     }

    echo json_encode($array);
}

function Logout()
{
    try
    {
        //session_destroy();
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
    }
    catch(Exception  $ex){}
}
?>