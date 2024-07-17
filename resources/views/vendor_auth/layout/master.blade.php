<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('page_title')</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="baseUrl" content="{{ url('') }}">
    <meta name="token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!--font---cdn--file--here-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />
    <!--font----->

    <!-- <link href="css/style.css"  rel="stylesheet"/> -->
    <link href="{{ url('asset/css/style.css') }}" rel="stylesheet" />
    <link href="{{ url('asset/css/media.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('asset/css/custom.css') }}">
    <script src="{{ asset('asset/js/custom.js') }}"></script>
    
</head>

<body>
    <!-- heade--section--start -->
    <header style="background-color: #0d2340 !important">
        <div class="content_section">
            <div class="">
                <div class="header_logo">
                    <img src="{{ url('asset/images/logo.png') }}" />
                </div>
            </div>
        </div>
    </header>
    <!-- heade--section--start -->

    <!--banner--section--start -->
    <section>
        <div class="banner_section">
            <div class="content_section">
                <div class="row block_textbanner">
                    <div class="col-lg-4 col-md-8">
                        <div class="banner_heading">
                            <h2>Private sign up to <br />L'SAUCE @ Partner</h2>
                        </div>
                    </div>
                </div>
                <div class="main_login">

                    @yield('content')

                </div>
            </div>
        </div>
    </section>
    <!--banner--section--start -->
</body>
<script>
$(document).ready(function() {
    $(".send_btn").click(function() {
        $(".login_scree").hide();
        $(".sign_up").hide();
        $(".instruction_screen").hide();
        $(".verification_block").show();
    });
    $(".submitbtn").click(function() {
        $(".login_scree").hide();
        $(".sign_up").hide();
        $(".instruction_screen").hide();
        $(".verification_block").hide();
        $(".confirm_password").show();
    });
    $(".touch_screen").click(function() {
        $(".login_scree").hide();
        $(".sign_up").hide();
        $(".instruction_screen").show();
    });
    $(".login_click").click(function() {
        $(".login_scree").show();
        $(".sign_up").hide();
    });
});
</script>

</html>