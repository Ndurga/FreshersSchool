<?php
  //check later
	//ob_start();
	//session_start();

	//database column names
	define("COLUMN_INSTITUTE",'institute');
	define("COLUMN_SUBJECT","subject");
	define("COLUMN_FACULTY","faculty");
	define("COLUMN_PROFILE_PIC","profilepic");
	define("COLUMN_SUB_DEPTH","subject_depth");
	define("COLUMN_ON_TIME","complete_on_time");
	define("COLUMN_OVERALL_RATING","overall_rating");
	define("COLUMN_COMMENTS","other_comments");

	define("HOSTNAME","localhost");
	define("DBUSER","root");
	define("DBPWD","");
	define("DBNAME","reviewsdb");
  define("DB_TABLE", "reviews");

  class dbConnection{
      var $conn = null;
      var $record = array(
        COLUMN_INSTITUTE => "",
        COLUMN_SUBJECT => "",
        COLUMN_FACULTY => "",
        COLUMN_PROFILE_PIC => "",
        COLUMN_SUB_DEPTH => 0,
        COLUMN_ON_TIME => 0,
        COLUMN_OVERALL_RATING => 0,
        COLUMN_COMMENTS => "",
      );
      var $records = array();

      public function connect(){
        if (!$this->conn && !$this->conn = mysqli_connect(HOSTNAME, DBUSER,DBPWD, DBNAME)) {
          die("Connection Failed : ".$mysqli_connect_error());
        }
      }

      public function getInstitute($rec){
        return $rec[COLUMN_INSTITUTE];
      }
      public function getSubject($rec){
        return $rec[COLUMN_SUBJECT];
      }
      public function getFaculty($rec){
        return $rec[COLUMN_FACULTY];
      }
      public function getProfilepic($rec){
        return $rec[COLUMN_PROFILE_PIC];
      }
      public function getSubjectDepthRating($rec){
        return $rec[COLUMN_SUB_DEPTH];
      }
      public function getOnTimeCompletionRating($rec){
        return $rec[COLUMN_ON_TIME];
      }
      public function getOverallRating($rec){
        return $rec[COLUMN_OVERALL_RATING];
      }
      public function getOtherComments($rec){
        return $rec[COLUMN_COMMENTS];
      }

      public function readReviews(){
        if($this->conn){
          $sel = "SELECT * FROM  reviews";
          $res  = mysqli_query($this->conn, $sel);
          $num  = 0;

          if (mysqli_num_rows($res) > 0) {
            while($pro = mysqli_fetch_assoc($res)){
              $this->record[COLUMN_INSTITUTE] = $pro['institute'];
              $this->record[COLUMN_SUBJECT] = $pro['subject'];
              $this->record[COLUMN_FACULTY] = $pro['faculty'];
              $this->record[COLUMN_PROFILE_PIC] = $pro['profilepic'];
              $this->record[COLUMN_SUB_DEPTH] = $pro['subject_depth'];
              $this->record[COLUMN_ON_TIME] = $pro['complete_on_time'];
              $this->record[COLUMN_OVERALL_RATING] = $pro['overall_rating'];
              $this->record[COLUMN_COMMENTS] = $pro['other_comments'];
              $this->records[$num++] = $this->record;
            }
          }
        }
      }

      public function getRecords(){
        return $this->records;
      }

      public function closeConnection(){
        if($this->conn){
          mysqli_close($this->conn);
          $this->conn = null;
        }
    }

		public function insertReview($inst, $subj, $facl, $pro_pic, $s_d_r, $o_t_c, $o_r, $comm){
				if($this->conn){
					$stmt = mysqli_prepare($this->conn, "INSERT INTO `reviews` (`institute`, `subject`, `faculty`, `profilepic`, `subject_depth`, `complete_on_time`, `overall_rating`, `other_comments`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
				  mysqli_stmt_bind_param($stmt, "ssssddds", $institute, $subject, $faculty, $profile_pic, $sub_dep_rating, $on_time_rating, $overall_rating, $comments);

				  $institute = $inst;
				  $subject = $subj;
				  $faculty = $facl;
				  $profile_pic = $pro_pic;
				  $sub_dep_rating = $s_d_r;
				  $on_time_rating = $o_t_c;
				  $overall_rating = $o_r;
				  $comments = $comm;

			    mysqli_stmt_execute($stmt);
			    mysqli_stmt_close($stmt);
				}
				else {
					echo "No connection";
				}
  	}

		function getSearchResults($searchTxt){
			if($this->conn){
				$sel = "SELECT * FROM reviews where institute = '".$searchTxt."'"." OR subject = "."'".$searchTxt."'"." OR subject = "."'".$searchTxt."'";

				$res  = mysqli_query($this->conn, $sel);
				while($pro = mysqli_fetch_assoc($res)){
					$institute = $pro['institute'];
					$subject = $pro['subject'];
					$faculty = $pro['faculty'];
					$profilepic = $pro['profilepic'];
					$sub_depth = $pro['subject_depth'];
					$sub_complete_time = $pro['complete_on_time'];
					$overall_rating = $pro['overall_rating'];
					$other_comments = $pro['other_comments'];

					echo  "<div class='container'>";
					echo  "<div class='recentReviews'>";
					echo  "<section><div class='profile'>";
					echo  "<img id='image' src='images/dp.jpg' alt='No Image Available'>";
					echo  "<div class='overview'>
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
								 </div>
								 </section>
								 </div>
								 </div>";
					}
			}
			else {
				echo "Sorry connection error...";
			}
		}

	 }
 ?>
