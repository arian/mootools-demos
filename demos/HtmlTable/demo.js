window.addEvent('domready', function(){

	// This is where we create a new HtmlTable instance
	// As you can see it has many options
	var myTable = new HtmlTable({
		properties: {
			border: 1,
			cellspacing: 0
		},
		headers: ['id', 'fruits', 'colors', 'quantity', 'date modified'],
		rows: [
			['1', 'apple', 'red', 20, '01/01/2011'],
			['2', 'lemon', 'yellow', 10, '02/20/2010'],
			['3', 'grape', 'purple', 30, '10/15/2010'],
			['4', 'blueberry', 'blue', 5, '06/09/2010'],
			['5', 'banana', 'yellow', 3, '03/25/2009'],
			['6', 'lime', 'green', 10, '04/20/2010']
		],
		zebra: true,
		sortable: true,
		selectable: true,
		onRowFocus: function(tr){
			tr.tween('opacity', [.5, 1]);
		}
	});
	myTable.inject($('table-container'));

	// handles mouse clicks from disable/enable select links
	$$('.fireSelectEvent').addEvent('click', function(event){
		event.stop();
		// selectAdd or selectNone methods to select rows
		myTable[this.get('text')]();
	});

	$('toggleRow').addEvent('click', function(event){
		event.stop();
		// Toggle a row between selected and unselected
		myTable.toggleRow($(myTable).getElement('tbody tr'));
	});

	$('disableSelect').addEvent('click', function(){
		// We can enable and disable selecting rows with the disabableSelect and enableSelect methods
		if (this.checked) myTable.disableSelect();
		else myTable.enableSelect();
	});

	$('disableSort').addEvent('click', function(){
		// We can also enable and disable sorting of the table with the disableSort and enableSort methods
		if (this.checked) myTable.disableSort();
		else myTable.enableSort();
	});

	$('addRow').addEvent('click', function(event){
		event.stop();
		// With the push method we can add new rows to the table
		myTable.push([
			$(myTable).getElements('tr').length,
			'new fruit',
			'new color',
			Number.random(1, 100),
			'02/24/2011'
		]);
	});

});
