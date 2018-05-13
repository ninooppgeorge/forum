$(document).ready(function () {
    $('#postform').ajaxForm({
        error: function (data) {
            console.log(data);
        },
        clearForm: true,
        beforeSubmit: function () {
            $('.loading_comp').show();
        },
        success: function (data) {
            console.log(data);
            if (data == 0) {
                alert("Empty Message");
                $('.loading_comp').hide();
            } else {
                $('.dash_load_msg').prepend(data).slideDown();
                setInterval(() => {
                    $('.loading_comp').hide();
                }, 400);
            }
        }
    });

    $('.comment_input').focusin(function () {
        var id = $(this).attr('id');
        var sid = id.split('-')[1];
        $('#comment_button-' + sid).show();
    });

    $('.comment_form').submit(function () {
        var id = $(this).attr('id');
        var sid = id.split('-')[1];
        console.log(sid, id);
        $(this).ajaxSubmit({
            clearForm: true,
            success: function (data) {
                console.log(data);
                if (data == 0) {
                    alert("Please enter a reply");
                } else {
                    $('#append_comment-' + sid).append(data);
                }
            }
        });
        return false;
    });

    $(document).on('click', '.delete_btn', function () {
        var id = $(this).attr('id');
        var sid = id.split('-')[1];
        console.log(sid);
        $.ajax({
            url: './inc/dashboard/delete_comment.php',
            data: 'rid=' + sid,
            type: 'POST',
            success: function (data) {
                $('#comment-single-' + data).slideUp();
            }
        });
    });

    $(document).on('click', '.post_delete', function () {
        var id = $(this).attr('id');
        var sid = id.split('-')[1];
        console.log(sid);
        $.ajax({
            url: './inc/dashboard/delete_post.php',
            data: 'pid=' + sid,
            type: 'POST',
            success: function (data) {
                $('#post_total_cont-' + data).slideUp();
            }
        });
    });


    $(document).on('click', '.post_like', function () {
        var id = $(this).attr('id');
        var sid = id.split('-')[1];
        $.ajax({
            url: './inc/dashboard/insert_like.php',
            data: 'id=' + sid + '&type=0',
            type: 'POST',
            success: function (data) {
                $('#post_like-' + sid + ' i').removeClass('fa-thumbs-up');
                $('#post_like-' + sid + ' i').addClass('fa-thumbs-down');
                $('#post_like-' + sid).addClass('post_dislike');
                $('#post_like-' + sid).removeClass('post_like');
                $('#post_like-' + sid).attr('id', 'post_dislike-' + sid);
                var count = $('#like_count-' + sid).html();
                $('#like_count-' + sid).html(parseInt(count) + 1);
            }
        })
    });

    $(document).on('click', '.post_dislike', function () {
        var id = $(this).attr('id');
        var sid = id.split('-')[1];
        $.ajax({
            url: './inc/dashboard/insert_like.php',
            data: 'id=' + sid + '&type=0&remove=true',
            type: 'POST',
            success: function (data) {
                $('#post_dislike-' + sid + ' i').removeClass('fa-thumbs-down');
                $('#post_dislike-' + sid + ' i').addClass('fa-thumbs-up');
                $('#post_dislike-' + sid).addClass('post_like');
                $('#post_dislike-' + sid).removeClass('post_dislike');
                $('#post_dislike-' + sid).attr('id', 'post_like-' + sid);
                var count = $('#like_count-' + sid).html();
                $('#like_count-' + sid).html(parseInt(count) - 1);
            }
        })
    });

});