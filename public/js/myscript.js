

$(document).ready(function(){
    
    //ẩn thông báo thêm, sửa xóa thành công
    $(".alert_msg, .msg_result").delay(3000).slideUp();

    $("#checkbox").change(function(){
        if($(this).is(":checked")){
            $("#txtPass, #txtRe_Pass").removeAttr("disabled");
        }else{
            $("#txtPass, #txtRe_Pass").attr("disabled", "");
        }
    });

    //nút like book
    $("#like_book").click(function(){
        swal("Congratulation!", "You love this book", "success");
    });

    // ajax update book
    $('a.update_book').click(function(){
        var rowId = $(this).attr('id');
        var qty = $(this).parent().parent().find('.qty_book').val();
        var token = $('input[name="_token"]').val();
        $.ajax({
            url: 'cap-nhat/'+rowId+'/'+qty,
            type: 'get',
            cache: false,
            data: {
                "token": token,
                "id": rowId,
                "qty": qty
            },
            success: function(data){
                if(data == "lol"){

                    alert("update thành công!");
                    window.location = "../BOOK/gio-hang";
                }
            }
        });
    });

    //show/hidden comment
    $('.cm_post').hide();
    $('#content_cm').click(function(){
        $('.cm_post').slideToggle();
    });
    // $('.cm_list').click(function(){
    //     $('.cm_post').hide();
    // });

    $(".project").hover3d({
        selector: ".project__card",
        shine: true,
    });

    // $('.check_out').hide();
    // $('button#checkout').click(function(){
    //    $('.check_out').slideToggle();
    // });


    $("#idTinh").change(function(){
        var idtinh = $(this).val();
        $.get("ajax/Tinh/" + idtinh, function(data){
            $("#idQuan").html(data);
        });
    });


    // $(".content_box").click(function(){
    //     $(".content_box_main").css({
    //         "bottom" : -159
    //     });
    // });



    $(".box_head").click(function(){
        $(".box_head").css({
            "display" : "none"
        });
        $(".content_box_main").show();

    });

    $(".content_box").click(function(){
        $(".box_head").css({
            "display" : "block"
        });
        $(".content_box_main").hide();
    });

    $("#chat").click(function(){
        var name = $("#txtName").val();
       
    });


    $("#likes").click(function() {
        var bookId = $(this).attr('data-id');
        var token = $('input[name="_token"]').val();
        $.ajax({
            url: '/like/' + bookId,
            type: 'POST',
            cache: false,
            async: true,
            data: {id: bookId ,_token: token,},
            success: function( data ) {
                if(data == 0){
                    alert("No result!");
                }else{
                    $('.count-likes').html(data.countLike);
                }

            },
            error: function(e) {
                // Handle error here
                console.log(e);
            },
            timeout: 30000
      
            });
        });



});

function delcate(msg) {
    if (window.confirm(msg)) {
        return true;
    } else {
        return false;
    }
}
function alert(msg) {
    if (window.confirm(msg)){
        return true;
    }else{
        return false;
    }

}





