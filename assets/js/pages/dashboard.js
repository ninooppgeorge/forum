$(document).ready(function(){
    $('#postform').ajaxForm({
        error: function(data){
            console.log(data);
        },
        clearForm: true,
        beforeSubmit: function(){
            $('.loading_comp').show();
        },
        success: function(data){
            console.log(data);
            $('.dash_load_msg').prepend(data).slideDown();
            setInterval(()=>{
                $('.loading_comp').hide();
            },400);
        }
    });

    $('.comment_input').focusin(function(){
        var id = $(this).attr('id');
        var sid = id.split('-')[1];
        $('#comment_button-'+sid).show();
    });

    $('.comment_form').submit(function(){
        var id = $(this).attr('id');
        var sid = id.split('-')[1];
        console.log(sid,id);
        $(this).ajaxSubmit({
            clearForm: true,
            success: function(data){
                console.log(data);
                $('#append_comment-'+sid).append(data);
            }
        });
        return false;
    });

    $(document).on('click','.delete_btn',function(){
        var id = $(this).attr('id');
        var sid = id.split('-')[1];
        console.log(sid);
        $.ajax({
            url: './inc/dashboard/delete_comment.php',
            data: 'rid='+sid,
            type: 'POST',
            success: function(data){
                $('#comment-single-'+data).slideUp();
            }
        });
    });


    $(document).on('click','.post_like',function(){
        var id = $(this).attr('id');
        var sid = id.split('-')[1];
        $.ajax({
            url: './inc/dashboard/insert_like.php',
            data: 'id='+sid+'&type=0',
            type: 'POST',
            success: function(data){
                //alert(data);
            }
        })
    });

    $(document).on('click','.post_dislike',function(){
        var id = $(this).attr('id');
        var sid = id.split('-')[1];
        $.ajax({
            url: './inc/dashboard/insert_like.php',
            data: 'id='+sid+'&type=0&remove=true',
            type: 'POST',
            success: function(data){
                //alert(data);
            }
        })
    });

});