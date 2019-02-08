$('section').hide(); 
$('#main').show();

$(function(){
    $('.menu li a').click(function(){
      $('.pages').hide();
      var page = $(this).attr('href');
    $(page).show();
  })
})

$(document).ready(function(){
    $("header, footer").on("click",".menu a", function (event) {
        event.preventDefault();
        var id  = $(this).attr('href'),
            top = $(id).offset().top;
        $('body,html').animate({scrollTop: top}, 1500);
    });
});

$(document).ready(function(){
    $("header, footer").on("click",".arrow", function (event) {
        event.preventDefault();
        var id  = $(this).attr('href'),
            top = $(id).offset().top;
        $('body,html').animate({scrollTop: top}, 1500);
    });
});

$(document).ready(function(){
    $("header, footer").on("click",".top", function (event) {
        event.preventDefault();
        var id  = $(this).attr('href'),
            top = $(id).offset().top;
        $('body,html').animate({scrollTop: top}, 1500);
    });
});