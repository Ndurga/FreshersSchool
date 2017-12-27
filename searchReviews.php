<!-- <?php
  if (isset($_REQUEST['q']))
  {
    include_once("dbConnection.php");
    $dbConn = new dbConnection();
    if($dbConn){
      $dbConn->connect();

      //check later
      $stmt = mysqli_prepare($this->conn, "SELECT * FROM reviews WHERE institute = ? OR subject = ? OR faculty = ? ");
      mysqli_stmt_bind_param($stmt, "sss", $searchTxt, $searchTxt, $searchTxt);
      $searchTxt = $_REQUEST['q'];
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $num_rec = mysqli_stmt_num_rows($stmt);
      mysqli_stmt_close($stmt);
    }
  }
  //close db connection
  mysqli_close($conn);
?> -->





<?php
  include("config.php");

  if($_REQUEST['q']){
    //check later
    $searchTxt = $_REQUEST['q'];
    $dbConn = new dbConnection();

    if($dbConn){
      $dbConn->connect();
    }
  }




    //close db connection
    mysqli_close($conn);
?>
