//setInterval(ajaxCall, 6000);
function ajaxCall() {
    $.ajax(
        '../../app/controllers/comment.php',
        {
            success: function(data) {
                alert('AJAX call was successful!');
                alert('Data from the server' + data);
                console.log(data);
            },
            error: function(data) {
               console.log(data);
            }
        }
    );
}
ajaxCall();
