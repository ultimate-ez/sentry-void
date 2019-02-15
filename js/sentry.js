jQuery(function($){
  $(function(){

    // slick
    $('.slider-wrapper__auto .slider-items').slick({
      autoplay:true,
      autoplaySpeed:3000,
      arrows: false,
      dots:true,
      cssEase: 'ease-in-out',
      inifinite: true,
      slidesToShow:6,
      slidesToScroll:1,
      responsive: [
        {
          breakpoint: 1450,
          settings: {
            slidesToShow: 5,
          }
        },
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 4,
          }
        },
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 3,
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 2,
          }
        }
      ]
    });
    

    // /* Sticky Header & Footer */
    var $throttleTimeout = 200, // Sensitiity
        $hiddenClass = 'hidden', // Class Name to hide
        $stickyHeader = $('.global-header'), // Sticky Header
        $stickyFooter = $('.sentry-bottom-nav'); // Sticky Footer
        $stickyShareBox = $('.float-sns-box');  // Sticky Share Box

    if( !$stickyHeader.length || !$stickyFooter.length  ) return true;

    var $window         = $( window ),
        $document       = $( document ),
        wHeight         = 0,
        dHeight         = 0,
        wScrollCurrent  = 0,
        wScrollBefore   = 0,
        wScrollDiff     = 0,

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
      wHeight = $window.height();
      dHeight = $document.height();
      wScrollCurrent  = $window.scrollTop();
      wScrollDiff     = wScrollBefore - wScrollCurrent;

      $removePos = 36; // どのくらいスクロールしたらヘッダを隠すか？

      if( wScrollCurrent <= $removePos ) {
        $stickyHeader.removeClass( $hiddenClass );
      } else if( wScrollDiff > 0 && $stickyHeader.hasClass( $hiddenClass ) ){
        $stickyHeader.removeClass( $hiddenClass );
        $stickyFooter.removeClass( $hiddenClass );
      } else if( wScrollDiff < 0 ) {
        if( wScrollCurrent + wHeight >= dHeight && $stickyHeader.hasClass( $hiddenClass ) ){
          $stickyHeader.removeClass( $hiddenClass );
          $stickyFooter.removeClass( $hiddenClass );
        } else {
          $stickyHeader.addClass( $hiddenClass );
          $stickyFooter.addClass( $hiddenClass );
        }
      }

      wScrollBefore = wScrollCurrent;
    }));

    /* Scroll Button to TOP & SNS */
    $stickyShareBox.hide();
    $stickyFooter.hide();
    $stickyFooter.addClass($hiddenClass);
    $stickyShareBox.addClass($hiddenClass);
    $window.scroll(function () {
      if ($(this).scrollTop() > 100) {
        $stickyFooter.show();
        $stickyShareBox.show();
      } else {
        $stickyFooter.addClass($hiddenClass);
      }
    });

    $('#btn-top').click(function () {
      $('body,html').animate({scrollTop:0});
      return false;
    });

    $('#btn-share').click(function(){
      $stickyShareBox.show();
      $stickyShareBox.removeClass($hiddenClass);
      return false;
    });
    $('#btn-close').click(function(){
      $stickyShareBox.addClass($hiddenClass);
      return false;
    });

    /* Top Slider */
    $slideItems = $('.slider-items');
    if ($slideItems.length){

      $slideLeftButton  = $('.slider-nav-button-left');
      $slideRightButton = $('.slider-nav-button-right');
      $slideLength      = $('.slider-items .slide-item:first-child').width();
      $slideStepWidth   = $slideLength * 3;
      
      checkSliderScroll();
    
      $slideLeftButton.click(function(){
        $slideItems.stop(true, false).animate({scrollLeft:　$slideItems.scrollLeft() - $slideStepWidth}, 'slow', function(){
          $slideItems.queue([]);
          $slideItems.stop();
        });
      });
      $slideRightButton.click(function(){
        $slideItems.stop(true, false).animate({scrollLeft:　$slideItems.scrollLeft() + $slideStepWidth}, 'slow', function(){
          $slideItems.queue([]);
          $slideItems.stop();
        });
      });

      $slideItems.scroll(function(){
        checkSliderScroll();
      });
    }

    function checkSliderScroll () {

      $firstItem = $('.slider-items .slide-item:first-child');
      $lastItem  = $('.slider-items .slide-item:last-child');
      $firstItemPos = $firstItem.offset().left;
      $lastItemPos  = $lastItem.offset().left + $lastItem.width();

      if ( $firstItemPos < 0 ){
        $slideLeftButton.show();
      } else {
        $slideLeftButton.hide();
      }

      if ( $lastItemPos < $window.width() + 10 ){
        $slideRightButton.hide();
      } else {
        $slideRightButton.show();
      }

    }

    /* Header Menu SLider */
    $headerMenuItems = $('.head-menu-items');
    if ($headerMenuItems.length){

      $headerMenuLeftButton  = $('.head-menu-nav-button-left');
      $headerMenuRightButton = $('.head-menu-nav-button-right');

      if ( ($headerMenuLeftButton.length) && ($headerMenuRightButton.length) ){

        $headerMenuStepWidth = $window.width() / 2;
      
        checkHeaderMenuScrol();
      
        $headerMenuLeftButton.click(function(){
          $headerMenuItems.stop(true, false).animate({scrollLeft:　$headerMenuItems.scrollLeft() - $headerMenuStepWidth}, 'slow', function(){
            $headerMenuItems.queue([]);
            $headerMenuItems.stop();
          });
        });
        $headerMenuRightButton.click(function(){
          $headerMenuItems.stop(true, false).animate({scrollLeft:　$headerMenuItems.scrollLeft() + $headerMenuStepWidth}, 'slow', function(){
            $headerMenuItems.queue([]);
            $headerMenuItems.stop();
          });
        });

        $headerMenuItems.scroll(function(){
          checkHeaderMenuScrol();
        });

      }
    }

    function checkHeaderMenuScrol (){
      $firstItem = $('.head-menu-items .menu-item:first-child');
      $lastItem  = $('.head-menu-items .menu-item:last-child');

      if ( ($firstItem.length) && ($lastItem.length)){
        
        $firstItemPos = $firstItem.offset().left;
        $lastItemPos  = $lastItem.offset().left + $lastItem.width();

        if ( $firstItemPos < 0 ){
          $headerMenuLeftButton.show();
        } else {
          $headerMenuLeftButton.hide();
        }

        if ( $lastItemPos < $window.width() + 10 ){
          $headerMenuRightButton.hide();
        } else {
          $headerMenuRightButton.show();
        }

      }
    }

    /* ヨメレバ、ポチレバ、カエレバのリンクに「target="_blank"」を付与 */
    $( '.cstmreba a' ).attr( 'target', '_blank');
  });
});
