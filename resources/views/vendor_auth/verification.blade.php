@extends('vendor_auth.layout.master')

@section('content')
<!-- verification---screen--start-- -->
<div class="verification_block">
    <div class="instruction_block">
        <p>Please Enter Your Verification Code</p>
    </div>
    <div class="verification_count">
        <ul>
            <li>0</li>
            <li>0</li>
            <li>0</li>
            <li>0</li>
        </ul>
    </div>
    <div>
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn_active submitbtn">
                SUBMIT
            </button>
        </div>

        <div class="text-center text_block">
            <p>If you Didn't Receive A Code <a href="javascript:void(0)">Resend</a></p>
        </div>
    </div>
</div>
<!-- verification---screen--end-- -->

@endsection