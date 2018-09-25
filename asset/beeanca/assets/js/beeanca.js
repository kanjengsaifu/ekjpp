$(document).on("scroll", function(){
	
	'use strict';
	
	if
	($(document).scrollTop() > 90){
	  $("header.header-02.fixed").addClass("shrink");
	}
	else
	{
		$("header.header-02.fixed").removeClass("shrink");
	}
});

$("body").addClass("overflow-hidden");
$(window).load(function() {
	$("#loading").fadeOut("slow"); 
	$("body").removeClass("overflow-hidden");
})

	
$(document).ready(function(){
	
	/*
	-------------------------
	MAIN NAV
	-------------------------
	*/
	$(".nav-menu ul.main-nav li:has(>ul)").addClass("has-children");
	
	/*if($(".nav-menu ul.main-nav li").hasClass("has-children")){
		$(".nav-menu ul.main-nav li.has-children").prepend('<span class="toggle-submenu"></span>')
	}*/
	
	if($(".header-01").hasClass("fixed")){
		$("body").addClass("header-01-fixed");
		$("body").removeClass("header-02-fixed");
	}
	if($(".header-02").hasClass("fixed")){
		$("body").addClass("header-02-fixed");
		$("body").removeClass("header-01-fixed");
	}
	$('.burger-menu').click(function(){
		$("html").addClass("overflow-hidden");
		$("body").addClass("overflow-hidden");
		$(".nav-menu").addClass("toggle-nav");
		$(".body-overlay").addClass("show-overlay");
	});
	$('.body-overlay').click(function(){
		$("html").removeClass("overflow-hidden");
		$("body").removeClass("overflow-hidden");
		$(".nav-menu").removeClass("toggle-nav");
		$(".body-overlay").removeClass("show-overlay");
		$(".nav-menu ul.main-nav li").removeClass("active");
		if($(".nav-menu ul.main-nav li ul").hasClass("opened")){
			$(".nav-menu ul.main-nav li ul").removeClass("opened").slideUp(200);
		}
	});
	$('.close-nav').click(function(){
		$("html").removeClass("overflow-hidden");
		$("body").removeClass("overflow-hidden");
		$(".nav-menu").removeClass("toggle-nav");
		$(".body-overlay").removeClass("show-overlay");
		$(".nav-menu ul.main-nav li").removeClass("active");
		if($(".nav-menu ul.main-nav li ul").hasClass("opened")){
			$(".nav-menu ul.main-nav li ul").removeClass("opened").slideUp(200);
		}
	});
	$('.nav-menu ul.main-nav li span').click(function(){
		if($(this).siblings('ul').hasClass('opened')){
			$(this).siblings('ul').removeClass('opened').slideUp(200);
			$(this).closest('li').removeClass('active');
		}
		else{
			$(this).siblings('ul').addClass('opened').slideDown(200);
			$(this).closest('li').addClass('active');
		}
	});
	
	
	
	/*
	-------------------------
	SEARCH BAR NAV
	-------------------------
	*/
	$(".close-search").hide();
	$(".open-search").click(function(){
		$(".search-form").addClass("open");
		$(".close-search").show();
		$(".open-search").hide();
	});

	$(".close-search").click(function(){
		$(".search-form").removeClass("open");
		$(".close-search").hide();
		$(".open-search").show();
	});
	
	
	/*
	-------------------------
	HEADER FIXED SCROLLING
	-------------------------
	*/
	var didScroll;
	var lastScrollTop = 0;
	var delta = 5;
	var navbarHeight = $('header.fixed').outerHeight();

	$(window).scroll(function(event){
		didScroll = true;
	});

	setInterval(function() {
		if (didScroll) {
			hasScrolled();
			didScroll = false;
		}
	}, 250);

	function hasScrolled() {
		var st = $(this).scrollTop();
		
		if(Math.abs(lastScrollTop - st) <= delta)
			return;
			
		if (st > lastScrollTop && st > navbarHeight){
			$('header.fixed').addClass('scroll-down');
		} else {
			if(st + $(window).height() < $(document).height()) {
				$('header.fixed').removeClass('scroll-down');
			}
		}
		
		lastScrollTop = st;
	}
	
	
	/*
	-------------------------
	BOOTSTRAP TOOLTIP
	-------------------------
	*/
	$('[data-toggle="tooltip"]').tooltip();
	
	
	/*
	-------------------------
	MASONRY
	-------------------------
	*/
	if( $('.post-masonry').length ){
		
		$('.post-masonry').masonry({
			itemSelector: '.ma-item',
		});
	}
	
	
	/*
	-------------------------
	OWL_CAROUSELS
	-------------------------
	*/
	var OwlIgSlideshowWidget 	= $("#instagram-slideshow-widget");
	var OwlIgFooterCarousel 	= $("#footer-instagram-carousel");
	var OwlFeaturedSlideshow 	= $("#featured-post-slideshow");
	var OwlArchiveListGallery 	= $(".archive-list-gallery");
	var OwlPostDetailGallery 	= $(".post-detail-gallery");
	
	/* Archive list gallery */
	if ($('.archive-list-gallery').length) {
		OwlArchiveListGallery.owlCarousel({
			navigation : true,
			slideSpeed : 300,
			paginationSpeed : 400,
			singleItem:true,
			pagination: false,
			transitionStyle : "fade",
			navigationText: [
			  "<i class='fa fa-angle-left'></i>",
			  "<i class='fa fa-angle-right'></i>"
			 ]
		});
	}
	
	
	/* Post detail gallery */
	if ($('.post-detail-gallery').length) {
		OwlPostDetailGallery.owlCarousel({
			navigation : true,
			slideSpeed : 300,
			paginationSpeed : 400,
			singleItem:true,
			pagination: false,
			transitionStyle : "fade",
			navigationText: [
			  "<i class='fa fa-angle-left'></i>",
			  "<i class='fa fa-angle-right'></i>"
			 ]
		});
	}
	
	/* Instagram Slideshow Widget */
	if ($('#instagram-slideshow-widget').length) {
		OwlIgSlideshowWidget.owlCarousel({
			navigation : true,
			slideSpeed : 300,
			paginationSpeed : 400,
			singleItem:true,
			pagination: false,
			transitionStyle : "fade",
			navigationText: [
			  "<i class='fa fa-angle-left'></i>",
			  "<i class='fa fa-angle-right'></i>"
			 ]
		});
	}
	
	/* Instagram Footer Carousel */
	if ($('#footer-instagram-carousel').length) {
		OwlIgFooterCarousel.owlCarousel({
			navigation : true,
			slideSpeed : 300,
			paginationSpeed : 400,
			pagination: false,
			transitionStyle : "fade",
			items : 6,
			itemsDesktop : [1000,6],
			itemsDesktopSmall : [900,5],
			itemsTablet: [600,4],
			itemsMobile : [360,3],
			navigationText: [
			  "<i class='fa fa-angle-left'></i>",
			  "<i class='fa fa-angle-right'></i>"
			 ]
		});
	}
	
	/* Featured Slideshow */
	if( $('#featured-post-slideshow').length ){
		var OwlSlideshowTime = 7;
		var $OwlProgressBar,
			$OwlBar, 
			$OwlElem, 
			OwlisPause, 
			Owltick,
			OwlPercentTime;

		function OwlProgressBar(OwlElem){
		  $OwlElem = OwlElem;
		  OwlBuildProgressBar();
		  OwlStart();
		}

		function OwlBuildProgressBar(){
		  $OwlProgressBar = $("<div>",{
			id:"owl-progress-bar"
		  });
		  $OwlBar = $("<div>",{
			id:"owl-bar"
		  });
		  $OwlProgressBar.append($OwlBar).prependTo($OwlElem);
		}

		function OwlStart() {
		  OwlPercentTime = 0;
		  OwlisPause = false;
		  Owltick = setInterval(interval, 10);
		};

		function interval() {
		  if(OwlisPause === false){
			OwlPercentTime += 1 / OwlSlideshowTime;
			$OwlBar.css({
			   width: OwlPercentTime+"%"
			 });
			if(OwlPercentTime >= 100){
			  $OwlElem.trigger('owl.next')
			}
		  }
		}

		function OwlPauseOnDragging(){
		  OwlisPause = true;
		}

		function OwlMoved(){
		  clearTimeout(Owltick);
		  OwlStart();
		}

		OwlFeaturedSlideshow.owlCarousel({
			singleItem : true,
			afterInit : OwlProgressBar,
			afterMove : OwlMoved,
			startDragging : OwlPauseOnDragging,
			navigation : true,
			pagination: true,
			slideSpeed : 700,
			paginationSpeed : 700,
			transitionStyle : "fade",
			navigationText: [
			  "<i class='fa fa-angle-left'></i>",
			  "<i class='fa fa-angle-right'></i>"
			 ]
		});

		$OwlElem.on('mouseover',function(){
		   OwlisPause = true;
		 })
		$OwlElem.on('mouseout',function(){
		   OwlisPause = false;
		 })
	}
	 
	 
	/* Splited Featured Slideshow */
	if( $('#owl-main-slide').length ){
		var OwlSync1 = $("#owl-main-slide");
		var OwlSync2 = $("#owl-post-nav-content");

		function OwlSyncPosition(el){
			var current = this.currentItem;
			$("#owl-post-nav-content")
			  .find(".owl-item")
			  .removeClass("synced")
			  .eq(current)
			  .addClass("synced")
			if($("#owl-post-nav-content").data("owlCarousel") !== undefined){
			  OwlCenter(current)
			}
		}
		function OwlCenter(number){
			var sync2visible = OwlSync2.data("owlCarousel").owl.visibleItems;
			var num = number;
			var found = false;
			for(var i in sync2visible){
			  if(num === sync2visible[i]){
				var found = true;
			  }
			}

			if(found===false){
			  if(num>sync2visible[sync2visible.length-1]){
				OwlSync2.trigger("owl.goTo", num - sync2visible.length+2)
			  }else{
				if(num - 1 === -1){
				  num = 0;
				}
				OwlSync2.trigger("owl.goTo", num);
			  }
			} else if(num === sync2visible[sync2visible.length-1]){
			  OwlSync2.trigger("owl.goTo", sync2visible[1])
			} else if(num === sync2visible[0]){
			  OwlSync2.trigger("owl.goTo", num-1)
			}

		}

		OwlSync1.owlCarousel({
			singleItem : true,
			slideSpeed : 1000,
			pagination:false,
			afterAction : OwlSyncPosition,
			responsiveRefreshRate : 200,
		});

		OwlSync2.owlCarousel({
			items : 4,
			itemsDesktop      : [1199,4],
			itemsDesktopSmall     : [1024,3],
			itemsTablet       : [768,2],
			itemsMobile       : [479,1],
			pagination:false,
			responsiveRefreshRate : 100,
		afterInit : function(el){
		  el.find(".owl-item").eq(0).addClass("synced");
		}
		});

		$("#owl-post-nav-content").on("mouseover", ".owl-item", function(e){
			e.preventDefault();
			var number = $(this).data("owlItem");
			OwlSync1.trigger("owl.goTo",number);
		});

	}
	
	
	/*
	-------------------------
	BACK TO TOP
	-------------------------
	*/
	if ($('.back-top').length) {
		var scrollTrigger = 100,
			backToTop = function () {
				var scrollTop = $(window).scrollTop();
				if (scrollTop > scrollTrigger) {
					$('.back-top').addClass('show');
				} else {
					$('.back-top').removeClass('show');
				}
			};
		backToTop();
		$(window).on('scroll', function () {
			backToTop();
		});
		$('.back-top').on('click', function (e) {
			e.preventDefault();
			$('html,body').animate({
				scrollTop: 0
			}, 700);
		});
	}
	
});

