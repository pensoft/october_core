/*
 * Application
 */

// $(document).tooltip({
//     selector: "[data-toggle=tooltip]"
// })

function hideMenu() {
    $('#menu').addClass('d-none');
}
function showMenu() {
    $('#menu').removeClass('d-none');
}

/*
 * Auto hide navbar
 */
jQuery(document).ready(function($){
    var $header = $('.navbar-autohide'),
        scrolling = false,
        previousTop = 0,
        currentTop = 0,
        scrollDelta = 10,
        scrollOffset = 150

    $(window).on('scroll', function(){
        if (!scrolling) {
            scrolling = true

            if (!window.requestAnimationFrame) {
                setTimeout(autoHideHeader, 250)
            }
            else {
                requestAnimationFrame(autoHideHeader)
            }
        }
    })

    function autoHideHeader() {
        var currentTop = $(window).scrollTop()

        // Scrolling up
        if (previousTop - currentTop > scrollDelta) {
            $header.removeClass('is-hidden')
        }
        else if (currentTop - previousTop > scrollDelta && currentTop > scrollOffset) {
            // Scrolling down
            $header.addClass('is-hidden')
        }

        previousTop = currentTop
        scrolling = false
    }

    function hasScroll(){
        return window.innerHeight <= document.body.offsetHeight;
    }
    
    setInterval(() => {
        if( hasScroll() ){
            $('.footer').removeClass('footer-fixed');
        }else{
            $('.footer').addClass('footer-fixed');
        }
    }, 100);

    window.addEventListener("scroll", function(e){
        var scroll = this.scrollY;
        var layoutHeader = $('.layout-header');
        var height = layoutHeader.outerHeight();
        if (scroll > height){
            layoutHeader.addClass('header-fixed');
        }else{
            layoutHeader.removeClass('header-fixed');
        }
    });
});
