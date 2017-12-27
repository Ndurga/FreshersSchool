<?php
  include_once("header.html");
  include_once("common.php");

//check later, hide warning while opeing file
  function echofile($link){
    if ("" != $link){
        $fileName = 'programming\\'.$link;

        if(false === file_exists($fileName)){
          Echo "<p id='errorPage'>Comming soon.....</p>";
          return;
        }

        $fp = fopen($fileName, 'r');
        if(!$fp){
          Echo "<p id='errorPage'>Sorry, error In loading page</p>";
          return;
        }

        if (fileSize($fileName) <= 0){
          Echo "<p id='errorPage'>Comming soon.....</p>";
          return;
        }

        echo   $fileSize = fileSize($fileName);
          $fileData = fread($fp, $fileSize);
          fclose($fp);
          echo "<div class='echo_file_container'>";
          echo $fileData;
          echo "</div>";
    }else {
        Echo "<p id='errorPage'>Sorry, Something went wrong</p>";
    }
  }


    if (isset($_REQUEST['page'])) {
      $page = $_REQUEST['page'];

      if ("clang" == $page) {
        echo "<div class='lang_container'>
                <ul>
                  <li> <a href='$lang_file?page=$c_fresher_interview'>C Fresher Interview Questions</a></li>
                  <li> <a href='$lang_file?page=$c_experienced_interview'>C Experienced Interview Questions</a></li>
                  <li> <a href='$lang_file?page=$c_in_1_hr'>Learn C In One Hour</a></li>
                  <li> <a href='$lang_file?page=$c_complete_ref'>C Complete Referrence</a></li>
                </ul>
              </div>";
      }elseif ("cpplang" == $page) {
        echo "<div class='lang_container'>
                <ul>
                  <li> <a href='$lang_file?page=$cpp_fresher_interview'>C++ Fresher Interview Questions</a></li>
                  <li> <a href='$lang_file?page=$cpp_experienced_interview'>C++ Experienced Interview Questions</a></li>
                  <li> <a href='$lang_file?page=$cpp_in_1_hr'>Learn C++ In 1 Hour</a></li>
                  <li> <a href='$lang_file?page=$cpp_complete_ref'>C++ Complete Referrence</a></li>
                </ul>
              </div>";
      }else {
        echofile($page);
      }
    }

  include_once("footer.phtml");
 ?>
