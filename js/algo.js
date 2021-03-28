$(document).ready(function() {

    
$(".mise").click(function() {

    $(".mise").removeClass("miseActive");
    $(this).addClass("miseActive");

})
  

$(".start").click(function() {

    $(".start").css("display","none");
    $(".background").css("display","block");

})

$(".checkInfo").click(function() {
    $.dialog({
        title: 'test',
        content: 'test',
    });
})

})