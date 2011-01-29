
window.addEvent('domready', function(){

	var myDragScroller = new Drag('container', {
		style: false,
		invert: true,
		modifiers: {x: 'scrollLeft', y: 'scrollTop'}
	});

});
