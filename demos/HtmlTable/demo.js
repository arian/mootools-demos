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

    $$('.fireSelectEvent').addEvent('click', function(e){
        e.preventDefault();
        myTable[this.get('text')]();
    });
});
