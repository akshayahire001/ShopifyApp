@extends('vendor_auth.layout.master')
@section('page_title', 'Vendor New Password')
@section('content')
<!-- confirm--password--screen -->
<form action="" method="POST" name="frmChangePassword" id="frmChangePassword">
    @csrf
    <input type="hidden" id="vry_token" name="vry_token" value="{{ $token }}">
    <div class="confirm_password">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="form_field">
                    <input type="password" placeholder="New Password" name="password" id="password" />
                    <div class="input_icon">
                        <img src="{{ url('asset/images/lock.png') }}" />
                    </div>
                    <span class="error" id="password_error"></span>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="form_field">
                    <input type="password" placeholder="Confirm New Password" name="password_confirmation" id="password_confirmation"/>
                    <div class="input_icon">
                        <img src="{{ url('asset/images/lock.png') }}" />
                    </div>
                    <span class="error" id="password_confirmation_error"></span>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn_active btn-process" id="btnChangePassword">
                        CONFIRM <span class="btn-ring"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- confirm--password--screen -->
@endsection