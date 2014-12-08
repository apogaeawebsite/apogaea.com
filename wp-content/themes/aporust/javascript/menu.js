$(document).ready(function() {
	var current = 'default';

	var showMenu = function(menuRoot) {
		console.log(menuRoot);
		if (current != menuRoot) {
			$('#sub-nav-' + current).stop().fadeOut(10);
			$('#sub-nav-' + menuRoot).stop().delay(20).fadeIn(100);
			current=menuRoot;
		}
	}


	$('#mainTopNav').mouseleave(function(){showMenu('default');});

	//$('#mainTopNav #menu-item').mouseover(function(){showMenu('default')});

	var menuElements = [];
	$("#menu-primary > li").each(function(){		
		menuElements.push(this.id.replace('menu-item-','')); 
	});

	for (var i = 0;i < menuElements.length; i++) {
		var target = menuElements[i];
		if ($('#menu-item-' + menuElements[i]).hasClass('current-menu-item')) {
			$('#menu-item-' + menuElements[i]).bind("mouseenter", function(){
				showMenu('default');
			});
		} else {
			$('#menu-item-' + menuElements[i]).bind("mouseenter", {target: target} , function(e){
				showMenu(e.data.target);
			});
		}
	}


	//var stringOfElementIDs = menuElements.toString();
	//alert(stringOfElementIDs);
});