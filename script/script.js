function openSlideMenu(){
  console.log('open slide');
  document.getElementById('side-menu').style.width = '60%';
}

function closeSlideMenu(){
  document.getElementById('side-menu').style.width = '0';
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
        $('#resultsArea').show();
        //$('resultsArea').append(this.responseText);
        var elemt = document.getElementById('resultsArea');
        elemt.innerHTML =  this.responseText;

        if("" == this.responseText.trim()){
            $('#resultsArea').hide();
        }
    }
  }
 xmlHttp.open("GET", "searchReviews.php?q="+searchStr, true);
 xmlHttp.send();
}
