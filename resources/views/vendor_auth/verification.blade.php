@extends('vendor_auth.layout.master')
@section('page_title', 'Vendor ResetPassword')
@section('content')
<!-- verification---screen--start-- -->
<form action="" method="POST" name="frmResetPassword" id="frmResetPassword">
    @csrf
    <input type="hidden" id="verify_token" name="verify_token" value="{{ $token }}">
    <div class="verification_block">
        <div class="instruction_block">
            <p>Please Enter Your Verification Code</p>
        </div>
        <div class="verification_count">
            <div id="message"></div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="form_field my-2">
                        <input type="number" placeholder="OTP" name="otp" id="otp" />
                        <div class="input_icon">
                            <!-- <img src="{{ url('asset/images/iconamoon_email-thin.png') }}" /> -->
                        </div>
                        <span class="error" id="otp_error"></span>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn_active btn-process" id="btnResetPassword">
                    SUBMIT <span class="btn-ring"></span>
                </button>
            </div>

            <div class="text-center text_block">
                <p>If you Didn't Receive A Code <a href="javascript:void(0)" id="btnResendOTP">Resend</a></p>
            </div>
        </div>
    </div>
</form>
<!-- verification---screen--end-- -->

@endsection