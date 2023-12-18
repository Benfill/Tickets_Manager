let commentSection = document.querySelector('#comment-section');
let commentInput = document.querySelector('#comment');
function ajaxCall(commentValue, userValue, ticketValue) {
    $.ajax({
        type: 'POST',
        url: '../../app/controllers/comment.php',
        data: {
            comment: commentValue,
            user_id: userValue,
            ticket_id: ticketValue,
        },
        success: function(data) {
            commentsData = JSON.parse(data);


            console.log(commentsData);
            commentSection.innerHTML = "";
            for (let i = 0; i < commentsData.length; i++) {
                commentText = commentsData[i].comment;
                commentCreator = commentsData[i].user;
                picture = commentsData[i].picture;
            commentSection.innerHTML += `
                    <div class="flex p-2">
                    <img src="${picture}"
                         class="h-10 w-10 rounded-full mr-2 object-cover border-2 border-yellow-500" />
                    <div>
                        <h1 class="font-bold text-gray-700 text-sm">${commentCreator}</h1>
                        <!-- Comment Content Section -->
                        <p class="text-gray-700">
                            ${commentText}
                        </p>
                    </div>
                    </div>`;
            }

        },
        error: function(xhr, status, error) {
            console.error('AJAX call failed with status ' + status + ': ' + error);
        }
    });
}

$('#commentForm').submit(function (event) {
    // Prevent the default form submission
    event.preventDefault();
    // Call the ajaxCall function
    ajaxCall($('#comment').val(), $('#user_id').val(), $('#ticket_id').val());
    commentInput.value = "";
});

// Call ajaxCall immediately
ajaxCall();

 setInterval(ajaxCall, 1000);
