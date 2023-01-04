/* ========================< Navbar Active Color Change >======================*/
$(function(){
    $('.navbar-nav li a').filter(function(){return this.href==location.href}).parent().addClass('active').siblings().removeClass('active')
    $('.navbar-nav li a').click(function(){
      $(this).parent().addClass('active').siblings().removeClass('active')  
    })
  })
/* ========================< Navbar Fixed Top after scrolling >======================*/

$(window).scroll(function(){
  var navPos = $('.navbar').offset().top;
  //var navId = document.getElementById("mainNav");
  //alert($(this).scrollTop());
  if ($(this).scrollTop() >= navPos) {
	     $( "nav" ).addClass( " sticky-top" );
	} else {
	     $( "nav" ).removeClass( " sticky-top" );
	}
});

/* ========================< Nice Scroll >======================*/
// $('.card, .news-list').niceScroll();
$('#myTabContent, .news-list, .media-news').niceScroll({
  cursorcolor:"#003459",
  cursorwidth:"5px",
  zindex:'99999999',
  smoothscroll:'true',
  cursorborder:"1px solid #003459",
  cursorborderradius: 5
});
/* ========================< Owl Caurosel >======================*/
$('#recentNewsOwl').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    autoplay:true,
    /*dotsEach:3,*/
     /*navigationText: [
      "<i class='icon-chevron-left icon-white'></i>",
      "<i class='icon-chevron-right icon-white'></i>"
      ],*/
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})

$('#nationalNewsOwl,#politicalNewsOwl,#internationalNewsOwl,#religionNewsOwl,#sportsNewsOwl,#entertainmentNewsOwl').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    autoplay:true,
   /* dotsEach:3,*/
     responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})


/* ========================< Scroll Up >======================*/
$.scrollUp({
  	scrollImg: true
});

/* ========================< Sticky Nav Hide Near Footer >======================*/

$(window).scroll(function(){
  if ($(window).scrollTop() + $(window).height() > ($(document).height() - 100) ) {
       $("nav").removeClass("sticky-top");
  }
});