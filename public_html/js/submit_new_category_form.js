$(document).ready(function(){
    $('.category-form').submit(function(event){
        var category = $('#category').val();
        var amount = $('#category_budget').val();
        var post = $.ajax({
            type: "POST",
            url: "../resources/library/add_category.php",
            data: {category:category, amount:amount},
            dataType: 'text',
            success: function(response){
                console.log(response);
                var json_response = $.parseJSON(response);
                if (json_response.added == true) {
                    $('.table tr:last').after(
                        '<tr>'
                            + '<td>' + category + '</td>'
                            + '<td>' + amount + '</td>'
                        + '</tr>'
                    );
                }
            }
        });
        return false;
    });
});