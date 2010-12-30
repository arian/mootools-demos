window.addEvent('domready', function(){
	var pinner = document.id('pinner');
	document.id('pin').addEvent('click', function(e) {
		e.preventDefault();
		pinner.pin();
	});
	
	document.id('unpin').addEvent('click', function(e) {
		e.preventDefault();
		pinner.unpin();
	});
	
	document.id('toggle').addEvent('click', function(e) {
		e.preventDefault();
		pinner.togglepin();
	});
});
