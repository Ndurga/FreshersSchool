<?php
  include_once("header.html");
  include_once("common.php");
  include_once("dbconnection.php");
?>

    <div id="ReviewBtnDiv">
      <input type="button" name="" id="ReviewBtn" value="Write Review" onclick="writeReview()">
    </div>
    <div class="searchDiv">
      <input type="text" id="searchBox" name="" value="" placeholder="Ex: institute / faculty / subject name"  onkeyup="searchReviews(this.value)"></input>
      <input id="searchBtn" type="button" name="" value=""></input>
    </div>

    <?php
        echo
        "<div class='quicklinks'>
          <div>
          <h3 >Quick Links</h3>
          <ul>
            <li> <a href='$lang_file?page=$c_fresher_interview'>C Fresher Interview Questions</a></li>
            <li> <a href='$lang_file?page=$c_in_1_hr'>Learn C In One Hour</a></li>
            <li> <a href='$lang_file?page=$cpp_fresher_interview'>C++ Fresher Interview Questions</a></li>
            <li> <a href='$lang_file?page=$cpp_in_1_hr'>Learn C++ In 1 Hour</a></li>
          </ul>
          </div>
        </div>";
    ?>

  <div id="reviews-container">
    <div id="resultsArea">
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
            echo    "<img id='image' src='images/profile.png' alt='No Image Available'>";
            echo    "<div class='overview'>
                       <h4>Institute : <span class='chgfnt'>$institute</span></h4>
                       <h4>Faculty  <span>  </span> : <span class='chgfnt'>$faculty</span></h4>
                       <h4>Subject   : <span class='chgfnt'>$subject</span></h4>";

           echo "<h4>Subject depth</h4><div class='star_div'>";
                 for ($i=1; $i <= 5; $i++) {
                   if ($i > $sub_depth) {
                     echo "<img src='images\gray_star_16.png' alt=''> </a>";
                   }else {
                     echo "<img src='images\gold_star_16.png' alt='*'> </a>";
                   }
                 }
           echo "</div>";

           echo "<h4>Complet on time </h4><div class='star_div'>";
                   for ($i=1; $i <= 5; $i++) {
                     if ($i > $sub_complete_time) {
                       echo "<img src='images\gray_star_16.png' alt=''> </a>";
                     }else {
                       echo "<img src='images\gold_star_16.png' alt='*'> </a>";
                     }
                   }
           echo "</div>";

           echo "<h4>Overall Rating</h4><div class='star_div'>";
                   for ($i=1; $i <= 5; $i++) {
                     if ($i > $overall_rating) {
                       echo "<img src='images\gray_star_16.png' alt=''> </a>";
                     }else {
                       echo "<img src='images\gold_star_16.png' alt='*'> </a>";
                     }
                   }
           echo "</div></div>";

           echo "<p id='other_comments' display='text-align:left'> <span id='chgclr'>Comments :</span>$other_comments</p>
                   <button type='button' id='moreBtn' style='display:none' onclick='getMoreData()'>More...</button>
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
