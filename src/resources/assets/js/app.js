$(document).ready(function() {
    setTimeout(() => {
        $('#successMsg').hide();
    }, 3000);

    $(".toggleButton").click(function () {
        let comment_Id = $(this).data('comment_id');
        $("#replyComment-"+comment_Id).toggle();;
    });
});
