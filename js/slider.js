// Speed of the automatic slideshow
var slideshowSpeed = 6000;

// Variable to store the images we need to set as background
// which also includes some text and url's.
var photos = [ {

		"title" : "Stairs",
		"image" : "loreak.jpg",
		"url" : "http://www.sxc.hu/photo/1271909",
		"firstline" : "Going on",
		"secondline" : "vacation?"
	}, {
		"title" : "Office Appartments",
		"image" : "slider1.jpg",
		"url" : "http://www.sxc.hu/photo/1265695",
		"firstline" : "Or still busy at",
		"secondline" : "work?"
	}, {
		"title" : "Mountainbiking",
		"image" : "slider.jpg",
		"url" : "http://www.sxc.hu/photo/1221065",
		"firstline" : "Get out and be",
		"secondline" : "active"
	}, {
		"title" : "Mountains Landscape",
		"image" : "slider1.jpg",
		"url" : "http://www.sxc.hu/photo/1271915",
		"firstline" : "Take a fresh breath of",
		"secondline" : "nature"
	}
];


/* Funciones jQuery ******************************* */
$(document).ready(function() {
		
	// Backwards navigation
	$("#back").click(function() {

		navigate("back");

	});
	
	// Forward navigation
	$("#next").click(function() {

		navigate("next");

	});
	
		
	var activeContainer = 1;	
	var currentImg = 0;
	var animating = false;
	var navigate = function(direction) {

		// Check if no animation is running. If it is, prevent the action
		if(animating) {
			return;
		}
		
		// Check which current image we need to show
		if(direction == "next") {

			currentImg++;

			if(currentImg == photos.length + 1){

				currentImg = 1;
			}

		}
		else{

			currentImg--;

			if(currentImg == 0){

				currentImg = photos.length;
			}
		}
		
		// Check which container we need to use
		var currentContainer = activeContainer;

		if(activeContainer == 1){

			activeContainer = 2;

		}
		else{

			activeContainer = 1;
		}
		
		showImage(photos[currentImg - 1], currentContainer, activeContainer);
		
	};
	
	var currentZindex = -1;
	var showImage = function(photoObject, currentContainer, activeContainer){

		animating = true;
		
		// Make sure the new container is always on the background
		currentZindex--;
		
		// Set the background image of the new active container
		$("#headerimg" + activeContainer).css({

			"background-image" : "url(../images/" + photoObject.image + ")",
			"display" : "block",
			"z-index" : currentZindex

		});
		
		// Hide the header text
		$("#headertxt").css({"display" : "none"});
		
		// Set the new header text
		$("#firstline").html(photoObject.firstline);

		$("#secondline")
			.attr("href", photoObject.url)
			.html(photoObject.secondline);

		$("#pictureduri")
			.attr("href", photoObject.url)
			.html(photoObject.title);
		
		
		// Fade out the current container
		// and display the header text when animation is complete
		$("#headerimg" + currentContainer).fadeOut(function() {

			setTimeout(function() {
				$("#headertxt").css({"display" : "block"});
				animating = false;
			}, 500);
			
		});
	};

	
	// We should statically set the first image
	navigate("next");
	
	// Start playing the animation
	interval = setInterval(function() {
		navigate("next");
	}, slideshowSpeed);
	
});