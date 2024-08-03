@extends('vendor_auth.layout.master')

@section('content')
<!-- password--instruction--screen -->
<form action="{{ route('shopify.install') }}" method="POST" name="frmInstallApp" id="frmInstallApp">
@csrf
<div id="message"></div>
<div class="instruction_screen">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="form_field my-2">
                <input type="text" placeholder="Shop Name" id="shopname" name="shopname"/>
                <div class="input_icon">
                    <img src="{{ url('asset/images/iconamoon_email-thin.png') }}" />
                </div>
                @error('shopname')
                    <div class="error">{{ $message }}</div>
                @enderror
                <!-- <span class="error" id="shopname_error"></span> -->
            </div>
        </div>
    </div>
    <div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn_active">
                Install App
            </button>
        </div>
    </div>
</div>
</form>
<!-- password--instruction--screen -->
@endsection