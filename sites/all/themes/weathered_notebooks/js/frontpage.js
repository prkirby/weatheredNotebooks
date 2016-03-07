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
	//Get the height of the two notebook objects
    var height = jQuery("#shop .views-row-1").outerHeight(true);

	// set the outer height of the two pocket books to be 3/5 height
    jQuery("#shop .views-row-3, #shop .views-row-4, #shop .views-row-5")
    .outerHeight(height * 0.6);

	// set the outer height of the paper to be 2/5 height (+1 for some reason, cause math)
    jQuery("#shop .views-row-5").outerHeight(height * 0.4 + 1);
    var row5img = jQuery("#shop .views-row-5 .product-img");
	// position the img at the bottom of the resulting div, to make perfect grid
    row5img.css("position", "absolute");
    row5img.css("bottom", "0");
};

window.onload = function(){shopResize()};
jQuery(window).resize(function(){shopResize()});
