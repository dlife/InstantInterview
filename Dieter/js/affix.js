/**
 * Created by Dieter on 5/05/2015.
 */
$('#nav').affix({
    offset: {
        top: $('header').height()
    }
});

$('section').css("height", $(window).height());

$('#scroll').scrollspy({target: '#nav'});

$('.scrollAnimate').click(function(event){
    // preventDefault zorgt voor een smooth overgang
    event.preventDefault();
    $('html, body').animate({
            scrollTop: $(this.children[0].attributes[0].value).offset().top}, 1000
    );
});
