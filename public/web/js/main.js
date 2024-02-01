(function ($) {
 "use strict";
 
 
/*
Preloader
------------------------------ */

setTimeout(function () {
	$('#preloader').fadeToggle();
}, 1500);
 
/*
Tooltip
------------------------------ */

$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});




/*
Prognroll 
------------------------------ */
$(function() {
  $("#scrollbar-right").prognroll({
    height: 2, //Progress bar height
    color: "#fd6802", //Progress bar background color
    custom: true //If you make it true, you can add your custom div and see it's scroll progress on the page
  });
});

/*
Expend 
------------------------------ */
$(".notify-btn,.close-icon").click(function() {
	$("body,#scrollbar-right,.close-icon").toggleClass("active");
});

 
 })(jQuery)