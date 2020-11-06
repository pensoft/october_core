
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

function initSort(containerId, folderId, type){
	var link = document.querySelector('.accordion-toggle');
	if(link){
		link.addEventListener('click', function(event) {
			if($(this).next(".accordion-content").is(':visible')) {
				$(this).next(".accordion-content").slideUp(300);
				$(this).children(".plusminus").html('<span class="plus"></span>');
			}
		});
	}


	if(type == 'folders'){
		$( "#"+containerId ).sortable({
			revert: true,
			opacity: 0.8,
			handle: (type == 'images') ? false : ".drag-handle",
			placeholder: (type == 'images') ? false : "ui-state-highlight",
			start: function(e, ui) {
				// creates a temporary attribute on the element with the old index
				$(this).attr('data-previndex', ui.item.index());
			},
			update: function( event, ui ) {

				var id = ui.item.attr("id").replace('delete_result_','');
				var prevSiblingId = ui.item.prev();
				if(prevSiblingId.length > 0){
					prevSiblingId = ui.item.prev().attr('id').replace('delete_result_','');
					var targetNode = prevSiblingId;
					var position = 'right';
				}
				var nextSiblingId = ui.item.next();
				if(nextSiblingId.length > 0){
					nextSiblingId = ui.item.next().attr('id').replace('delete_result_','');
					var targetNode = nextSiblingId;
					var position = 'left';
				}
				$(this).removeAttr('data-previndex');

				var data = $( "#"+containerId ).sortable( "serialize", { key: "sortItem[]" } );
				$.request('onSortFolders',
					{
						data: {
							'sortOrder': data,
							'subfolderId': folderId,
							'sourceNode': id,
							'targetNode': targetNode,
							'position': position
						},
					});
			}
		});
	}else{
		$( "#"+containerId ).sortable({
			revert: true,
			opacity: 0.8,
			handle: (type == 'images') ? false : ".drag-handle",
			placeholder: (type == 'images') ? false : "ui-state-highlight",
			update: function( event, ui ) {
				var data = $( "#"+containerId ).sortable( "serialize", { key: "sortItem[]" } );
				$.request('onSortFiles',
					{
						data: {
							'sortOrder': data,
							'subfolderId': folderId,
						},
					});
			}
		});
	}



	$( "#"+containerId ).disableSelection();
}

