$(document).ready(function () {
    $('#create-comment-btn').click(function (event) {
        event.preventDefault();
        const data = $('#create-comment').serialize();
        const bookId = $('#book_id').val();
        $.ajax({
            url: `/articles/${bookId}/comments`,
            method: "POST",
            data: data
        })
            .done(function (msg) {
                console.log('message => ', msg.comment);
                renderData(msg.comment);
            })
            .fail(function (response) {
                console.log('FAIL RESPONSE =================> ', response);
            });
    });


    function renderData(comment) {
        let commentsBlock = $('.scrollit');
        let current_datetime = new Date(comment.created_at);
        let formatted_date = current_datetime.getFullYear() + "-" + (current_datetime.getMonth() + 1) + "-" + current_datetime.getDate() + " " + current_datetime.getHours() + ":" + current_datetime.getMinutes() + ":" + current_datetime.getSeconds();

        let html = "<div>" +
            "<div class='media g-mb-30 media-comment'>" +
            ` <img class='d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15' src='${window.location.origin}/default_avatar.png' alt='Image Description'>` +
            " <div class='media-body u-shadow-v18 g-bg-secondary g-pa-30'>" +
            "  <div class='g-mb-15'>" +
            `   <h5 class='h5 g-color-gray-dark-v1 mb-0'>${comment.author}</h5>\n` +
            `   <span class='g-color-gray-dark-v4 g-font-size-12'>${formatted_date}</span>` +
            "  </div>" +
            "  <p>" +
            `    ${comment.body}` +
            "  </p>" +
            " </div>" +
            "</div>" +
            "</div>";

        $(commentsBlock).append(html);
        clearForm();
    }

    function clearForm() {
        $("#create-comment").trigger('reset');
    }
});

