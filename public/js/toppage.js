
$('.slider').slick({
  dots: false,
  infinite: true,
  speed: 500,
  fade: true,
  cssEase: 'linear',
  autoplay: true,
  infinite: true,
  arrows:false,
  pauseOnHover: false,
  // accessibility: false,
  autoplaySpeed: 4000,
});
$('.multiple-items').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    dots: true,
  });
  
$(function() {
	setTimeout(function(){
		$('.start p').fadeIn(800);
	},500); //0.5秒後にロゴをフェードイン
	setTimeout(function(){
		$('.start').fadeOut(500);
	},2000); //2.０秒後にロゴ含め真っ白背景をフェードアウト
});

$(function(){
  load_effect();
  $(window).scroll(function (){
      scroll_effect();
  });
});


function load_effect(){
  var tt = $(window).scrollTop();
  var hh = $(window).height();
  $('.load-fade').each(function(){
      var yy = $(this).offset().top;
      if (tt > yy - hh){
          $(this).addClass('done');
      }
  });
  $('.load-up').each(function(){
      var yy = $(this).offset().top;
      if (tt > yy - hh){
          $(this).addClass('done');
      }
  });
}


function scroll_effect(){
  var tt = $(window).scrollTop();
  var hh = $(window).height();
  $('.scroll-fade').each(function(){
      var yy = $(this).offset().top+400;
      if (tt > yy - hh){
          $(this).addClass('done');
      }
  });
  $('.scroll-up').each(function(){
      var yy = $(this).offset().top+200;
      if (tt > yy - hh){
          $(this).addClass('done');
      }
  });
}