<?php
  include("header.html");
?>

<div id="reviews-container">
    <div id="ReviewBtnDiv">
      <a href="writereview.php?page=review"><input type="button" name="" id="ReviewBtn" value="Write Review"></a>
    </div>
    <div class="searchDiv">
      <input type="text" name="" value="" placeholder="Ex: institute / faculty / subject name"  onkeyup="searchReviews(this.value)"></input>
      <input type="button" name="" value="Search"></input>
    </div>

    <div id="resultsArea">
      <h3 id='search_result'>Search Result</h3>
    </div>

    <div id="recentReviews">
      <h3>Recent Reviews</h3>

<?php
      $sel = "SELECT * FROM reviews";
      $res  = mysqli_query($conn, $sel)
              or die(mysqli_error($conn));      //Check later, add logs

      if (mysqli_num_rows($res) > 0) {
        while($pro = mysqli_fetch_assoc($res)){
          $institute = $pro['institute'];
          $subject = $pro['subject'];
          $faculty = $pro['faculty'];
          $profilepic = $pro['profilepic'];
          $sub_depth = $pro['subject_depth'];
          $sub_complete_time = $pro['complete_on_time'];
          $overall_rating = $pro['overall_rating'];
          $other_comments = $pro['other_comments'];

          echo "<section><div class='profile'>";
          echo  "<img id='image' src='images/dp.jpg' alt='No Image Available'>";
          echo   "<div class='overview'>
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
                 <div class='clear1'></div>
                 <p>$other_comments</p>
                 <button type='button' name='' id='moreBtn'> Click For More... </button>
                 </div> </section>";
        }
      }
      else{
          Echo  "<h3>No Results Available Yes</h3>";
      }
      //close db connection
      mysqli_close($conn);
    ?>
 </div>

<?php
  include("footer.phtml");
?>
