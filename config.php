<?php
	//check later
	//ob_start();
	//session_start();

	// //database column names
	// define("COLUMN_INSTITUTE",'institute');
	// define("COLUMN_SUBJECT","subject");
	// define("COLUMN_FACULTY","faculty");
	// define("COLUMN_PROFILE_PIC","profilepic");
	// define("COLUMN_SUB_DEPTH","subject_depth");
	// define("COLUMN_ON_TIME","complete_on_time");
	// define("COLUMN_OVERALL_RATING","overall_rating");
	// define("COLUMN_COMMENTS","other_comments");


	define("HOSTNAME","localhost");
	define("DBUSER","root");
	define("DBPWD","");
	define("DBNAME","reviewsdb");

	 $conn = mysqli_connect(HOSTNAME, DBUSER,DBPWD, DBNAME);
	 if (!$conn) {
	 		die("Connection Failed : ".$mysqli_connect_error());
	 }
?>