/*
-------------------------
RETINA IMAGE
-------------------------
*/
$(function () {

	if (window.devicePixelRatio > 1) {

	var imgRetina = $("img.img-retina");
	for(var i = 0; i < imgRetina.length; i++) {

		var imageType = imgRetina[i].src.substr(-4);
		var imageName = imgRetina[i].src.substr(0, imgRetina[i].src.length - 4);
		imageName += "@2x" + imageType;

		imgRetina[i].src = imageName;
	}
	}

});


/*
-------------------------
EQUAL HEIGHT
-------------------------
*/
equalheight = function(itemwrapper){

var currentTallest = 0,
    currentRowStart = 0,
    rowDivs = new Array(),
    $el,
    topPosition = 0;
	
 $(itemwrapper).each(function() {

	$el = $(this);
	$($el).height('auto')
	topPostion = $el.position().top;

		if (currentRowStart != topPostion) {
			for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
				rowDivs[currentDiv].height(currentTallest);
			}
			rowDivs.length = 0;
			currentRowStart = topPostion;
			currentTallest = $el.height();
			rowDivs.push($el);
		} else {
			rowDivs.push($el);
			currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
		}
		for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
			rowDivs[currentDiv].height(currentTallest);
		}
	});
}

$(window).load(function() {
	equalheight('.related-post-grid .item');
});

$(window).resize(function(){
	equalheight('.related-post-grid .item');
});

$(window).load(function() {
	equalheight('.archive-list.post-grid .item');
});

$(window).resize(function(){
	equalheight('.archive-list.post-grid .item');
});


