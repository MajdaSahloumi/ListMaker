<?php

require('dbConnexion.php');

//if(isset($_GET['idLoglist']))
if(isset($_GET['hashSession']))
{
	$sql = 'SELECT id, hashSession FROM LogList WHERE hashSession = :hashSession';
	$response = $dbh->prepare($sql);
	$response->bindValue(':hashSession', $_GET['hashSession'], PDO::PARAM_STR);
	$response->execute();
	echo $response->rowCount();
	
	
	$sql = "SELECT idProduct, quantity FROM ConsumerList WHERE :idLogList = $response['idLogList']";
	$response2 = $dbh->prepare($sql);
	$response2->bindValue(':idLoglist', $response['idLogList'], PDO::PARAM_INT);
	$response2->execute();
	
	foreach($response as $elem)
	{
		echo json_encode($elem);
	}
}
?>
