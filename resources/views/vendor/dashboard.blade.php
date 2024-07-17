@extends('vendor.layout.master')

@section('page_title','Dashboard')

@section('content')
<!--dashboard---secreen -->
<div class="dashboard_screen">
    <div class="container-fluid">
        <div class="container">
            <div class="heading_blockscreen">
                <h3>Welcome to Your <span>Dashboard,</span> {{ Auth::user()->name }}</h3>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="dashbvoard_card">
                        <div class="heading_card">
                            <h3>Store Active</h3>
                            <div class="status"></div>
                        </div>
                        <p>‘Brand name’ has successfully been
                            approved.</p>
                        <div class="mange_btn">
                            <button type="button" class="profile_btn">
                                MaNage profile
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">

                    <div class="dashbvoard_card">
                        <div class="heading_card">
                            <h3>Products Sync</h3>
                            <div class="status red_status"></div>
                        </div>
                        <p>Please sync your products/collections to
                            L’SAUVE partners</p>
                        <div class="mange_btn">
                            <button type="button" class="profile_btn product_screenbtn">
                                sync and choose </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">

                    <div class="dashbvoard_card mb-5">
                        <div class="heading_card">
                            <h3>Sales to date</h3>
                        </div>
                        <div class="manage_order">
                            <ul>
                                <li>
                                    <div>
                                        <p>Orders</p>
                                        <p>90</p>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <p>Sales - 65% </p>
                                        <p>£54,000</p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">

                    <div class="dashbvoard_card">
                        <div class="heading_card">
                            <h3>New orders <span class="ml-2">(4)</span></h3>
                        </div>
                        <p>You have (4) orders to fulfil, and
                        </p>
                        <div class="mange_btn">
                            <button type="button" class="profile_btn">
                                go to fulfillment </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">

                    <div class="dashbvoard_card">
                        <div class="heading_card">
                            <h3>Account Manager</h3>
                        </div>
                        <p>Your store account manager
                            is Taylor</p>
                        <div class="mange_btn">
                            <button type="button" class="profile_btn">
                                Start a conversation
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">

                    <div class="dashbvoard_card">
                        <div class="heading_card">
                            <h3>Packaging Top up</h3>
                        </div>
                        <p>Access your complimentary postage &
                            packaging materials.</p>
                        <div class="mange_btn">
                            <button type="button" class="profile_btn">
                                Start a conversation
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--dashboard---secreen -->
@endsection
