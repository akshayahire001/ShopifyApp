@extends('vendor.layout.master')

@section('page_title','Profile')

@section('content')

<!-- profile--screen---start -->
<div class="profile_block">
    <div class="container-fluid">
        <div class="container">
            <div class="heading_blockscreen">
                <h3>Welcome to Your <span>Profile Page,</span> {{ Auth::user()->name }}</h3>
            </div>
            <div class="profile_block">
                <form action="{{ route('user.profile.update') }}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="customer_block">
                                <div class="form_field customer_field">
                                    <label>Company Name</label>
                                    <input type="text" value="{{ $user->company_name }}" name="company_name" id="company_name">
                                    @error('company_name')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form_field customer_field">
                                    <label>Company Number</label>
                                    <input type="text" value="{{ $user->phone_no }}" name="phone_no" id="phone_no">
                                    @error('phone_no')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form_field customer_field">
                                    <label>Company Address</label>
                                    <input type="text" value="{{ $user->company_address }}" name="company_address" id="company_address">
                                    @error('company_address')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form_field customer_field">
                                    <label>Company Email</label>
                                    <input type="text" value="{{ $user->email }}" name="company_email" id="company_email">
                                    @error('company_email')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form_field customer_field">
                                        <label>Change Password</label>
                                        <input type="password" name="password" id="password">
                                    </div>
                                    @error('password')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form_field customer_field">
                                        <label>Repeat New Password</label>
                                        <input type="password" name="confirm_password" id="confirm_password">
                                    </div>
                                    @error('confirm_password')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="pl-5">
                                <div class="my-4 upload_textfile">
                                    <h3>Upload your profile image</h3>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                                        <div class="profile_img">
                                            <img id="previewImage" src="{{ $user->profile_picture }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-9  col-md-8 col-sm-8 col-12">
                                        <div class="drag_img">
                                            <div class="upload_imgtext"
                                                onclick="document.getElementById('profile_picture').click()">
                                                <div class="text-center mb-2">
                                                    <img src="{{ url('asset/images/Icon.png') }}" style="width: 50px;">
                                                </div>
                                                <h5>Click to replace or drag and drop</h5>
                                                <p>SVG, PNG, JPG or GIF (max. 400 x 400px)</p>
                                                <input type="file" id="profile_picture" class="fileInput" name="profile_picture" accept="image/*" hidden>
                                            </div>
                                        </div>
                                    </div>
                                    @error('profile_picture')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="my-4 py-3 upload_textfile">
                                    <h3 class="">Upload your Brand logo</h3>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                                        <div class="profile_img">
                                            <img id="previewImage1" src="{{ $user->brand_logo }}">
                                            <!-- <img id="previewImage" src="images/profile_img.png" > -->
                                        </div>
                                    </div>
                                    <div class="col-lg-9  col-md-8 col-sm-8 col-12">
                                        <div class="drag_img">
                                            <div class="upload_imgtext"
                                                onclick="document.getElementById('brand_logo').click()">
                                                <div class="text-center mb-2">
                                                    <img src="{{ url('asset/images/Icon.png') }}" style="width: 50px;">
                                                </div>
                                                <h5>Click to replace or drag and drop</h5>
                                                <p>SVG, PNG, JPG or GIF (max. 400 x 400px)</p>
                                                <input type="file" id="brand_logo" name="brand_logo" class="fileInput" accept="image/*" hidden>
                                            </div>
                                        </div>
                                    </div>
                                    @error('brand_logo')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="text-right my-5">
                        <button type="submit" class="bulk_upload">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- profile--screen---end -->

@endsection