var TableDatatablesEditable = function () {
    var handleTable = function () {

        function restoreRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);

            for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                oTable.fnUpdate(aData[i], nRow, i, false);
            }

            oTable.fnDraw();
        }

        function editRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);
            jqTds[0].innerHTML = '<input disabled type="text" class="form-control input-small" value="' + aData[0] + '">';
            jqTds[1].innerHTML = '<input name="model" type="text" class=" copy1 form-control input-small" value="' + aData[1] + '">';
            jqTds[2].innerHTML = '<input name="dno" type="text" class=" copy2 form-control input-small" value="' + aData[2] + '">';
            jqTds[3].innerHTML = '<input name="floor" type="text" class=" copy3 form-control input-small" value="' + aData[3] + '">';
            jqTds[4].innerHTML = '<input name="dept" type="text" class=" copy4 form-control input-small" value="' + aData[4] + '">';
            jqTds[5].innerHTML = '<input name="section" type="text" class=" copy5 form-control input-small" value="' + aData[5] + '">';
            jqTds[6].innerHTML = '<input name="ename" type="text" class=" copy6 form-control input-small" value="' + aData[6] + '">';
            jqTds[7].innerHTML = '<input name="ext" type="text" class=" copy7 form-control input-small" value="' + aData[7] + '">';
            //jqTds[4].innerHTML = '<a class="edit" href="">Save</a>';
            jqTds[8].innerHTML='<form class="edit" action="?id='+aData[0]+'&859" method="post" ><input type="hidden" class="copy1c" name="model" value="'+aData[1]+'"><input type="hidden" class="copy2c" name="dno" value="'+aData[2]+'"><input type="hidden" class="copy3c" name="floor" value="'+aData[3]+'"><input type="hidden" class="copy4c" name="dept" value="'+aData[4]+'"><input type="hidden" class="copy5c" name="section" value="'+aData[5]+'"><input type="hidden" class="copy6c" name="ename" value="'+aData[6]+'"><input type="hidden" class="copy7c" name="ext" value="'+aData[7]+'"><button type="submit" onclick="$(this).parent(\'form\').submit();" class="btn btn-primary">Save</button></form> ',
            $(".copy1").keyup(function(){ $(".copy1c").val($(this).val()); });
            $(".copy2").keyup(function(){ $(".copy2c").val($(this).val()); });
            $(".copy3").keyup(function(){ $(".copy3c").val($(this).val()); });
            $(".copy4").keyup(function(){ $(".copy4c").val($(this).val()); });
            $(".copy5").keyup(function(){ $(".copy5c").val($(this).val()); });
            $(".copy6").keyup(function(){ $(".copy6c").val($(this).val()); });
            $(".copy7").keyup(function(){ $(".copy7c").val($(this).val()); });
            $(".copy8").keyup(function(){ $(".copy8c").val($(this).val()); });
            jqTds[9].innerHTML = '<a class="cancel" href="">Cancel</a>';
        }

        function saveRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
            oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
            oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
            oTable.fnUpdate(jqInputs[4].value, nRow, 4, false);
            oTable.fnUpdate(jqInputs[5].value, nRow, 5, false);
            oTable.fnUpdate(jqInputs[6].value, nRow, 6, false);
            oTable.fnUpdate(jqInputs[7].value, nRow, 7, false);
            oTable.fnUpdate(jqInputs[8].value, nRow, 8, false);
            oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 9, false);
            oTable.fnUpdate('<a class="delete" href="">Delete</a>', nRow, 10, false);
            oTable.fnDraw();
        }

        function cancelEditRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
            oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
            oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
            oTable.fnUpdate(jqInputs[4].value, nRow, 4, false);
            oTable.fnUpdate(jqInputs[5].value, nRow, 5, false);
            oTable.fnUpdate(jqInputs[6].value, nRow, 6, false);
            oTable.fnUpdate(jqInputs[7].value, nRow, 7, false);
            oTable.fnUpdate(jqInputs[8].value, nRow, 8, false);
            oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 9, false);
            oTable.fnDraw();
        }

        var table = $('#sample_editable_1');

        var oTable = table.dataTable({

            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js).
            // So when dropdowns used the scrollable div should be removed.
            //"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],

            // Or you can use remote translation file
            //"language": {
            //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
            //},

            // set the initial value
            "pageLength": 5,

            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{ // set default column settings
                'orderable': true,
                'targets': [0]
            },
         {
                "searchable": true,
                "targets": [0]
            }],
            "order": [
                [9, "asc"]
            ] // set first column as a default sort by asc
        });

        var tableWrapper = $("#sample_editable_1_wrapper");

        var nEditing = null;
        var nNew = false;

        $('#sample_editable_1_new').click(function (e) {
            e.preventDefault();

            if (nNew && nEditing) {
                if (confirm("Previose row not saved. Do you want to save it ?")) {
                    saveRow(oTable, nEditing); // save
                    $(nEditing).find("td:first").html("Untitled");
                    nEditing = null;
                    nNew = false;

                } else {
                    oTable.fnDeleteRow(nEditing); // cancel
                    nEditing = null;
                    nNew = false;

                    return;
                }
            }

            var aiNew = oTable.fnAddData(['', '', '', '', '', '', '', '']);
            var nRow = oTable.fnGetNodes(aiNew[0]);
            editRow(oTable, nRow);
            nEditing = nRow;
            nNew = true;
        });

        table.on('click', '.delete', function (e) {
            e.preventDefault();

            if (confirm("Are you sure to delete this row ?") == false) {
                return;
            }

            var nRow = $(this).parents('tr')[0];
            oTable.fnDeleteRow(nRow);
            alert("Deleted! Do not forget to do some ajax to sync with backend :)");
        });

        table.on('click', '.cancel', function (e) {
            e.preventDefault();
            if (nNew) {
                oTable.fnDeleteRow(nEditing);
                nEditing = null;
                nNew = false;
            } else {
                restoreRow(oTable, nEditing);
                nEditing = null;
            }
        });

        table.on('click', '.edit', function (e) {
            e.preventDefault();

            /* Get the row as a parent of the link that was clicked on */
            var nRow = $(this).parents('tr')[0];

            if (nEditing !== null && nEditing != nRow) {
                /* Currently editing - but not this row - restore the old before continuing to edit mode */
                restoreRow(oTable, nEditing);
                editRow(oTable, nRow);
                nEditing = nRow;
            } else if (nEditing == nRow && this.innerHTML == "Save") {
                /* Editing this row and want to save it */
                saveRow(oTable, nEditing);
                nEditing = null;
                alert("Updated! Do not forget to do some ajax to sync with backend :)");
            } else {
                /* No edit in progress - let's start one */
                editRow(oTable, nRow);
                nEditing = nRow;
            }
        });
    }

    return {

        //main function to initiate the module
        init: function () {
            handleTable();
        }

    };

}();

jQuery(document).ready(function() {
    TableDatatablesEditable.init();
});
