<?php
  include_once("dbconnection.php");

  if($_REQUEST['q']){
    //check later
    $searchTxt = $_REQUEST['q'];
    $dbConn = new dbConnection();

    if($dbConn){
      $dbConn->connect();
      $dbConn->getSearchResults($searchTxt);
    }
  }
?>
