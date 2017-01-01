$(document).ready(function(){
    $('.budget-form').submit(function(event){
        var budget = $('#monthly_budget').val();
        var post = $.ajax({
            type: "POST",
            url: "../resources/library/add_budget.php",
            data: {budget:budget},
            dataType: 'text',
            success: function(response){
                console.log(response);
                var json_response = $.parseJSON(response);
                if (json_response.added == true) {
                    $('#budget').show();
                    $('#budget').text("Current: $" + budget);
                } else {
                    console.log("Budget not added");
                }
            }
        });
        return false;
    });
});