@extends('vendor_auth.layout.master')

@section('content')
<!-- confirm--password--screen -->
<div class="confirm_password">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="form_field">
                <input type="password" placeholder="New Password" />
                <div class="input_icon">
                    <img src="{{ url('asset/images/lock.png') }}" />
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="form_field">
                <input type="password" placeholder="New Password" />
                <div class="input_icon">
                    <img src="{{ url('asset/images/lock.png') }}" />
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn_active W-100">
                    <a href="javascript:void(0)" target="_blank" class="text-reset">CONFIRM</a>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- confirm--password--screen -->
@endsection