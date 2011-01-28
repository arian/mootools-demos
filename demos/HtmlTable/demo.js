window.addEvent('domready', function(){
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
		onRowFocus: function(tr) {
			tr.tween('opacity', [.5,1]);
		}
	});
	myTable.inject($('table-container'));

	// handles mouse clicks from disable/enable select links
	$$('.fireSelectEvent').addEvent('click', function(e){
		e.preventDefault();
		var method = this.get('text');
		myTable[method]();
	});

	$('toggleRow').addEvent('click', function(e){
		e.preventDefault();
		myTable.toggleRow($(myTable).getElement('tbody tr'));
	});

	$('disableSelect').addEvent('click', function(){
		var method = this.checked ? "disableSelect" : "enableSelect";
		myTable[method]();
	});

	$('disableSort').addEvent('click', function(){
		var method = this.checked ? "disableSort" : "enableSort";
		myTable[method]();
	});

	$('addRow').addEvent('click', function(e){
		e.preventDefault();
		myTable.push([
			$(myTable).getElements('tr').length,
			'new fruit',
			'new color',
			Number.random(1,100),
			'02/24/2011'
		]);
	});

	$('toJSON').addEvent('click', function(e){
		e.preventDefault();
		var jsonOutput = [];
		myTable._selectedRows.each( function( item ){
			var output = {},i;
			for( i = 0; i < item.cells.length; i++) output[myTable.options.headers[i]] = item.cells[i].get('text');
			jsonOutput.push(output);
		});
		$('output').set('text', JSON.encode(jsonOutput));
	});
	(function(){
		var removedRows = [];
		$('removeRows').addEvent('click', function(e){
			e.preventDefault();
			removedRows.combine($$(myTable._selectedRows).dispose());
			myTable.updateZebras();
		});
		$('addRemovedRows').addEvent('click', function(e){
			e.preventDefault();
			myTable.body.adopt(removedRows);
			removedRows.each(function(row){
				myTable.deselectRow(row);
			});
			myTable.updateZebras();
			myTable.reSort();
			removedRows = [];
		});
	})();
});
