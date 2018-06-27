var periodEditable = function () {

    var handleTable = function () {

        var table = $('#sample_editable_period');

        var oTable = table.dataTable({

            "lengthMenu": [
                [5, 10, 20, -1],
                [5, 10, 20, "All"] // change per page values here
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
            }, {
                "searchable": true,
                "targets": [0]
            }],
            "order": [
                [0, "asc"]
            ] // set first column as a default sort by asc
        });

        var tableWrapper = $("#sample_editable_period_wrapper");

        var nEditing = null;
        var nNew = false;

        table.on('click', 'a.clear-period-data', function () {
            if($(this).attr("status") == 0){
                var msg = "คุณไม่สามารถลบข้อมูลทั้งหมดของงวดนี้ได้เพราะงวดนี้ถูกปิดไปแล้ว";
                var shortCutFunction = "error";
                var title = "เกิดข้อผิดพลาด";
                toastr[shortCutFunction](msg, title);
                $('#toast-container').addClass('animated shake');
            } else {
                if(confirm("คุณกำลังจะลบข้อมูลทั้งหมดในงวดนี้ใช่ไหม ?")){

                    $.ajax({
                        url : '/admin/keyIn/deleteAllData',
                        type : 'post',
                        data : {period_id:$(this).attr("period_id")},
                        async: false,
                        success : function(response) {
                            if(response){
                                document.location.reload();
                            } else {
                                var msg = "คุณไม่สามารถลบข้อมูลของวดนี้ได้";
                                var shortCutFunction = "error";
                                var title = "เกิดข้อผิดพลาด";
                                toastr[shortCutFunction](msg, title);
                                $('#toast-container').addClass('animated shake');
                            }
                        }
                    });
                }
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
    periodEditable.init();

    $('.period-status').each(function() {
        if($(this).html() == "Closed"){
            $(this).parent().find('.high').addClass('high-light');
        } else {
            $(this).parent().find('.high').removeClass('high-light');
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