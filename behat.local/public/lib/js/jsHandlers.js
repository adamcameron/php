$(document).ready(function(){
     $("#jsContent").text("This is content loaded via JavaScript");

    $.getJSON("/index.php/ajax/sub", function(response){
        $("#ajaxContent").text(response.result);
    });
});
