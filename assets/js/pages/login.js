$(document).ready(function(){
    $('#login').ajaxForm({
        error: function(data){
            console.log(data);
        },
        
        success: function(data){
            console.log(data);
            if(data==="1"){
                window.location = "dashboard.php";
            }else{
                $('.error').show();

            }
        }
    });
});