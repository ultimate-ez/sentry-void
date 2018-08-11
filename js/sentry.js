jQuery(function($){
  $(function(){

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
    $(window).scroll(function () {
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

    /* ヨメレバ、ポチレバ、カエレバのリンクに「target="_blank"」を付与 */
    $( '.cstmreba a' ).attr( 'target', '_blank');
  });
});
