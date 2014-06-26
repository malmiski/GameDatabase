$(document).ready(function(){
var $sidebar = $("#sidebarContainer"),
	$window = $(window),
	$offset = $("#sidebarContainer").offset(),
	$topPadding = 15;


$window.scroll(function(){
        if ($window.scrollTop()+20 > $offset.top) {
        	//alert("hello");
            /*$sidebar.stop().animate({
                marginTop: $window.scrollTop() - $offset.top + $topPadding
            });*/
$sidebar.css({"position":"fixed","top":"20px"});
        } else {/*
            $sidebar.stop().animate({
                marginTop: 0
            });*/
        if($sidebar.css("position") != "absolute")
        $sidebar.css({"position":"absolute","top":"150px"});

        }
    });
});