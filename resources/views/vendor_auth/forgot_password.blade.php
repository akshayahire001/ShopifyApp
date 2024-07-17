@extends('vendor_auth.layout.master')

@section('content')
<!-- password--instruction--screen -->
<div class="instruction_screen">
    <div class="instruction_block">
        <p>
            please enter your email address to receive the password
            instructions
        </p>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="form_field my-2">
                <input type="password" placeholder="Email Address" />
                <div class="input_icon">
                    <img src="{{ url('asset/images/iconamoon_email-thin.png') }}" />
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn_active send_btn">
                SEND
            </button>
        </div>

        <div class="text-center text_block">
            <p><a href="{{ route('vendor.login') }}" class="login_click">Back To Log in</a></p>
        </div>
    </div>
</div>
<!-- password--instruction--screen -->
@endsection