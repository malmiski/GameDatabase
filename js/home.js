$(document).ready(function(){
//	$("#consoles_and_games_div").hide();

	$("#searchArea_input").focusin(function(){
		$("#searchArea_input").stop().animate({
			"width": "70%"
		},600);
	});

	$(".move_right_container_div").click(function(){
		var number_of_games = $(this).siblings(".games_div").children().length;
		if(number_of_games > 6)
		{
			var gameDiv = $(this).siblings(".games_div");
			var first = gameDiv.children().first();
			var last = gameDiv.children().last();

			gameDiv.children().each(function(){
				var leftCSS = parseFloat($(this).css("left"))-134;
				if($(this).is(first)){
 					first.detach();
 					gameDiv.append(first);

 				}

 			});

		}
		else
		{
			var gameDiv = $(this).siblings(".games_div");
			gameDiv.stop(true,true).animate({backgroundColor:"#fa6060"},150);
			gameDiv.stop(true,true).animate({backgroundColor:"#fafafa"},150);
	}
});

$("#searchArea_input").focusout(function(){
	$("#searchArea_input").stop().animate({
		"width": "50%"
	},600);
});


$(".game_art_img").tooltip();

});
