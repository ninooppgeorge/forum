$(document).ready(function(){
    $('#register').ajaxForm({
        success: function(data){
            console.log(data);
            if(data==="1"){
                $('.success').show();
            }else{
                $('.error').show();

            }
        }
    });

    $('#dept').change(function(){
        var dept = $(this).val();
        $.ajax({
            type: 'GET',
            url: './inc/register/get_sem.php',
            data: 'dept='+dept,
            success: function(data){
                $('#sem').empty();
                JSON.parse(data).forEach(element => {
                    $('#sem').append('<option value="'+element[0]+'">'+element[0]+'</option>');
                });
                $('#sem').show();
            },
            error: function(error){
                console.log(error);
            }
        });
    });
});