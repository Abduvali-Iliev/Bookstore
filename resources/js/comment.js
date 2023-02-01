$(document).ready(function () {

    $('#create-comment-btn').click(function (event) {
        event.preventDefault();

        const data = $('#create-comment').serialize();
        const books_id= $('#book_id').val();

        $.ajax({
            url: `/books/${books_id}/comments`,
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
        commentsBlock.prepend(comment);
        clearForm();
    }
    function clearForm() {
        $("#create-comment").trigger('reset');
    }
});
