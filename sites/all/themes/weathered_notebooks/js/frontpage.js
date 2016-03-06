jQuery(document).ready(function(){
	jQuery('a[href^="#"]').bind('click',function (e) {
	    e.preventDefault();

	    var target = this.hash;
	    var $target = jQuery(target);

	    jQuery('html, body').stop().animate({
	        'scrollTop': $target.offset().top - jQuery("#main-menu").outerHeight(true)
	    }, 900, 'swing', function () {
	        window.location.hash = target;
	    });
	});
});

//* Dynamically set heights of products
function shopResize() {
    var height = jQuery("#shop .views-row-1").outerHeight(true);

    jQuery("#shop .views-row-3, #shop .views-row-4, #shop .views-row-5")
    .outerHeight(height * 0.6);

    jQuery("#shop .views-row-5").outerHeight(height * 0.4);
    var row5img = jQuery("#shop .views-row-5 img");
    row5img.css("position", "absolute");
    row5img.css("bottom", "0");
};

window.onload = function(){shopResize()};
jQuery(window).resize(function(){shopResize()});
