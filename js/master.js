$(document).ready(function(){
var $sidebar = $("#sidebarContainer"),
	$window = $(window),
	$offset = $("#sidebarContainer").offset(),
	$topPadding = 15;


$window.scroll(function(){
        if ($window.scrollTop() > $offset.top) {
        	//alert("hello");
            $sidebar.stop().animate({
                marginTop: $window.scrollTop() - $offset.top + $topPadding
            });
        } else {
            $sidebar.stop().animate({
                marginTop: 0
            });
        }
    });
});