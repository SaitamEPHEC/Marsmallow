$(document).ready(function() {

    

    $('#control').click(function() {
        var mise = $("#mise").children("option:selected").val();


        $.post( "algo.php",{
            mise : mise
              }).done(function( data ) {
                console.log(data);

            var result =  jQuery.parseJSON(data);
            console.log(result);
            $("#gain").html(result[0]);
            $("#solde").html(result[1]);
                      });  
    })


})