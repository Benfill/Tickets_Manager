

function callAjax() {
    $.ajax({
        type: "POST",
        url: "../../app/controllers/get_all_ticket.php",
        success: function (data) {
            console.log(data);
        },

        error: function(xhr, status, error) {
            console.error('AJAX call failed with status ' + status + ': ' + error);

    }});
}

callAjax();