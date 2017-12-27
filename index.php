<?php
  include_once("header.html");
  include_once("common.php");
  include_once("dbConnection.php");
?>

    <div id="ReviewBtnDiv">
      <a href="writereview.php"><input type="button" name="" id="ReviewBtn" value="Write Review"></a>
    </div>
    <div class="searchDiv">
      <input type="text" id="searchBox" name="" value="" placeholder="Ex: institute / faculty / subject name"  onkeyup="searchReviews(this.value)"></input>
      <input id="searchBtn" type="button" name="" value=""></input>
    </div>

    <?php
        echo
        "<div class='quicklinks'>
          <h3 >Quick Links</h3>
          <ul>
            <li> <a href='$lang_file?page=$c_fresher_interview'>C Fresher Interview Questions</a></li>
            <li> <a href='$lang_file?page=$c_in_1_hr'>Learn C In One Hour</a></li>
            <li> <a href='$lang_file?page=$cpp_fresher_interview'>C++ Fresher Interview Questions</a></li>
            <li> <a href='$lang_file?page=$cpp_in_1_hr'>Learn C++ In 1 Hour</a></li>
          </ul>
        </div>";
    ?>

  <div id="reviews-container">
    <div id="resultsArea">
      <h3 >Search Result</h3>
      <span id='search_result'></span>
    </div>

    <div id="recentReviews">
      <h3>Recent Reviews</h3>

   <?php
      $dbConn = new dbConnection();
      if($dbConn){
        $dbConn->connect();
        $dbConn->readReviews();
        $records = $dbConn->getRecords();

        if (count($records)){
          foreach ($records as $record) {
            $institute = $dbConn->getInstitute($record);
            $subject = $dbConn->getSubject($record);
            $faculty = $dbConn->getFaculty($record);
            $profilepic = $dbConn->getProfilepic($record);
            $sub_depth = $dbConn->getSubjectDepthRating($record);
            $sub_complete_time = $dbConn->getOnTimeCompletionRating($record);
            $overall_rating = $dbConn->getOverallRating($record);
            $other_comments = $dbConn->getOtherComments($record);

            echo "<section><div class='profile'>";
            echo    "<img id='image' src='images/profile1.png' alt='No Image Available'>";
            echo    "<div class='overview'>
                       <h4>Institute : <span>$institute</span></h3>
                       <h4>Faculty : <span>$faculty</span></h3>
                       <h4>Subject : <span>$subject</span></h4>
                       <div class='rating'>
                        <h4>Rating</h3>
                        <div class='stars'>
                          <span class='fa fa-star checked'></span>
                          <span class='fa fa-star checked'></span>
                          <span class='fa fa-star checked'></span>
                          <span class='fa fa-star checked'></span>
                          <span class='fa fa-star checked'></span>
                        </div>
                       </div>
                     </div>
                   <p id='other_comments'>$other_comments
                   <button type='button' name='' id='moreBtn'> Click For More... </button>
                   </p>
                  </div>
                </section>";
          }
        }
        }else{
              Echo  "<h3>No Results Available Yes</h3>";
        }
   ?>
 </div>

<?php
  include("footer.phtml");
?>
