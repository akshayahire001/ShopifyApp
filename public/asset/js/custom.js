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
                    $(".error").html("");
                    $.each(errors, function(key, value) {
                        $("#"+key+"_error").html(value[0]);
                    });
                }
            }
        })
    });

    $("#btnForgotPassword").click(function(e) {
        $(".btn-ring").show();
        $("#btnForgotPassword").prop('disabled',true); 
        e.preventDefault();
        $.ajax({
            method : "POST",
            url : baseUrl + "/vendor/doForgotPassword",
            data : $("#frmForgotPassword").serialize(),
            dataType : "json",
            success : function(response) {
                $(".btn-ring").hide();
                $("#btnForgotPassword").prop('disabled',false);
                if (response.status == 200) {
                    $("#message").html(response.message);
                    setTimeout(() => {
                        $(".error").html("");
                        $("#frmForgotPassword").trigger("reset");
                        window.location.href = baseUrl + "/vendor/verification/"+response.token;
                    }, 1000);
                } else {
                    $("#message").html(response.message);
                }
            }, error : function(xhr) {
                $(".btn-ring").hide();
                $("#btnForgotPassword").prop('disabled',false);
                if (xhr.status == 422) { // Validation failed status
                    var errors = xhr.responseJSON.errors;
                    $(".error").html("");
                    $.each(errors, function(key, value) {
                        $("#"+key+"_error").html(value[0]);
                    });
                }
            }
        })
    });

    $("#btnResendOTP").click(function(e) {
        $("#btnResendOTP").html('Resending..'); 
        $("#btnResendOTP").prop('disabled',true); 
        e.preventDefault();
        $.ajax({
            method : "POST",
            url : baseUrl + "/vendor/resendOTP",
            data : {"verify_token":$("#verify_token").val(),"_token":token},
            dataType : "json",
            success : function(response) {
                $("#btnResendOTP").html('Resend'); 
                $("#btnResendOTP").prop('disabled',false);
                if (response.status == 200) {
                    $("#message").html(response.message);
                    setTimeout(() => {
                        $(".error").html("");
                        window.location.href = baseUrl + "/vendor/verification/"+response.token;
                    }, 1000);
                } else {
                    $("#message").html(response.message);
                }
            }, error : function(xhr) {
                $("#btnResendOTP").html('Resend');
                $("#btnResendOTP").prop('disabled',false);
                if (xhr.status == 422) { // Validation failed status
                    var errors = xhr.responseJSON.errors;
                    $(".error").html("");
                    $.each(errors, function(key, value) {
                        $("#"+key+"_error").html(value[0]);
                    });
                } else {
                    $("#message").html(xhr.responseJSON.message);
                }
            }
        })
    });

    $("#btnResetPassword").click(function(e) {
        $(".btn-ring").show();
        $("#btnResetPassword").prop('disabled',true); 
        e.preventDefault();
        $.ajax({
            method : "POST",
            url : baseUrl + "/vendor/verifyOTP",
            data : $("#frmResetPassword").serialize(),
            dataType : "json",
            success : function(response) {
                $(".btn-ring").hide();
                $("#btnResetPassword").prop('disabled',false);
                if (response.status == 200) {                    
                    $("#message").html(response.message);
                    setTimeout(() => {
                        $(".error").html("");
                        $("#frmResetPassword").trigger("reset");
                        window.location.href = baseUrl + "/vendor/resetpassword/"+response.token;
                    }, 1000);
                } else {
                    $("#message").html(response.message);
                }
            }, error : function(xhr) {
                
                $(".btn-ring").hide();
                $("#btnResetPassword").prop('disabled',false);
                if (xhr.status == 422) { // Validation failed status
                    var errors = xhr.responseJSON.errors;
                    $(".error").html("");
                    $.each(errors, function(key, value) {
                        $("#"+key+"_error").html(value[0]);
                    });
                } else {
                    $("#message").html(xhr.responseJSON.message);
                }
            }
        })
    });

    $("#btnChangePassword").click(function(e) {
        $(".btn-ring").show();
        $("#btnChangePassword").prop('disabled',true); 
        e.preventDefault();
        $.ajax({
            method : "POST",
            url : baseUrl + "/vendor/changePassword",
            data : $("#frmChangePassword").serialize(),
            dataType : "json",
            success : function(response) {
                $(".btn-ring").hide();
                $("#btnChangePassword").prop('disabled',false);
                if (response.status == 200) {                    
                    $("#message").html(response.message);
                    setTimeout(() => {
                        $(".error").html("");
                        $("#frmChangePassword").trigger("reset");
                        window.location.href = baseUrl + "/vendor/login";
                    }, 1000);
                } else {
                    $("#message").html(response.message);
                }
            }, error : function(xhr) {
                
                $(".btn-ring").hide();
                $("#btnChangePassword").prop('disabled',false);
                if (xhr.status == 422) { // Validation failed status
                    var errors = xhr.responseJSON.errors;
                    $(".error").html("");
                    $.each(errors, function(key, value) {
                        $("#"+key+"_error").html(value[0]);
                    });
                } else {
                    $("#message").html(xhr.responseJSON.message);
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