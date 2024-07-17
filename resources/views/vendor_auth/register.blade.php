@extends('vendor_auth.layout.master')
@section('page_title','Vendor Registration')
@section('content')
<!-- signup---screen---start -->
<form action="" method="POST" name="frmRegister" id="frmRegister">
@csrf
<div class="sign_up">
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
                <input type="text" placeholder="Company Name " id="company_name" name="company_name" />
                <div class="input_icon">
                    <img src="{{ url('asset/images/lock.png') }}" />
                </div>
                <span class="error" id="company_name_error"></span>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form_field">
                <input type="text" placeholder="Phone No" id="phone_no" name="phone_no" />
                <div class="input_icon">
                    <img src="{{ url('asset/images/lock.png') }}" />
                </div>
                <span class="error" id="phone_no_error"></span>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form_field">
                <input type="password" placeholder="Password" id="password" name="password" />
                <div class="input_icon">
                    <img src="{{ url('asset/images/lock.png') }}" />
                </div>
                <span class="error" id="password_error"></span>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form_field">
                <input type="password" placeholder="Confirm Password" id="password_confirmation" name="password_confirmation" />
                <div class="input_icon">
                    <img src="{{ url('asset/images/lock.png') }}" />
                </div>
                <span class="error" id="password_confirmation_error"></span>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="form_field">
                <textarea rows="4" class="form-control" id="description" name="description"
                    placeholder="why do you want to become a L’SAUVE    Partner?"></textarea>
                    <span class="error" id="description_error"></span>
                <div>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn_active btn-process" id="btnVendorRegister">
                            SIGN UP <span class="btn-ring"></span>
                        </button>
                    </div>

                    <div class="text-center text_block">
                        <p>
                            Allready have an account
                            <a href="{{ route('vendor.login') }}" class="login_click">Login</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<!-- signup---screen---end -->
@endsection