

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

    $('.login-form').submit(function(e) {
        e.preventDefault();        
        $('#toast-container').remove();
        $.ajax({
            url : '/login/authenticate',
            type : 'post',
            data : $(this).serialize(),
            success : function(response) {
                if (response.state == false) {
                    var shortCutFunction = "error";
                    var msg = response.msg;
                    var title = "เกิดข้อผิดพลาด";
                    toastr[shortCutFunction](msg, title);
                    $('#toast-container').addClass('animated shake');
                } else {
                    if(response.type == "admin"){
                        window.location.href ='/admin/keyIn';    
                    } else {
                        window.location.href = '/user/keyIn';
                    }
                }
            }
        });
    });   
});