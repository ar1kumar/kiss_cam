$(document).ready(function(){
	$(".wrapper").on("swipe",function(){
	  //Do something on swipe
	  console.log('boobs');
	  var temp = Math.round(Math.random()*100);
	  $('.catch').attr("id",temp);
	  var get_id = $(this).attr('id');
	});
});