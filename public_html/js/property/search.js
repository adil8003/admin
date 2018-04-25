 $(document).ready(function () {
//        'use strict';
   $('#tblresproject').DataTable({
        "bJQueryUI": true,
        "bStateSave": true
    }).yadcf([{
                column_number: 2,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: "Select Location",
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            }, {
                column_number: 3,
                filter_type: "multi_select",
                select_type: 'select2',
                filter_default_label: "Select City",
                select_type_options: {
                    width: '150px',
                    minimumResultsForSearch: -1 // remove search box
                }
            }, ]);
        $.fn.dataTable.ext.search.push(
                function (settings, data, dataIndex) {
                    var min = parseInt($('#allresmin').val(), 10);
                    var max = parseInt($('#allresmax').val(), 10);
                    var expectedprice = parseInt(data[5]) || 0; // use data for the expectedprice column
                    if ((isNaN(min) && isNaN(max)) ||
                            (isNaN(min) && expectedprice <= max) ||
                            (min <= expectedprice && isNaN(max)) ||
                            (min <= expectedprice && expectedprice <= max))
                    {
                        return true;
                    }
                    return false;
                }
        );
        var table = $('#tblresproject').DataTable.yadcf();
        $('#allresmin, #allresmax').keyup(function () {
            table.draw();
          });
       
        $('#tblresproject tfoot th').each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });
        // DataTable
        var table = $('#tblresproject').DataTable();
        // Apply the search
        table.columns().every(function () {
            var that = this;
            $('input', this.footer()).on('keyup change', function () {
                if (that.search() !== this.value) {
                    that
                            .search(this.value)
                            .draw();
                }
            });
        });
     }); // end document.ready
