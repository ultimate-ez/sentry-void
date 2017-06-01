jQuery(function($){
  $(function(){

    var $hiddenClass = 'hidden',
      $seHeader = $('.header'),
      $throttleTimeout = 500;
      $nav = $('.sentry-nav'),
      $bnav = $('.sentry-bottom-nav'),
      $btn = $('.sentry-nav button'),
      $vlinks = $('.sentry-nav .visible-links'),
      $hlinks = $('.sentry-nav .hidden-links');

    /* Start Sticky Header */

    if( !$seHeader.length ) return true;

    var $window         = $( window ),
        wHeight         = 0,
        wScrollCurrent  = 0,
        wScrollBefore   = 0,
        wScrollDiff     = 0,
        $document       = $( document ),
        dHeight         = 0,

    throttle = function( delay, fn ) {
      var last, deferTimer;
      return function() {
        var context = this, args = arguments, now = +new Date;
        if( last && now < last + delay ) {
          clearTimeout( deferTimer );
          deferTimer = setTimeout( function(){ last = now; fn.apply( context, args ); }, delay );
        } else {
          last = now;
          fn.apply( context, args );
        }
      };
    };

    $window.on( 'scroll', throttle( $throttleTimeout, function() {
      dHeight = $document.height();
      wHeight = $window.height();
      wScrollCurrent  = $window.scrollTop();
      wScrollDiff     = wScrollBefore - wScrollCurrent;

      if( wScrollCurrent <= 0 ) {
        $seHeader.removeClass( $hiddenClass );
      } else if( wScrollDiff > 0 && $seHeader.hasClass( $hiddenClass ) ){
        $seHeader.removeClass( $hiddenClass );
        $bnav.removeClass( $hiddenClass );
      } else if( wScrollDiff < 0 ) {
        if( wScrollCurrent + wHeight >= dHeight && $seHeader.hasClass( $hiddenClass ) ){
          $seHeader.removeClass( $hiddenClass );
          $bnav.removeClass( $hiddenClass );
        } else {
          $seHeader.addClass( $hiddenClass );
          $bnav.addClass( $hiddenClass );
          $hlinks.addClass( $hiddenClass );
        }
      }

      wScrollBefore = wScrollCurrent;
    }));
    /* End Sticky Header */

    /* start Greedy Nav */
    var breaks = [];

    function updateNav() {

      var availableSpace = $btn.hasClass( $hiddenClass ) ? $nav.width() : $nav.width() - $btn.width() - 30;

      if($vlinks.width() > availableSpace) {

        breaks.push($vlinks.width());
        $vlinks.children().last().prependTo($hlinks);
        if($btn.hasClass( $hiddenClass )) {
          $btn.removeClass( $hiddenClass );
        }

      } else {
        if(availableSpace > breaks[breaks.length-1]) {
          $hlinks.children().first().appendTo($vlinks);
          breaks.pop();
        }
        if(breaks.length < 1) {
          $btn.addClass( $hiddenClass );
          $hlinks.addClass( $hiddenClass );
        }
      }

      $btn.attr("count", breaks.length);

      if($vlinks.width() > availableSpace) {
        updateNav();
      }

      $vlinks.css('visibility', 'visible' );

    }

    $(window).resize(function() {
      updateNav();
    });

    $btn.on('click', function() {
      $hlinks.toggleClass( $hiddenClass );
    });

    updateNav();
    /* End Greedy Nav */

    /* Scroll Button to TOP & SNS */
    $bnav.hide();
    $bnav.addClass($hiddenClass);
    $(window).scroll(function () {
      if ($(this).scrollTop() > 100) {
        $bnav.show();
      } else {
        $bnav.addClass($hiddenClass);
      }
    });

    $('#btn-top').click(function () {
      $('body,html').animate({scrollTop:0});
      return false;
    });

    $('#btn-share').click(function(){
      $('body,html').animate({scrollTop:$('#sns-share-bottom').offset().top});
      setTimeout(function(){
        $seHeader.addClass( $hiddenClass );
      },600);
      return false;
    });

    /* Comment Customize */
     $('#comments .pagination a').addClass('button');
     $('#comment_submit').addClass('button');

     $( 'article .entry-content table' ).addClass('table is-bordered is-striped');

    /* Popular Posts Tab */
    $('#se_popular_posts .tabs ul li').click(function() {

      var index = $('#se_popular_posts .tabs ul li').index(this);
      $('#se_popular_posts .wpp_content').css('display','none');
      $('#se_popular_posts .wpp_content').eq(index).css('display','block');
      $('#se_popular_posts .tablist' ).removeClass("is-active");
      $('#se_popular_posts .tablist' ).eq(index).addClass("is-active");

      return false;
    });

    /* sticky sidebar */
    $('div#sidebar div.sidebar-main.sticky').fitSidebar({
      wrapper : 'div#inner-content',
      responsiveWidth : 979,
    });

    /* for slick */
    $('.sentry-slider').slick({
      arrows: false,
      dots: true,
      speed: 300,
      slidesToShow: 5,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      responsive:[
        {
          breakpoint: 1180,
          settings: { slidesToShow: 4 }
        },
        {
          breakpoint: 980,
          settings: { slidesToShow: 3 }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            dots: false
          }
        }
      ]
    });
    $( '.sentry-slider' ).show();

    /* ヨメレバ、ポチレバ、カエレバのリンクに「target="_blank"」を付与 */
    $( '.cstmreba a' ).attr( 'target', '_blank');
  });
});
