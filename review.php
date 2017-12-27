
<?php
  include_once("header.html");

  //#change here, add other request variables also
  if (isset($_REQUEST['institute']) && isset($_REQUEST['subject']) && isset($_REQUEST['faculty']) &&
      isset($_REQUEST['comments'])){
        include_once("dbConnection.php");

        $dbConn = new dbConnection();
        if($dbConn){
          $dbConn->connect();

          //check later
          $institute = $_REQUEST['institute'];
          $subject = $_REQUEST['subject'];
          $faculty = $_REQUEST['faculty'];
          $profile_pic = '';
          $sub_dep_rating = 0;                        //$_REQUEST['sub_dep_rating'];
          $on_time_rating = 0;                        //$_REQUEST['on_time_rating'];
          $overall_rating = 0;                        //$_REQUEST['overall_rating'];
          $comments = $_REQUEST['comments'];

          $dbConn->insertReview($institute, $subject, $faculty, $profile_pic, $sub_dep_rating, $on_time_rating, $overall_rating, $comments);
          $dbConn->closeConnection();

          echo "
            <div>
              <p>Your review has been submitted successfully</p>
            </div>
            <div>
              <a href='index.php'><button type='button' name='button'>Home</button></a>
              <a href='writereview.php'><button type='button' name='button'>Write Another Review</button></a>
            </div>";
        }
  }else {
    header('Location: writereview.php');
  }

  include_once("footer.phtml");
?>
