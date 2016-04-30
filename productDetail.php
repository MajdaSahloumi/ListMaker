<?php

require('dbConnexion.php');
header("Access-Control-Allow-Origin: *");
//echo $_GET['idProduct'];
if (isset($_GET['idProduct']))
{
  $sql = 'SELECT * FROM MarketList WHERE idProduct = :idProduct';
  $product = $dbh->prepare($sql);
  $product->bindValue(':idProduct', $_GET['idProduct'], PDO::PARAM_INT);
  $product->execute();
  if ($product->rowCount()===1)
  {
    $product=$product->fetch();
    echo json_encode($product);
  }
  else
  {
    echo 'existe pas';
  }
}
else
{
  echo 'pas get';
}
?>