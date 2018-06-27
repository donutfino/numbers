var numberEditable = function () {

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
            jqTds[2].innerHTML = '<input type="number" min="1" class="form-control" style="width: 100%;" value="' + aData[2] + '">';
            jqTds[3].innerHTML = '<input type="number" min="1" class="form-control" style="width: 100%;" value="' + aData[3] + '">';
            jqTds[4].innerHTML = '<a class="save" href="">บันทึก</a><span> </span><a class="cancel" href="">ยกเลิก</a>';
        }

        function saveRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            var number_type_id = $(nRow).attr("number_type_id");
            if(jqInputs[0].value <= 0){
                var msg = "การจ่ายต้องมากกว่า o";
                var shortCutFunction = "error";
                var title = "เกิดข้อผิดพลาด";
                toastr[shortCutFunction](msg, title);
                $('#toast-container').addClass('animated shake');
            } else if(jqInputs[1].value < 0){
                var msg = "วงเงินไม่สามารถต่ำกว่า 0";
                var shortCutFunction = "error";
                var title = "เกิดข้อผิดพลาด";
                toastr[shortCutFunction](msg, title);
                $('#toast-container').addClass('animated shake');
            } else {
                var data = {rate: jqInputs[0].value, default_limit: jqInputs[1].value, number_type_id: number_type_id};
                $.ajax({
                    url : '/admin/settings/numberType/updateNumberType',
                    type : 'post',
                    data : data,
                    success : function(response) {
                        if (response.state == false) {

                            var shortCutFunction = "error";
                            var msg = response.msg;
                            var title = "เกิดข้อผิดพลาด";
                            toastr[shortCutFunction](msg, title);
                            $('#toast-container').addClass('animated shake');
                        } else {
                            oTable.fnUpdate(jqInputs[0].value, nRow, 2, false);
                            oTable.fnUpdate(jqInputs[1].value, nRow, 3, false);
                            oTable.fnUpdate('<a class="edit"><i class="fa fa-pencil">', nRow, 4, false);
                            oTable.fnDraw();

                            var shortCutFunction = "success";
                            var msg = response.msg;
                            var title = "แจ้งเตือน";
                            toastr[shortCutFunction](msg, title);
                            $('#toast-container').addClass('animated shake');
                        }
                    }
                });
            }            
        }

        var table = $('#sample_editable_number');

        var oTable = table.dataTable({

            "lengthMenu": [
                [10, 20, -1],
                [10, 20, "All"] // change per page values here
            ],

            // Or you can use remote translation file
            //"language": {
            //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
            //},

            // set the initial value
            "pageLength": 10,

            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{ // set default column settings
                'orderable': true,
                'targets': [0]
            }, {
                "searchable": true,
                "targets": [0]
            }],
            "order": [
                [0, "asc"]
            ] // set first column as a default sort by asc
        });

        var tableWrapper = $("#sample_editable_number_wrapper");

        var nEditing = null;
        var nNew = false;

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
            nNew = false;            
            /* Get the row as a parent of the link that was clicked on */
            var nRow = $(this).parents('tr')[0];

            if (nEditing !== null && nEditing != nRow) {
                /* Currently editing - but not this row - restore the old before continuing to edit mode */
                restoreRow(oTable, nEditing);
                editRow(oTable, nRow);
                nEditing = nRow;
            } else {
                /* No edit in progress - let's start one */
                editRow(oTable, nRow);
                nEditing = nRow;
            }
        });

        table.on('click', '.save', function (e) {
            e.preventDefault();
            $('#toast-container').remove();
            saveRow(oTable, nEditing);                
        });

    }

    return {

        //main function to initiate the module
        init: function () {
            handleTable();
        }

    };

}();
$(document).ready(function(){
    toastr.options = {
        closeButton: true,
        debug: false,
        positionClass: "toast-top-right",
        onclick: null,
        showDuration: "1000",
        hideDuration: "1000",
        timeOut: "5000",
        extendedTimeOut: "50000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut"
    };
    $('[data-toggle="tooltip"]').tooltip();
    numberEditable.init();

    $('.set-default').click(function(e) {

        if(confirm("คุณต้องการตั้งค่าลิมิต?")){
            $.ajax({
                url : '/admin/settings/numberType/setByDefault',
                type : 'post',
                data: {org_id: $(this).attr("org_id")},
                success : function(response) {
                    if (response.state == false) {
                        var msg = response.msg;
                        err_msg(msg);
                    } else {
                        window.location.reload();
                    }
                }
            });
        }
    });

    function err_msg(msg){
        var shortCutFunction = "error";
        var title = "เกิดข้อผิดพลาด";
        toastr[shortCutFunction](msg, title);
        $('#toast-container').addClass('animated shake');
    }

    function notification_msg(msg){
        var shortCutFunction = "success";
        var title = "แจ้งเตือน";
        toastr[shortCutFunction](msg, title);
        $('#toast-container').addClass('animated shake');
    }

});