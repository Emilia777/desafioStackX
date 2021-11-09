$(document).ready(function(){

    $('.like-btn').on('click', function(){
        var func_id = $(this).data('id');
        $clicked_btn = $(this);

        if ($clicked_btn.hasClass("fa fa-thumbs-up like-btn")) {
          action = "like";
        } else if ($clicked_btn.hasClass("fa fa-thumbs-up like-btn")) {
          action = "unlike";
        }

        $.ajax({
            url: 'index.php',
            type: 'post',
            data: {
                'action': action,
                'func_id': func_id
            },
            success: function(data) {
                res = JSON.parse(data);

                if (action == 'like') {
                    $clicked_btn.removeClass("fa fa-thumbs-up like-btn");
                    $clicked_btn.addClass("fa fa-thumbs-up like-btn");
                } else if (action == 'unlike') {
                    $clicked_btn.removeClass("fa fa-thumbs-up like-btn");
                    $clicked_btn.addClass("fa fa-thumbs-up like-btn");
                }

                $clicked_btn.siblings('span.likes').text(res.likes);
                $clicked_btn.siblings("span.dislikes").text(res.dislikes);

                $clicked_btn
                  .siblings("i.fa fa-thumbs-down dislike-btn")
                  .removeClass("fa fa-thumbs-down dislike-btn")
                  .addClass("fa fa-thumbs-down dislike-btn");
            }
        })
    });


    $(".dislike-btn").on("click", function () {
      var func_id = $(this).data("id");
      $clicked_btn = $(this);

      if ($clicked_btn.hasClass("fa fa-thumbs-down dislike-btn")) {
        action = "dislike";
      } else if ($clicked_btn.hasClass("fa fa-thumbs-down dislike-btn")) {
        action = "undislike";
      }

      $.ajax({
        url: "index.php",
        type: "post",
        data: {
          action: action,
          func_id: func_id,
        },
        success: function (data) {
          res = JSON.parse(data);

          if (action == "dislike") {
            $clicked_btn.removeClass("fa fa-thumbs-down dislike-btn");
            $clicked_btn.addClass("fa fa-thumbs-down dislike-btn");
          } else if (action == "undislike") {
            $clicked_btn.removeClass("fa fa-thumbs-down dislike-btn");
            $clicked_btn.addClass("fa fa-thumbs-down dislike-btn");
          }

          $clicked_btn.siblings("span.likes").text(res.likes);
          $clicked_btn.siblings("span.dislikes").text(res.dislikes);

          $clicked_btn
            .siblings("i.fa fa-thumbs-up like-btn")
            .removeClass("fa fa-thumbs-up like-btn")
            .addClass("fa fa-thumbs-up like-btn");
        },
      });
    });

});