<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('page_title')</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="baseUrl" content="{{ url('') }}">
    <meta name="token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!--font---cdn--file--here-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!--font----->


    <!-- <link href="css/style.css"  rel="stylesheet"/> -->
    <link href="{{ url('asset/css/style.css') }}" rel="stylesheet" />
    <link href="{{ url('asset/css/media.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('asset/css/custom.css') }}">
</head>

<body>
    <style>
    header {
        /* box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px; */
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 999;
    }

    .header {
        /* max-width: 1400px; */
        width: 100%;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        /* height: var(--header-height); */
    }

    .dataTables_filter {
        display: none !important;
    }
    </style>


    <!-- Please change the pen width to see the Drawer -->
    <header>
        <div class="header">
            <button class="drawer-btn" aria-label="Open Drawer">
                <svg height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"
                    aria-label="Open Drawer" role="img">
                    <path d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"></path>
                </svg>
            </button>
            <div class="logo">
                <div class="desktop_logo">
                    <img src="{{ url('asset/images/logo.png') }}">

                </div>
                <div class="mobile_logo">
                    <img src="{{ url('asset/images/mobile-logo.png') }}">

                </div>
            </div>
            <nav class="nav">
                <div class="drawer">
                    <div class="account_block">
                        <div class="account_details">
                            <div>
                                <img src="{{ url('asset/images/profile_account.png') }}">
                            </div>
                            <div class="side_baarheading">
                                <select class="bg-unset">
                                    <option>Hello {{ Auth::user()->name }} </option>
                                </select>
                            </div>
                        </div>
                        <div class="mobile_nav">
                            <a href="{{ route('vendor.home') }}" class="homebtn"><span><img
                                        src="{{ url('asset/images/home.png') }}"></span>Home</a>
                            <a href="{{ route('vendor.dashboard') }}" class="dashboardbtn"><span><img
                                        src="{{ url('asset/images/dashboard-nav.png') }}"></span>dashboard
                            </a>
                            <a href="#" class="order_clickbtn"><span><img
                                        src="{{ url('asset/images/fullfilament_nav.png') }}"></span>orders and
                                fulfilments</a>
                            <a href="{{ route('vendor.profile') }}" class="profile_btnclick"><span><img
                                        src="{{ url('asset/images/profile_nav.png') }}"></span>your
                                profile</a>
                        </div>
                    </div>

                    <button class="close-btn" aria-label="Close Drawer">
                        <svg height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"
                            aria-label="Close Drawer" role="img">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z">
                            </path>
                        </svg>
                    </button>
                    <div class="desktop_nav">
                        @php
                            $isHomeActive = strpos(request()->url(), route('vendor.home', [], false)) !== false;
                            $isDashboardActive = ( strpos(request()->url(), route('vendor.dashboard', [], false)) !== false || strpos(request()->url(), route('vendor.list_products', [], false)) !== false);
                            $isProfileActive = strpos(request()->url(), route('vendor.profile', [], false)) !== false;
                            $isOrderActive = strpos(request()->url(), route('vendor.orders', [], false)) !== false;
                        @endphp
                        <a href="{{ route('vendor.home') }}" class="homebtn navbtn {{ $isHomeActive ? 'active_text' : '' }}">Home</a>
                        <a href="{{ route('vendor.dashboard') }}" class="dashboardbtn navbtn {{ $isDashboardActive ? 'active_text' : '' }}">dashboard <span class="ml-2"><img src="{{ url('asset/images/downarrow.png') }}"></span></a>
                        <a href="{{ route('vendor.orders') }}" class="order_clickbtn navbtn  {{ $isOrderActive ? 'active_text' : '' }}">orders and fulfilments</a>
                        <a href="{{ route('vendor.profile') }}" class="profile_btnclick navbtn {{ $isProfileActive ? 'active_text' : '' }}">your profile</a>
                        <div class="d-flex align-items-center ml-2">
                            <div>
                                <img src="{{ url('asset/images/profile_desktop.png') }}">
                            </div>
                            <div class="profile_text">
                                <select class="bg-unset">
                                    <option>Hello , {{ Auth::user()->name }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blank"></div>
            </nav>
        </div>
    </header>

    <!-- heade--section--start -->


    <div class="screen_start">
        @yield('content')
    </div>


    <footer>
        <div class="footer_block">
            <div class="row m-0">
                <div class="col-lg-6 col-md-6">
                    <div class="footer_heading">
                        <h3>L’SAUVE® is a registered trademark. All rights reserved</h3>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="footer_heading">
                        <ul>
                            <li><a href="#" class="help_btn">Help </a></li>
                            <li><a href="#">Terms & Conditions </a></li>
                            <li><a href="#">Terms & Conditions </a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <!-- home--page--banner--section -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('asset/js/custom.js') }}"></script>
    @yield('page_section')
    <script>
    const links = document.querySelectorAll('.navbtn');

    // Add click event listener to each link
    links.forEach(link => {
        link.addEventListener('click', function() {
            // Remove active class from all links
            links.forEach(link => {
                link.classList.remove('active_text');
            });
            // Add active class to the clicked link
            this.classList.add('active_text');
        });
    });
    </script>



    <script>
    // For Making Header Responsive
    const drawer_btn = document.querySelector(".drawer-btn");
    const close_btn = document.querySelector(".close-btn");
    const nav = document.querySelector(".nav");
    const drawer = nav.querySelector(".drawer");
    const blank = nav.querySelector(".blank");
    const close = () => {
        nav.classList.remove("blur");
        drawer.classList.remove("drawer-visible");
    };

    drawer_btn.addEventListener("click", (e) => {
        nav.classList.add("blur");
        drawer.classList.add("drawer-visible");
    });

    close_btn.addEventListener("click", (e) => {
        close();
    });

    blank.addEventListener("click", (e) => {
        close();
    });

    Array.from(drawer.querySelectorAll("a")).forEach((element) => {
        element.addEventListener("click", () => {
            close();
        });
    });

    $('#videoModal').on('hide.bs.modal', function(e) {
        $('#video').attr('src', '');
    })
    $('#videoModal').on('show.bs.modal', function(e) {
        $('#video').attr('src', 'https://www.youtube.com/embed/VIDEO_ID');
    })
    </script>
</body>

</html>