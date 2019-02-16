(function () {
	var rellaxElements = document.querySelectorAll('.rellax');

	if (rellaxElements.length) {
		var rellax = new Rellax('.rellax', {
			center: true
		});
	}

	var smoothScroll = new SmoothScroll('a[href*="#"]');

})();
