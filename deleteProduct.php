<?php
require('dbConnexion.php');
if(isset($_GET['hashSession']) && isset($_GET['idProduct'])) {
  $sql = 'SELECT id, hashSession FROM LogList WHERE hashSession = :hashSession';
  $response1 = $dbh->prepare($sql);
  $response1->bindValue(':hashSession', $_GET['hashSession']);
  $response1->execute();
  
  if($response1->rowCount()===1)
  {
    $response1 = $response1->fetch();
    $sql = 'DELETE FROM ConsumerList WHERE idProduct = :idProduct AND idLogList = :idLogList';
    $response1 = $dbh->prepare($sql);
    $response1->bindValue(':idProduct', $_GET['idProduct'], PDO::PARAM_INT);
    $response1->bindValue(':idLogList', $response1['id'], PDO::PARAM_INT);
    $response->execute();
  }
  
?>
