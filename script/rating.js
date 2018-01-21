$(document).ready(function(){
  $('.star').click(function(){
      var parent  = $(this).parent();
      var clsName = $(this).attr('class');
      var child   = null;
      var rate    = 0;

      if (parent) {
        if (-1 != clsName.indexOf("rating1")){
            child = parent.find('.rating1');
            rate  = 1;
        }else if (-1 != clsName.indexOf("rating2")){
            child = parent.find('.rating2');
            rate  = 2;
        }else if (-1 != clsName.indexOf("rating3")){
            child = parent.find('.rating3');
            rate  = 3;
        }else if (-1 != clsName.indexOf("rating4")){
            child = parent.find('.rating4');
            rate  = 4;
        }else if (-1 != clsName.indexOf("rating5")){
            child = parent.find('.rating5');
            rate  = 5;
        }

        if (parent.attr('id').trim() == "sub_depth_rating_div") {
          $('#sub_depth_rating').val(rate);
        }else if (parent.attr('id').trim() == "complete_on_time_rating_div") {
          $('#complete_on_time_rating').val(rate);
        }else if (parent.attr('id').trim() == "overall_rating_div") {
          $('#overall_rating').val(rate);
        }

        if (child) {
          for (var i = 5; i > 0; i--) {
              var cls = ".rating" + i.toString();
              var img = "";

            if (rate >= i) {
              img = "images\\gold_star_16.png";
            }else {
              img = "images\\gray_star_16.png";
            }

            var prnt= parent.find(cls);
            if (prnt) {
              var imgChild = prnt.find('img');
              if (imgChild) {
                imgChild.attr("src", img);
              }
            }
          }
        }
      }
  });
});
