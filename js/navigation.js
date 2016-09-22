$(document).ready(function() {

	var newLi;
	var largetWidth = 200;

	$(function(){
	    var url = window.location.href; 
	    $("#primary-menu a").each(function() {
	        if(url == (this.href)) { 
	            $(this).closest("li").addClass("active");
	            navArray();
	        }
	    });
	});

	$(function(){
	    var url = window.location.href; 
	    $(".sub-menu a").each(function() {
	        if(url == (this.href)) { 
	            $(this).parent().parent().parent().addClass("active");
	            navArray();
	        }
	    });
	});

	$(window).resize(function() {
		if ($(window).width() > 1129) {
			navArray();
		}
		else{
			$(".nav__dropdown-toggle").css("display", "none");
		}
	});

	if ($(window).width() < 1129) {
		var navItems = $(".nav-menu li a");
		navItems.each(function(index,li) {
			if($(this).siblings(".sub-menu").length){
				$(this).attr("onclick", "return false");
				console.log($(this));
				console.log($(this).siblings());
			}
			else{
				$(this).attr("onclick", "return true");
			}
		});
		$(".active").addClass("hover");
	}

	if ($(window).width() > 1130) {
		$(".nav-menu li a").attr("onclick", "return true");
	}

	if ($(window).width() < 1129) {
		$(".sub-menu li a").attr("onclick", "return true");
	}

	$(window).resize(function() {
		if ($(window).width() < 1129) {
			var navItems = $(".nav-menu li a");
			navItems.each(function(index,li) {
				if($(this).siblings(".sub-menu").length){
					$(this).attr("onclick", "return false");
					console.log($(this));
					console.log($(this).siblings());
				}
				else{
					$(this).attr("onclick", "return true");
				}
			});
		}

		if ($(window).width() > 1130) {
			$(".nav-menu li a").attr("onclick", "return true");
		}

		if ($(window).width() < 1129) {
			$(".sub-menu li a").attr("onclick", "return true");
		}
	});



	$(".nav-menu li").click(function(){
		if ($(this).hasClass("hover")) {
			$(this).removeClass("hover");
		}
		else{
			$("li").removeClass("hover");
			$(this).addClass("hover");
		}
	});

	function navArray(){
		var listItems = $(".active ul li");
		var totalWidth = 0;
		var extraItems = [];
		listItems.each(function(index,li) {
		    totalWidth = totalWidth + li.offsetWidth;

		    if (totalWidth > 1050) {
		    	extraItems.push($(li));
		    	newLi = $(li);
		    	$(".more-list-box").append(newLi);
		    	$(li).css("display","none");
		    	$(".nav__dropdown-toggle").addClass("present");
		    }
		    if ($(".nav__dropdown-toggle").hasClass("present")) {
				$(".nav__dropdown-toggle").css("display", "block");
	    	}
	    	else{
	    		$(".nav__dropdown-toggle").css("display", "none");
	    	}
		});
	}

	var bool = false;

	$(".nav__dropdown-toggle").click(function(){
		if (bool == false) {
			$(".more-list-box").css("display", "block");
			$(".nav__dropdown-toggle").addClass("is-open");
			bool = true
		}
		else if(bool == true){
			$(".more-list-box").css("display", "none");
			$(".nav__dropdown-toggle").removeClass("is-open");
			bool = false;
		}
	});

});