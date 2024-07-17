@extends('vendor_auth.layout.master')
@section('page_title','Vendor Login')
@section('content')
<!-- login--screen--start -->
<form action="" method="POST" name="frmLogin" id="frmLogin">
@csrf
<div id="message"></div>
<div class="login_scree">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="form_field">
                <input type="text" placeholder="Username" id="username" name="username" />
                <div class="input_icon">
                    <img src="{{ url('asset/images/user.png') }}" />
                </div>
                <span class="error" id="username_error"></span>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form_field">
                <input type="text" placeholder="Email Address" id="email" name="email" />
                <div class="input_icon">
                    <img src="{{ url('asset/images/iconamoon_email-thin.png') }}" />
                </div>
                <span class="error" id="email_error"></span>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form_field">
                <input type="password" placeholder="password" id="password" name="password" />
                <div class="input_icon">
                    <img src="{{ url('asset/images/lock.png') }}" />
                </div>
                <span class="error" id="password_error"></span>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form_field">
                <input type="password" placeholder="confirm password" id="password_confirmation" name="password_confirmation" />
                <div class="input_icon">
                    <img src="{{ url('asset/images/lock.png') }}" />
                </div>
                <span class="error" id="password_confirmation_error"></span>
            </div>
        </div>
    </div>
    <div>
        <div class="d-flex justify-content-center mt-3">
            <button type="button" class="btn btn_active btn-process" id="btnVendorLogin">LOG IN <span class="btn-ring"></span></button>
        </div>

        <div class="text-center text_block">
            <p>
                Allready have an account
                <a href="{{ route('vendor.register') }}" class="touch_screen">Get in Tocuh</a>
            </p>
        </div>
    </div>
</div>
</form>
<!-- login--screen--start -->
@endsection