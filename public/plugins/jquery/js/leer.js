$(document).ready(function(){
        listUsers();


    });




    $(document).on("click",".pagination li a",function(e) {
        e.preventDefault();
        var url = $(this).attr("href");
        $.ajax({
            type:'get',
            url:url,
            success: function(data){
                $('#listusers').empty().html(data);
            }
        });
    });

   
  var listUsers = function()
  {
    var route = "http://127.0.0.1:8000/admin/listall";
      $.ajax({
          type:'get',
          url:route,
          success: function(data){
              $('#listusers').empty().html(data);
          }
      });
  }






 