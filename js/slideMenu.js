$(document).ready(function(){
	$("#Items").css({display:"none"}),
	$("#button").click(function(){
		$("#Items").toggle();
	}).css({
		cursor:"pointer"
	});
});