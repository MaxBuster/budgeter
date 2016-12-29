$(document).ready(function(){
    $('form').submit(function(event){
        $('#warning').hide(400);
        $('#warning-message').text('');
        var username = $('#username').val();
        var password = $('#password').val();
        var post = $.ajax({
            type: "POST",
            url: "../resources/library/login_user.php",
            data: {username:username, password:password},
            dataType: 'text',
            success: function(response){
                console.log(response);
                var json_response = $.parseJSON(response);
                if (json_response.authenticated == true) {
                    window.location.href = "new_entry.php";
                } else {
                    $('#warning-message').text(json_response.error);
                    $('#warning').show(1000);
                }
            }
        });
        post.error(function() {
            $('#warning-message').text('Error submitting form');
            $('#warning').show(1000);
        });
        return false;
    });
});