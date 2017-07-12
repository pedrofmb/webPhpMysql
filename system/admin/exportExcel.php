<?php

session_start();
require("../connect.php");
$link = Conectar();

require '../common.backend/exportDataExcel.php';

$page = $_GET["pageNumber"];

$exporter = new ExportDataExcel('browser', 'document.xls');
$exporter->initialize();
$exporter->addRow(array("Id", "Date", "event", "Player Name", "Date of birth", "Team Last played", "Level of most recent team", 
                        "G. 1 Name", "G. 1 CellsPhones", "G. 1 Email", "G. 1 Mailing address",
                        "G. 2 Name", "G.1 CellsPhones", "G. 2 Email", "G. 2 Mailing address")); 

$sql = "SELECT A.*, B.nameType, C.pageName FROM registration A 
        INNER JOIN eventtype B ON A.idEvent = B.id 
        INNER JOIN eventpage C ON B.idPage = C.id
        WHERE C.id = ". $page ." ORDER BY registerDateTime DESC";

$result = mysql_query($sql, $link);

    while($row = mysql_fetch_assoc($result))
    {
        $exporter->addRow(array($row["id"], $row["registerDateTime"], $row["pageName"]." - ".$row["nameType"] , $row["playerName"], $row["dateOfBirth"], 
                                $row["teamLastPlayed"], $row["levelOfMostRecentTeam"], $row["guardianName1"], $row["guardianCellNumber1"] . " " + $row["guardianOtherNumber1"],
                                $row["guardianEmail1"], $row["guardianMailingAddress1"], $row["guardianName2"], $row["guardianCellNumber2"] . " " + $row["guardianOtherNumber2"],
                                $row["guardianEmail2"], $row["guardianMailingAddress2"]));
    }

$exporter->addRow(array("file xls exported done."));
$exporter->finalize();
exit();

?>