
$(document).ready(function(){
  $('#resultsArea').hide();
});

function writeReview(){
  window.location.href = "writereview.php";
}

function openSlideMenu(){
  document.getElementById('side-menu').style.width = '60%';
}

function closeSlideMenu(){
  document.getElementById('side-menu').style.width = '0';
}

//use later
function getMoreData(){
    //console.log('get more....');
}

function searchReviews(searchStr){
  if("" == searchStr){
    $('#resultsArea').hide();
    return;
  }
  var xmlHttp;
  if(window.XMLHttpRequest){
    xmlHttp = new XMLHttpRequest();
  }
  else{
    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlHttp.onreadystatechange = function(){
    if(this.readyState==4 && this.status==200){
        if("" != this.responseText.trim()){
          var elemt = document.getElementById('resultsArea');
          elemt.innerHTML =  "<h3>Search Result</h3>" + this.responseText;
          $('#resultsArea').show();
        }else {
          $('#resultsArea').hide();
        }
    }
  }
 xmlHttp.open("GET", "searchReviews.php?q="+searchStr, true);
 xmlHttp.send();
}
