var url = "http://www.zenithdelille.com/";

/* Main navigation : active link */
jQuery(document).ready(function() {
	$("#main-navigation").find('ul.level-1 a').css('background-position','0px -29px');
	$("#main-navigation").find('ul.level-2 a').css('background-position','0px -16px');
	$("#main-navigation li.homepage a").css('background-position','0px 0px');
});

/* Carousel homepage */
setTimeout("initHomepageCarousel()",1);
function initHomepageCarousel() {
	jQuery(document).ready(function() {
		jQuery('#carousel-homepage').css('visibility','visible');
		jQuery('#carousel-homepage').jcarousel({
	        vertical: true,
	        scroll: 1,
	        auto: 10,
	        initCallback: mycarousel_initCallback,
	        itemVisibleInCallback: {
	            onAfterAnimation:  mycarousel_itemVisibleInCallbackAfterAnimation
	        },
	        buttonNextHTML: null,
	        buttonPrevHTML: null,
	        wrap: "last"
	    });
	});
}
function mycarousel_initCallback(carousel) {
    jQuery('.carousel-homepage-control a').bind('click', function() {
        carousel.scroll(jQuery.jcarousel.intval(jQuery(this).text()));
        return false;
    });
    
    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
};
function mycarousel_itemVisibleInCallbackAfterAnimation(carousel, item, idx, state) {
	//alert("Callback carousel : "+ carousel + " idx: "+idx + " state: "+state);
	if (jQuery('#carousel-homepage').length !=  0) {
		jQuery('#carousel-control-btn-1').removeClass('active');
		jQuery('#carousel-control-btn-2').removeClass('active');
		jQuery('#carousel-control-btn-3').removeClass('active');
		jQuery('#carousel-control-btn-4').removeClass('active');
		jQuery('#carousel-control-btn-'+idx).addClass('active');
	
		jQuery('#slide-details-1').css('visibility','hidden');
		jQuery('#slide-details-2').css('visibility','hidden');
		jQuery('#slide-details-3').css('visibility','hidden');
		jQuery('#slide-details-4').css('visibility','hidden');
		jQuery('#slide-details-'+idx).css('visibility','visible');	
	}
	else {
		carousel.options.initCallback = null;
		carousel.options.itemVisibleInCallback = null;
	}
};


/* Carousel next spectacles */
setTimeout("initHomepageNextSpectaclesCarousel()",1);
function initHomepageNextSpectaclesCarousel() {
	jQuery(document).ready(function() {
		jQuery('#carousel-next-spectacle').jcarousel({
	        scroll: 1,
	        wrap: "last"
	    });
	});
}

/* Next spectacles filter */
jQuery(document).ready(function() {
	$("#next-spectacles-filter").change(function () {
		$.ajax({
			  url: url+'homepage/getNextSpectacles?date='+$("#next-spectacles-filter").val(),
			  success: function(data) {
			    $('#next-spectacles-grid').html(innerShiv(data,false));
			    $.include(url+"js/persistent.js");
			    setTimeout("initHomepageNextSpectaclesCarousel()",1);
			  }
		});
	});
});


/* UI Selectmenu */
setTimeout("initSelectMenu()",100);
function initSelectMenu() {
	if ($('select#next-spectacles-filter').length != 0) {
		$('select#next-spectacles-filter').selectmenu({style:'dropdown'});
	}
}