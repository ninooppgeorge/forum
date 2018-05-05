$(document).ready(function(){
    $('#login').ajaxForm({
        error: function(data){
            console.log(data);
        },
        
        success: function(data){
            console.log(data);
            data = parseInt(data);
            if(data==1){
                window.location = "dashboard.php";
            }else if(data==2){
                window.location = "admin.php";
            }else if(data==0){
                $('.error').show();
            }
        }
    });
});