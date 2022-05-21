$(document).ready(function() {
    $('a.like-button').click(function(e){
        e.preventDefault();
        $(this).parent().parent().find('form.like-form').submit();
    });

    $('a.dislike-button').click(function(e){
        e.preventDefault();
        $(this).parent().parent().find('form.dislike-form').submit();
    });
})
