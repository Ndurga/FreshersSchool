<?php
  include("header.html");
  include("dbConnection.php");
?>

    <div id="ReviewBtnDiv">
      <a href="writereview.php"><input type="button" name="" id="ReviewBtn" value="Write Review"></a>
    </div>
    <div class="searchDiv">
      <input type="text" id="searchBox" name="" value="" placeholder="Ex: institute / faculty / subject name"  onkeyup="searchReviews(this.value)"></input>
      <input id="searchBtn" type="button" name="" value=""></input>
    </div>

    <div id="resultsArea">
      <h3 id='search_result'>Search Result</h3>
    </div>

  <div id="reviews-container">
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
