<?php
  include_once("header.html");
?>

<h4 class='inner_heading'>Write your review</h4>

<section>
  <form class="reviewform" action="review.php" method="post" >
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

    <div class="writereviewrating">
      <div class="sub_rating">
        <span>Subject depth</span>
        <div class="stars">
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
        </div>
      </div>
      <div class="sub_rating">
        <span>Complet on time</span>
        <div class="stars">
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
        </div>
      </div>
      <div class="sub_rating">
        <span>Over all rating</span>
        <div class="stars">
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
        </div>
      </div>
    </div>
    <input type="submit" name="" value="Submit" id='submitBtn'>
  </form>
</section>

<?php
  include("footer.phtml");
?>
