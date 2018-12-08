$(function () {
    "use strict";
    /*
    $('#atl').click(function() {
        
        $.ajax({
            url: '../Controllers/action_add_to_love.php',
            type: 'POST',
            data: {
                id: $('#id').val() 
            },
            success: function() {
                alert('Added To Love');
            }
        });
        
        $('#atl').hide();
        $('#act-love').show();
        
    });
    
    $('#rfl').click(function() {
        
        $.ajax({
            url: '../Controllers/action_remove_from_love.php',
            type: 'POST',
            data: {
                id: $('#id').val() 
            },
            success: function() {
                alert('Removed From Love');
            }
        });
        
        $('#act-love').hide();
        $('#atl').show();
        
    });
    */
    $('#myForm').on("submit", function(e){
        
        e.preventDefault();
        var myForm = document.getElementById('myForm');
        var data = new FormData(myForm);
        
        $.ajax({
        url : "../Controllers/action_add_to_love.php",
        data: data,
        success: function(data) {
            alert(data);
        },
        error: function(data){
            console.log("error");
            alert(data);
        }
        });
        
    });
    
});