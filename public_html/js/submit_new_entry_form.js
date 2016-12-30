$(document).ready(function(){
    $('form').submit(function(event){
        $('#success').hide(400);
        $('#success-message').text('');
        $('#warning').hide(400);
        $('#warning-message').text('');
        var date = $('#date').val();
        var category_id = $('#category_id').val();
        var amount = $('#amount').val();
        var description = $('#description').val();
        var post = $.ajax({
            type: "POST",
            url: "../resources/library/new_entry.php",
            data: {date:date, category_id:category_id, amount:amount, description:description},
            dataType: 'text',
            success: function(response){
                console.log(response);
                var json_response = $.parseJSON(response);
                if (json_response.added == true) {
                    $('#success-message').text("Entry Added");
                    $('#success').show(1000);
                } else {
                    $('#warning-message').text("Entry not added");
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