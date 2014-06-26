$(document).ready(function(){
	$(".date_select_input, .date_select").datepicker({dateFormat:"yy-mm-dd"});

	$("#tabs").tabs();

	$(".path_to_cover").keyup(function(){
		var text = this.value;
		text = $.trim(text);
		if(text != "")
			$(this).siblings(".image_marker_div").first().css("background","url(img/covers/"+text+") no-repeat scroll center center #AAA");
		else
			$(this).siblings(".image_marker_div").first().attr("style", "");
	});
	
});