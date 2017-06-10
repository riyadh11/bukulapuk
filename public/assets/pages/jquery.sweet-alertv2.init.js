!function ($) {
    "use strict";
    var SweetAlert = function () {
    };

    SweetAlert.prototype.init = function () {

        $('#sa-cancel').click(function () {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this product!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    swal("Deleted!", "Your products has been deleted.", "success");
                    setTimeout(redirect, 2000);
                } else {
                    swal("Cancelled", "Your products is safe :)", "error");
                }
            });
        });

        $('#sa-save').click(function () {
            if($('#judul').val()!='' || $('#deskripsi').val()!=''){
            crud(function(output){
            hasil=JSON.parse(output);
            if(hasil.status =='200'){
            swal({
                title: "Sweet!",
                text: "Your Product is saved.",
                imageUrl: "/assets/plugins/bootstrap-sweetalert/thumbs-up.jpg"
            });
            }else{
                 swal("Error!", "Your products cannot save.", "error");
            }
           });
            }else{
                alert("Judul dan Deskripsi Tidak Boleh kosong");
            }
        });

        $('#sa-delete').click(function () {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this product!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    deleteProduct(function(output){
                    hasil=JSON.parse(output);
                    if(hasil.status =='200'){
                        swal("Deleted!", "Your products has been deleted.", "success");
                        setTimeout(redirect, 2000);
                        
                    }else{
                         swal("Error!", "Your products cannot deleted.", "error");
                    }
                    });
                } else {
                    swal("Cancelled", "Your products is safe :)", "error");
                }
            });
        });

        $('#sa-cat-save').click(function () {
           crud(function(output){
            hasil=JSON.parse(output);
            if(hasil.status =='200'){
            swal({
                title: "Sweet!",
                text: "Your Category is saved.",
                imageUrl: "/assets/plugins/bootstrap-sweetalert/thumbs-up.jpg"
            });
            setTimeout(redirect, 2000);
            }else{
                 swal("Error!", "Your products cannot save.", "error");
            }
           });
        });
    },

        $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
}(window.jQuery),

//initializing
    function ($) {
        "use strict";
        $.SweetAlert.init()
    }(window.jQuery);