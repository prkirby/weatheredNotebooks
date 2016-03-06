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
