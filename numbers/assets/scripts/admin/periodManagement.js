var periodEditable = function () {

    var handleTable = function () {

        function formatAmount(temp){
            var result = "";
            if((temp =="") || (temp == undefined)){

            } else {
                temp = parseInt(temp).toString();
                var dots = 0;               
                if(temp.length % 3 == 0){
                    dots = parseInt(temp.length / 3) - 1;
                } else {                
                    dots = parseInt(temp.length / 3);
                }
                for(var i = dots; i >= 1; i--){
                    result += "," + temp.slice(temp.length - i *3, temp.length - (i - 1) *3);
                }
                result = temp.slice(0, temp.length - dots * 3) + result;
            }           
            return result;
        }

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
            jqTds[0].innerHTML = '<input type="date" class="form-control" style="width: 100%;" value="' + aData[0] + '">';
            jqTds[1].innerHTML = '<input type="text" step="any" class="form-control" style="width: 100%;" value="' + aData[1] + '">';
            jqTds[2].innerHTML = '<input type="text" step="any" class="form-control" style="width: 100%;" value="' + aData[2] + '">';
            jqTds[7].innerHTML = selectStatus(aData[7]);
            jqTds[8].innerHTML = '<a class="save" href="">บันทึก</a><span> </span><a class="cancel" href="">ยกเลิก</a>';

        }

        function selectStatus(activeName){
            var output = '<select class="select-status" style="height:34px;">';

            if(activeName == 'ปิด'){
                output += '<option selected value="0">' + activeName + '</option>'; 
                output += '<option value="1">' + "เปิด" + '</option>';  
            } else if(activeName == "เปิด"){
                output += '<option selected value="1">' + activeName + '</option>';  
                output += '<option value="0">' + "ปิด" + '</option>'; 
            } 
            output += '</select>';

            return output;
        }

        function saveRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            var jqSelects=$('select.select-status', nRow);
            if(jqSelects[0].value == 0){
                var status = "ปิด";
            }else{
                var status = "เปิด";
            }
            var period_id = $(nRow).attr("period_id");
            var data = {period: jqInputs[0].value, top_result: jqInputs[1].value,
                        bottom_result: jqInputs[2].value, status: jqSelects[0].value, 
                        period_id: period_id};
            $.ajax({
                url : '/admin/settings/periodManagement/updatePeriod',
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
                        window.location.reload();
                    }
                }
            });
        }

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

        table.on('click', '.view-amount', function (e) {
            e.preventDefault();
            var td = $(this).parent().parent().find('td');
            var top_result = $(td)[1].innerText;
            var bottom_result = $(td)[2].innerText;
            $('.modal-topresult').html($(td)[1].innerText);
            $('.modal-bottomresult').html($(td)[2].innerText);
            $('.modal-pay').html($(td)[5].innerText);
            $('.modal-amount').html($(td)[4].innerText);
            $('.modal-pl').html($(td)[6].innerText);

            $('.agent-head').html("");
            $('.amounts').html("");
            var childNode = "";

            childNode += "<tr>";
            childNode += "<th>หัวหน่วย</th>";
            childNode += "<th>หัว  " + top_result.slice(0, 3) + "</th>";
            childNode += "<th>ท้าย  " + top_result.slice(3, 6) + "</th>";
            childNode += "<th>โต๊ดหัว  " + top_result.slice(0, 3) + "</th>";
            childNode += "<th>โต๊ดท้าย  "+ top_result.slice(3, 6) + "</th>";
            childNode += "<th>บน  " + top_result.slice(4, 6) + "</th>";
            childNode += "<th>ล่าง  " + bottom_result + "</th>";
            childNode += "<th>วิ่งบน  "+ top_result.slice(4, 6) + "</th>";
            childNode += "<th>วิ่งล่าง  " + bottom_result + "</th>";
            childNode += "<th>รวม</th>";
            childNode += "</tr>";
            $('.agent-head').append(childNode);
            $.ajax({
                url : '/admin/settings/periodManagement/getAgentsAmounts',
                type : 'post',
                data : {period_id: $(this).attr('period_id'), org_id: $('.period-table').attr('org_id'), top_result: top_result, bottom_result: bottom_result},
                success : function(response) {
                    var agents = response;                    
                    agents.forEach(function(agent){
                        var childNode = "";
                        childNode += "<tr>";
                        childNode += "<td class='center-align'>" + agent.agent_name + "</td>";
                        childNode += "<td class='right-align'>" + formatAmount(agent.headTotal) + "</td>";
                        childNode += "<td class='right-align'>" + formatAmount(agent.tailTotal) + "</td>";
                        childNode += "<td class='right-align'>" + formatAmount(agent.headSpecialTotal) + "</td>";
                        childNode += "<td class='right-align'>"+ formatAmount(agent.tailSpecialTotal) + "</td>";
                        childNode += "<td class='right-align'>" + formatAmount(agent.topTotal) + "</td>";
                        childNode += "<td class='right-align'>" + formatAmount(agent.bottomTotal) + "</td>";
                        childNode += "<td class='right-align'>" + formatAmount(agent.topRunTotal) + "</td>";
                        childNode += "<td class='right-align'>"+ formatAmount(agent.bottomRunTotal) + "</td>";
                        childNode += "<td class='right-align'>"+ formatAmount(agent.total) + "</td>";
                        childNode += "</tr>";
                        $('.amounts').append(childNode);
                    })
                    $('#agent_amount_modal').modal();
                }
            });
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

    $('.register-form').submit(function(e) {
        e.preventDefault();        
        $('#toast-container').remove();
        $.ajax({
            url : '/admin/settings/periodManagement/addPeriod',
            type : 'post',
            data : $(this).serialize(),
            success : function(response) {
                if (response.state == false) {
                    var msg = response.msg;
                    err_msg(msg);
                } else {
                    window.location.reload();
                }
            }
        });
    });

    $('#agent_amount_modal').on('shown.bs.modal', function () {
        $(this).find('.modal-dialog').css({width:'auto',
                                   height:'auto', 
                                  'max-height':'100%'});
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