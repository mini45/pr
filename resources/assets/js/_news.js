$(function () {

    $('.slide-trigger').click(function () {

        var glyph = $(this).children().children();//('.glyphicon');
        //console.log(glyph);
        if(glyph.hasClass('glyphicon-plus-sign'))
        {
            glyph.removeClass('glyphicon-plus-sign');
            glyph.addClass('glyphicon-minus-sign');
        }
        else{
            glyph.removeClass('glyphicon-minus-sign');
            glyph.addClass('glyphicon-plus-sign');
        }
        var $comment = $(this).next('.comment-section');

        $comment.slideToggle(500);


    });
});