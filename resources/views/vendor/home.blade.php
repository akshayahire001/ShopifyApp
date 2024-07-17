@extends('vendor.layout.master')

@section('page_title','Home')

@section('content')

<!-- home--page--banner--section -->

<div class="mainhome_page">
    <div class="home_heading">
        <h2>Hello,<br>
            <span><b>{{ Auth::user()->name }}</b></span>
        </h2>
        <h3>Welcome to L’SAUVE <span>Partners</span></h3>
        <div class="home_paragrpah">
            <p>You have successfully been <span>approved!</span> If you
                haven’t already, make sure the relevant
                collections are synced to L’SAUVE’S®
                Shopify</p>
        </div>
        <div class="dashboard_btn my-5">
            <button type="button" class="btn_active"><span class="mr-3"><img
                        src="{{ url('asset/images/left_arrow.png') }}"></span>GO TO DASHBOARD</button>
        </div>

    </div>
    <div class="right_shape">
        <div class="shapes_block">
            <div class="video_block">
                <div class="vide_icon" data-toggle="modal" data-target="#videoModal" style="cursor: pointer;">
                    <img src="{{ url('asset/images/video_btn.png') }}">
                </div>
                <img src="{{ url('asset/images/men.png') }}" alt="Men" class="img-fluid">
            </div>

            <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="videoModalLabel">Video Title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe width="560" height="315"
                                    src="https://www.youtube.com/embed/9xwazD5SyVg?si=XyrygsIxXgAoljVQ"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <!-- <img src="images/shapes.png"> -->
        </div>
    </div>
</div>
<!-- home--page--banner--section -->

@endsection