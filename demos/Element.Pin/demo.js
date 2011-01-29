window.addEvent('domready', function(){

	var pinner = document.id('pinner');

	document.id('pin').addEvent('click', function(event){
		event.stop();
		pinner.pin();
	});

	document.id('unpin').addEvent('click', function(event){
		event.stop();
		pinner.unpin();
	});

	document.id('toggle').addEvent('click', function(event){
		event.stop();
		pinner.togglepin();
	});

});
