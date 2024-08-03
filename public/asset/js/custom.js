const baseUrl = $('meta[name="baseUrl"]').attr('content');
var token = $('meta[name="token"]').attr('content');
$(document).ready(function(){

    $("#btnVendorRegister").click(function(e){
        $(".btn-ring").show();
        $("#btnVendorLogin").prop('disabled',true);
        e.preventDefault();
        $.ajax({
            method : "POST",
            url : baseUrl + "/vendor/doregister",
            data : $("#frmRegister").serialize(),
            dataType : "json",
            success : function(response) {
                $(".btn-ring").hide();
                $("#btnVendorLogin").prop('disabled',false);
                if (response.status == 200) {
                    $(".error").html("");
                    $("#frmRegister").trigger("reset");
                    location.href = baseUrl + "/vendor/login";
                }
            }, error : function(xhr) {
                $(".btn-ring").hide();
                $("#btnVendorLogin").prop('disabled',false);
                if (xhr.status == 422) { // Validation failed status
                    var errors = xhr.responseJSON.errors;
                    console.log(errors);
                    $(".error").html("");
                    $.each(errors, function(key, value) {
                        $("#"+key+"_error").html(value[0]);
                    });
                }
            }
        });
    });

    $("#btnVendorLogin").click(function(e) {
        $(".btn-ring").show();
        $("#btnVendorLogin").prop('disabled',true); 
        e.preventDefault();
        $.ajax({
            method : "POST",
            url : baseUrl + "/vendor/dologin",
            data : $("#frmLogin").serialize(),
            dataType : "json",
            success : function(response) {
                $(".btn-ring").hide();
                $("#btnVendorLogin").prop('disabled',false);
                if (response.status == 200) {
                    $("#message").html(response.message);
                    setTimeout(() => {
                        $(".error").html("");
                        $("#frmLogin").trigger("reset");
                        window.location.href = response.url;
                    }, 1000);
                } else {
                    $("#message").html(response.message);
                }
            }, error : function(xhr) {
                $(".btn-ring").hide();
                $("#btnVendorLogin").prop('disabled',false);
                if (xhr.status == 422) { // Validation failed status
                    var errors = xhr.responseJSON.errors;
                    console.log(errors);
                    $(".error").html("");
                    $.each(errors, function(key, value) {
                        $("#"+key+"_error").html(value[0]);
                    });
                }
            }
        })
    });

    $(".product_screenbtn").click(function(){
        location.href = baseUrl + "/vendor/list_products";
    });

    $("#profile_picture").change(function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImage').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });

    $("#brand_logo").change(function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImage1').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });

});