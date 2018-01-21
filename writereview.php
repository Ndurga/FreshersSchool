<?php
  include_once("header.html");
?>

<h4 class='inner_heading'>Write your review</h4>

<section>
  <form class="reviewform" action="review.php" method="post">
    <div class=""> <span>Institute</span> <span class="mandatary">*</span> <br>
    <input type="text" name="institute" value="" required></div>
    <div class=""> <span>Subject</span> <span class="mandatary">*</span> <br>
    <input type="text" name="subject" value="" required></div>
    <div class=""> <span>Faculty</span> <span class="mandatary">*</span> <br>
    <input type="text" name="faculty" value="" required></div>
    <div>
      <span>Comments </span>
      <textarea id='comments-area' name="comments" rows="8"></textarea>
    </div>

    <input type="hidden" name="sub_depth" id="sub_depth_rating" value="testvalue">
    <input type="hidden" name="complete_on_time"  id="complete_on_time_rating" value="testvalue">
    <input type="hidden" name="overall_rating" id="overall_rating" value="testvalue">

    <div class="writereviewrating">
      <div>
        <span>Subject depth</span>
        <div class="stars" id="sub_depth_rating_div">
          <a class='star rating1'> <img src="images\gray_star_16.png" alt="*"> </a>
          <a class='star rating2'> <img src="images\gray_star_16.png" alt="*"> </a>
          <a class='star rating3'> <img src="images\gray_star_16.png" alt="*"> </a>
          <a class='star rating4'> <img src="images\gray_star_16.png" alt="*"> </a>
          <a class='star rating5'> <img src="images\gray_star_16.png" alt="*"> </a>
        </div>
      </div>
      <div>
        <span>Complet on time</span>
        <div class="stars"  id="complete_on_time_rating_div">
          <a class='star rating1'> <img src="images\gray_star_16.png" alt="*"> </a>
          <a class='star rating2'> <img src="images\gray_star_16.png" alt="*"> </a>
          <a class='star rating3'> <img src="images\gray_star_16.png" alt="*"> </a>
          <a class='star rating4'> <img src="images\gray_star_16.png" alt="*"> </a>
          <a class='star rating5'> <img src="images\gray_star_16.png" alt="*"> </a>
        </div>
      </div>
      <div>
        <span>Over all rating</span>
        <div class="stars" id="overall_rating_div">
          <a class='star rating1'> <img src="images\gray_star_16.png" alt="*"> </a>
          <a class='star rating2'> <img src="images\gray_star_16.png" alt="*"> </a>
          <a class='star rating3'> <img src="images\gray_star_16.png" alt="*"> </a>
          <a class='star rating4'> <img src="images\gray_star_16.png" alt="*"> </a>
          <a class='star rating5'> <img src="images\gray_star_16.png" alt="*"> </a>
        </div>
      </div>
    </div>
    <input type="submit" name="" value="Submit" id='submitBtn'>
  </form>
</section>

<?php
  include("footer.phtml");
?>
