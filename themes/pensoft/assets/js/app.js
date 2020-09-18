
var documentHasScroll = function() {
    return window.innerHeight <= document.body.offsetHeight;
};
var keepFooter = function(documentHasScroll){
    if(documentHasScroll){
        document.getElementById("layout-footer").classList.remove('fixed-bottom');
    }else{
        document.getElementById("layout-footer").classList.add('fixed-bottom');
    }
}


window.addEventListener('scroll', function (e) {
    var headernavbar = document.getElementById("headernavbar");
    if (window.scrollY > headernavbar.offsetHeight){
        var headerNavbarNav = document.querySelector('#headerNavbarNav')
        var navbar_toggler = document.querySelector('.navbar-toggler');
        headernavbar.classList.add('scrolled');
        headernavbar.classList.add('fixed');

        if (navbar_toggler.classList.contains('collapsed') == true) {
            navbar_toggler.classList.toggle('collapsed');
            $(headerNavbarNav).stop(false, true).slideUp(function () {
                headernavbar.classList.add('fixed')
                var layout_header = document.getElementById("layout-header");
                $("html, body").animate({ scrollTop: layout_header.offsetTop }, 400);
            });
        }
    }else{
        headernavbar.classList.remove('scrolled');
    }
});

function encodeURIObject(data){
    return Object.keys(data).map(function (i) {
        return encodeURIComponent(i) + '=' + encodeURIComponent(data[i])
    }).join('&');
}

function createTippy(element, options){
    return new Promise(resolve => {
        tippy(element, Object.assign({}, {
            allowHTML: true,
            interactive: true,
            animation: 'scale',
            theme: 'light',
        }, options));
        resolve();
    });
}

function cardCarousel(){
    return new Promise(resolve => {
        $('#card-carousel').slick({
            slidesToShow: 3,
            slidesToScroll: 3,
            autoplay: true,
            autoplaySpeed: 6000,
        });
        resolve()
    });
}

function appendProfile() {
    $(document).on('profile', function (e) {
        var headerNavbarNav = $('#headerNavbarNav');
        var li = '<li class="nav-item"><a href="http://maia.pensoft.com/profile" target = "_self">Profile</a></li >';
        headerNavbarNav.find('>ul').append(li);
    });
}
function appendSignIn(){
    $(document).on('signin', function (e) {
        var headerNavbarNav = $('#headerNavbarNav');
        var li = '<li class="nav-item"><a href="http://maia.pensoft.com/login" target = "_self">Sign in</a></li >';
        headerNavbarNav.find('>ul').append(li);
    });
}

function appendSignOut() {
    $(document).on('signout', function (e) {
        var headerNavbarNav = $('#headerNavbarNav');
        var li = '<li class="nav-item"><a data-request="onLogout" data-request-data="redirect: \'/\'">Sign out</a></li >';
        headerNavbarNav.find('>ul').append(li);
    });
}

function autoRequestFormLibrary(){
    $('#libraryForm').on('change', 'input, select', function () {
        var $form = $(this).closest('form');

        $form.request();
    })
}
function init() {
    window.addEventListener('resize', function () {
        keepFooter(documentHasScroll());
    });
    document.addEventListener('DOMContentLoaded', function () {
        onLoadedDomContent();
        autoRequestFormLibrary();
    });
    // appendProfile()
    // appendSignIn()
    appendSignOut()
}

async function onLoadedDomContent(){
    await cardCarousel();
    keepFooter(documentHasScroll());
}




init()