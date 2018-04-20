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

});