function isBreakpointLarge(){
    return window.innerWidth <= 991;
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


function initRightclickDeleteTippy(id, type='file', file = '', pUserCanDelete){
	var html = '';
	if(type == 'image'){
		html = html+'<a href="javascript:;" data-request="onDownloadHandler" data-request-data="files:  [' + file + ']" target="_blank" class="download-icon">Download</a><br>';
	}

	if(pUserCanDelete){
		html = html+'<a class="delete-icon" href="javascript:;" title="Delete" data-request="onDeleteFile" data-request-data="id:  ' + id + '"  data-request-confirm="Are you sure you want to delete?">Delete</a>';
	}


	var rightClickableArea = document.querySelector('#tipContainer'+id);
	if(rightClickableArea){
		var instance = tippy(rightClickableArea, {
			placement: 'right-start',
			trigger: 'manual',
			interactive: true,
			arrow: false,
			content: html,
			allowHTML: true,
			animation: 'scale',
			theme: 'light',
		});

		rightClickableArea.addEventListener('contextmenu', (event) => {
			event.preventDefault();

			instance.setProps({
				getReferenceClientRect: () => ({
					width: 0,
					height: 0,
					top: event.clientY,
					bottom: event.clientY,
					left: event.clientX,
					right: event.clientX,
				}),
			});

			instance.show();
		});
	}
}

function initRightclickRenameFolderTippy(id, pUserCanDelete){
	var rightClickableArea = document.querySelector('#tipContainer'+id);
	var html = '<a data-toggle="modal" href="#contentBasicEditFolder' + id + '" style="margin-left: 0;">Rename</a>';
	if(pUserCanDelete){
		var html = html+'<br><a class="delete-icon" href="javascript:;" title="Delete" data-request="onDeleteFolder" data-request-data="id:  ' + id + '"  data-request-confirm="Are you sure you want to delete?">Delete</a>';
	}

	if(rightClickableArea){
		var instance = tippy(rightClickableArea, {
			placement: 'right-start',
			trigger: 'manual',
			interactive: true,
			arrow: false,
			content: html,
			allowHTML: true,
			animation: 'scale',
			theme: 'light',
		});

		rightClickableArea.addEventListener('contextmenu', (event) => {
			event.preventDefault();

			instance.setProps({
				getReferenceClientRect: () => ({
					width: 0,
					height: 0,
					top: event.clientY,
					bottom: event.clientY,
					left: event.clientX,
					right: event.clientX,
				}),
			});

			instance.show();
		});
	}
}


function toggleImages(id){
	$('.all_images_container').toggleClass('changeHeight', 500);
	if($('.show_all_btn'+id).text() == "Show all"){
		$('.show_all_btn'+id).text('Show less');
	} else if($('.show_all_btn'+id).text() == 'Show less'){
		$('.show_all_btn'+id).text('Show all');
	}
}


function cardCarousel(object){
    return new Promise(resolve => {
        $('#card-carousel').slick(object);
        resolve()
    });
}

function appendProfile() {
    $(document).on('profile', function (e) {
        var headerNavbarNav = $('#headerNavbarNav');
        var li = '<li class="nav-item"><a href="/profile" target = "_self">Profile</a></li >';
        headerNavbarNav.find('>ul').append(li);
    });
}
function appendSignIn(){
    $(document).on('signin', function (e) {
        var headerNavbarNav = $('#headerNavbarNav');
        var li = '<li class="nav-item sign-in"><a href="/login" target = "_self">Login</a></li >';
        headerNavbarNav.find('>ul').append(li);
    });
}

function appendSignOut() {
    $(document).on('signout', function (e) {
        var headerNavbarNav = $('#headerNavbarNav');
        var li = '<li class="nav-item  sign-in"><a data-request="onLogout" data-request-data="redirect: \'/\'">Logout</a></li >';
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
        if (isBreakpointLarge()){
            $('#card-carousel').slick('unslick');
        }else{
            cardCarousel({
                slidesToShow: 3,
                slidesToScroll: 3,
                autoplay: true,
				autoplaySpeed: 6000,
				prevArrow: '<i class="slick-prev p p-back"/>',
				nextArrow: '<i class="slick-next p p-forward"/>',
            });
        }
    });
    document.addEventListener('DOMContentLoaded', function () {
        onLoadedDomContent();
        autoRequestFormLibrary();
    });
    // appendProfile()
    appendSignIn()
    appendSignOut()
}

async function onLoadedDomContent(){
    if (!isBreakpointLarge()) {
        await cardCarousel({
            slidesToShow: 3,
            slidesToScroll: 3,
            autoplay: true,
			autoplaySpeed: 6000,
			prevArrow: '<i class="slick-prev pr p-back"/>',
			nextArrow: '<i class="slick-next pr p-forward"/>',
        });
    }
    keepFooter(documentHasScroll());
}


function handleSVGMapMouseMove(event) {
	var countryId = $(event.target).attr('class');
	var countryName = $(event.target).attr('title');
	var tooltip = document.getElementById("tooltip");
	if(!countryId){
		countryId = $(event.target).parent().attr('class');
	}
	switch (countryId) {
		case "BG":
		case "GR":
		case "CZ":
		case "DE":
		case "NL":
		case "BE":
		case "FR":
		case "ES":
		case "GB":
		case "SE":
		case "FI":
		case "NO":
			break;
		default:
			return tooltip.classList.remove("active");
	}

	var x = event.clientX;
	var y = event.clientY;

	tooltip.style.left = (x + 20) + "px";
	tooltip.style.top = (y - 20) + "px";
	tooltip.innerHTML = $(event.target).attr('title');
	tooltip.classList.add("active");

}

function filterSVGMap(pCountryElem) {
	$.request('onFilterSVGMap',
		{
			update: { partnerslist: '#partnersListDiv'},
			data: {country: pCountryElem},
		});
	$('html, body').animate({
		scrollTop: $("#partnersListDiv").offset().top - 100
	}, 1000);
	var tooltip = document.getElementById("tooltip");
	tooltip.classList.remove("active");
}

function initAccordeon(pElem, pParentId) {
	$('#tipContainer'+pParentId).parent().next().slideDown(300);
	$('#tipContainer'+pParentId).parent().children(".plusminus").html('<span class="minus"></span>');

	$('body').on('click','.accordion-toggle',function(){
		if($(this).next(".accordion-content").is(':visible')) {
			$(this).next(".accordion-content").slideUp(300);
			$(this).children(".plusminus").html('<span class="plus"></span>');
		} else {
			$(this).next(".accordion-content").slideDown(300);
			$(this).children(".plusminus").html('<span class="minus"></span>');
		}
	});
	// $('#' + pElem).find('.accordion-toggle').click(function () {
	// 	if($(this).next(".accordion-content").is(':visible')) {
	// 		$(this).next(".accordion-content").slideUp(300);
	// 		$(this).children(".plusminus").html('<span class="plus"></span>');
	// 	} else {
	// 		$(this).next(".accordion-content").slideDown(300);
	// 		$(this).children(".plusminus").html('<span class="minus"></span>');
	// 	}
	// });
}

init()
