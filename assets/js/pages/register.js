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
});