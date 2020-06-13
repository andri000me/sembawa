/* Style Switcher */

window.console = window.console || (function(){
	var c = {}; c.log = c.warn = c.debug = c.info = c.error = c.time = c.dir = c.profile = c.clear = c.exception = c.trace = c.assert = function(){};
	return c;
})();

jQuery(document).ready(function(){ 
						   
var styleswitcherstr = ' \
	<div class="switcher-inner"> \
	<h2>Style Switcher <a href="#"></a></h2> \
    <div class="content"> \
    <h3>Color Style</h3> \
    <div class="switcher-box"> \
	<ul class="color_schemes"> \
	<li><a id="default" class="styleswitch color"> Default </a></li> \
    <li><a id="blue" class="styleswitch color">blue </a></li> \
	<li><a id="orange" class="styleswitch color">orange </a></li> \
	<li><a id="skyblue" class="styleswitch color">sky blue </a></li> \
    </div><!-- End switcher-box --> \
    </div><!-- End content --> \
	';
	
jQuery(".switcher").prepend( styleswitcherstr );

});

/* boxed & wide syle */
jQuery(document).ready(function(){ 

var cookieName = 'wide';

function changeLayout(layout) {
jQuery.cookie(cookieName, layout);
jQuery('head link[name=layout]').attr('href', 'assets/css/layout/' + layout + '.css');
}

if( jQuery.cookie(cookieName)) {
changeLayout(jQuery.cookie(cookieName));
}

jQuery("#wide").click( function(){ jQuery
changeLayout('wide');
});

jQuery("#boxed").click( function(){ jQuery
changeLayout('boxed');
});

});


/* background images */
jQuery(document).ready(function(){ 
  
  var startClass = jQuery.cookie('mycookie');
  jQuery("body").addClass("default");

/* Blue */
jQuery("#blue").click( function(){ 
  jQuery("body").removeClass('default');
  jQuery("body").removeClass('skyblue');
  jQuery("body").removeClass('orange');
  jQuery("body").addClass('blue');
  jQuery.cookie('mycookie','blue');
});

jQuery("#skyblue").click( function(){ 
  jQuery("body").removeClass('default');
  jQuery("body").removeClass('blue');
  jQuery("body").removeClass('orange');
  jQuery("body").addClass('skyblue');
  jQuery.cookie('mycookie','skyblue');
});

jQuery("#orange").click( function(){ 
  jQuery("body").removeClass('default');
  jQuery("body").removeClass('blue');
  jQuery("body").removeClass('skyblue');
  jQuery("body").addClass('orange');
  jQuery.cookie('mycookie','orange');
});

if (jQuery.cookie('mycookie')) {
  jQuery('body').addClass(jQuery.cookie('mycookie'));
}

});

/* Skins Style */
jQuery(document).ready(function(){ 

var cookieName = 'default';

function changeLayout(layout) {
jQuery.cookie(cookieName, layout);
jQuery('head link[name=skins]').attr('href', 'assets/css/skins/' + layout + '.css');
}

if( jQuery.cookie(cookieName)) {
changeLayout(jQuery.cookie(cookieName));
}

changeLayout('default');

});



/* Reset Switcher */
jQuery(document).ready(function(){ 

// Style Switcher	
jQuery('.switcher').animate({
left: '-150px'
});

jQuery('.switcher h2 a').click(function(e){
e.preventDefault();
var div = jQuery('.switcher');
// console.log(div.css('left'));
if (div.css('left') === '-150px') {
jQuery('.switcher').animate({
  left: '0px'
}); 
} else {
jQuery('.switcher').animate({
  left: '-150px'
});
}
})


/*jQuery('a.color').click(function(e){
e.preventDefault();
jQuery(this).parent().parent().find('a').removeClass('selected');
jQuery(this).addClass('selected');
})

jQuery('a.pattern').click(function(e){
e.preventDefault();
jQuery(this).parent().parent().find('a').removeClass('selected2');
jQuery(this).addClass('selected2');
})

jQuery('a.layout').click(function(e){
e.preventDefault();
jQuery(this).parent().parent().find('a').removeClass('selected3');
jQuery(this).addClass('selected3');
})*/

		 
});						   

