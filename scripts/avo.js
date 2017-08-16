var avo = avo || {};

avo.images = (function() {

	var curr_image = 1;
	var max_images;
	var map;
	var infoBubble;
	var infoContent;
	
	var initimages = function () {
		// this resizes the banner height which is needed because the slideshow images inside it don't have a height defined to allow them to be animated in the slideshow while keeping their correct aspect ratio no matter what browser width
		$(window).on('resize', function() {
			if (!$('#cssmenu > ul li#responsive-tab').is(':visible')) {
				$('banner').css('height' , $('banner slideshow img:first-of-type').outerHeight(true));
			} else {
				$('banner').css('height' , $('banner slideshow img:first-of-type').outerHeight(true) + $('banner .logo-wrapper').outerHeight(true));
			}
		});
		$(window).resize();
	};

	var startslideshow = function () {
		// create images in the banner for each slideshow image, this will also download each image so make sure the filesizes are <200k each
		$('#slideshow-images span').each(function(index) {
			$('banner slideshow').append('<img class="cross-fade banner-image" data-index="' + (index+2) + '" title="' + $(this).data('title') + '" src="' + $(this).data('src') + '" />');
		});
		
		// start the slideshow
		max_images = $('banner img.banner-image').length;
		if (max_images > 1) {
			// every 5 seconds assign the active class to the next image in the slideshow
			// this will trigger the css transition in the cross-fade class which is assigned to each img
			setInterval(function() {
				curr_image++;
				if (curr_image > max_images) {
					curr_image=1;
				}
				$('banner img.banner-image.active').removeClass('active');
				$('banner img.banner-image[data-index="' + curr_image + '"]').addClass('active');
			}, 5000);
		}
	};
	
	return {
        initimages: initimages,
		startslideshow: startslideshow,
		map: map,
		infoBubble: infoBubble,
		infoContent: infoContent
	};

})();

avo.menu = (function() {

	// assign the selected class to the current page (and it's parent if it's in a sub-menu) so that it is highlighted
	var highlightcurrentpage = function () {
		try {
			var currpage ='/' + document.location.pathname.match(/[^\/]+$/)[0];
		} catch(e) {
			var currpage = '/';
		}
		$('#cssmenu a').each(function() {
			if ($(this).attr('href') === currpage) {
				$(this).addClass('selected');
				$(this).closest('.has-sub').find('a').first().addClass('selected');
				return false;
			}
		});
    };
	
	return {
		highlightcurrentpage: highlightcurrentpage
	}

})();

avo.menu.highlightcurrentpage();
avo.images.initimages();
$(document).ready(function() {
	avo.images.startslideshow();
});
