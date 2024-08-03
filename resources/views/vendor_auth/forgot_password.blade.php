@extends('vendor_auth.layout.master')
@section('page_title','Vendor ForgotPassword')
@section('content')
<!-- password--instruction--screen -->
<form action="" method="POST" name="frmForgotPassword" id="frmForgotPassword">
    @csrf
    <div class="instruction_screen">
        <div class="instruction_block">
            <p>
                please enter your email address to receive the password
                instructions
            </p>
        </div>
        <div id="message"></div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="form_field my-2">
                    <input type="text" placeholder="Email Address" name="email" id="email" />
                    <div class="input_icon">
                        <img src="{{ url('asset/images/iconamoon_email-thin.png') }}" />
                    </div>
                    <span class="error" id="email_error"></span>
                </div>
            </div>
        </div>
        <div>
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn_active btn-process" id="btnForgotPassword">
                    SEND <span class="btn-ring"></span>
                </button>
            </div>

            <div class="text-center text_block">
                <p><a href="{{ route('vendor.login') }}" class="login_click">Back To Log in</a></p>
            </div>
        </div>
    </div>
</form>
<!-- password--instruction--screen -->
@endsection