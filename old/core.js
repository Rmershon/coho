$(document).ready(function(){
    $(".pull-me").click(function(){
        $(".panel").slideToggle('slow');
        
        });
    $("#attLoad").click(function(){
        
    $("#page").html('<input type="date" name="day">');
    });
    
    
});