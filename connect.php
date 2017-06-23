<?php

function Conectar()
{
	$link=mysql_connect("localhost", "root", "");
	//hddbduser
	//Hock@9782
	//---
	//root
	//
	$coneccion=mysql_select_db("hddhockey", $link);
	
	mysql_query("SET NAMES UTF8");

	if($coneccion!=1)
	{
		echo "ERROR IN DATA BASE.";
		die();
		return false;
	}
	else
	{
		return $link;
	}
}
?>
