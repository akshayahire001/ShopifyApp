@extends('vendor.layout.master')

@section('page_title','Orders')

@section('content')

<!-- order----screen--start -->
<div class="order_screen">
    <div class="container-fluid">
        <div class="container">
            <div class="heading_blockscreen mb-2">
                <h3>Welcome to Your <span>Orders,</span> {{ Auth::user()->name }}</h3>
            </div>
            <div class="dateRange">
                <label>Date range</label>
                <select>
                    <option>24/5/24</option>
                    <option>24/5/24</option>
                    <option>24/5/24</option>
                </select>
            </div>
            <div class="order_table product_table table-responsive desktop_table">
                <table class="table table-borderless" id="tblOrderData">
                    <thead>
                        <tr>
                            <th style="min-width: 250px;">Order No</th>
                            <th style="min-width: 200px;">Date of Purchase</th>
                            <th style="min-width:200px">Customer Name</th>
                            <th style="min-width:200px">Fulfilment Status</th>
                            <th style="min-width:200px">Add Tracking</th>
                            <th style="min-width:200px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="search_icon mr-3">
                                        <img src="images/product_search.png">
                                    </div>
                                    <div>
                                        <p class="m-0">#UK09876789</p>
                                    </div>
                                </div>
                            </td>
                            <td>08.09.27</td>
                            <td>bob</td>
                            <td>
                                <div class="active_status">Fulfilment</div>
                            </td>
                            <td>
                                <div class="active_status">Added</div>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>

            <!-- mobile----view--table--s-taert -->
            <!-- <div class="mobile_table">
                <table class="product_table">
                    <tbody>
                        <tr>
                            <td class="pro_table_title"
                                style="border-top-left-radius: 10px;border-top-right-radius: 10px;min-width: 150px;">
                                <div>
                                    <span>Order No</span>
                                </div>
                            </td>
                            <td class="pro_table_data">
                                <div class="d-flex align-items-center">
                                    <div class="search_icon mr-3">
                                        <img src="images/product_search.png">
                                    </div>
                                    <div>
                                        <p class="m-0">Berry Wax Melts</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="pro_table_title">
                                <div>
                                    <span>Date Of Purchase</span>
                                </div>
                            </td>
                            <td class="pro_table_data">
                                <div>
                                    <span>08.09.27</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="pro_table_title">
                                <div>
                                    <span>Customer Name</span>
                                </div>
                            </td>
                            <td class="pro_table_data">
                                <div>
                                    <span>bob</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="pro_table_title">
                                <div>
                                    <span>Fulfilment Status</span>
                                </div>
                            </td>
                            <td class="pro_table_data">
                                <div class="active_status" style="margin: unset !important;">Fulfilment</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="pro_table_title">
                                <div>
                                    <span>Add Tracking</span>
                                </div>
                            </td>
                            <td class="pro_table_data">
                                <div class="active_status" style="margin: unset !important;">Added</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div> -->
            <!-- mobile----view--table--end -->
<!-- 
            <div class="bulk_btnbottm mt-5">
                <button type="button" class="bulk_upload" id="openPopup1"> DOWNLOAD ORDERS <span><img
                            src="images/product_btn.png"></Span></button>
            </div> -->

        </div>

    </div>
    <div class="order_modelblock">
        <div id="orderPopup" class="popup">
            <div class="popup-content">
                <div class="close_btnmodel" id="closePopup1">
                    <img src="{{ url('asset/images/closebtn.png') }}">
                </div>

                <div class="model_heading">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="order_tableheaind">
                                <h2 id="ord_order_no">customer order ##UK09876789</h2>
                            </div>
                            <div class="">
                                <div class="product_table table-responsive">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th style="min-width: 100px;">product</th>
                                                <th style="min-width: 100px;">quantity</th>
                                                <th style="min-width: 100px;">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody id="order_products">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="customer_block">
                                <div class="form_field customer_field">
                                    <label>Customer Name</label>
                                    <input type="text" id="ord_customer_name">
                                </div>
                                <div class="form_field customer_field">
                                    <label>Customer notes</label>
                                    <input type="text">
                                </div>
                                <div class="form_field customer_field">
                                    <label>Billing Address</label>
                                    <input type="text" id="ord_billing_address">
                                </div>
                                <div class="form_field customer_field">
                                    <label>Shipping Address</label>
                                    <input type="text" id="ord_shipping_address">
                                </div>
                            </div>
                            <div class="text-right order_details">
                                <button type="button" class="download_btn">DOWNLOAD ORDER<span><img
                                            src="{{ url('asset/images/downloadicon.png') }}"></span></button>
                                <button type="button" class="bulk_upload P-5">PRINT PACKING SLIP<span><img
                                            src=""></span></button>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- order----screen--start -->
    </div>
</div>
<!-- order--s--screen---start -->

@endsection

@section('page_section')
<script>
    $(document).ready(function(){
        const baseUrl = $('meta[name="baseUrl"]').attr('content');
        var token = $('meta[name="token"]').attr('content');
        getOrderData();
        function getOrderData() {
            $('#tblOrderData').DataTable({
                processing: true,
                serverSide: true,
                ajax: baseUrl + "/vendor/get_order_data",
                columns: [
                    // { data: 'id', name: 'id' },
                    { data: 'order_no', name: 'order_no' },
                    { data: 'date_of_purchase', name: 'date_of_purchase' },
                    { data: 'customer_name', name: 'customer_name' },
                    { data: 'fullfillment', name: 'fullfillment' },
                    { data: 'tracking', name: 'tracking' },
                    { data: 'download_order', name: 'download_order' }
                ]
            });
        }

        setTimeout(() => {
            $(".bulk_upload").click(function(e) {
                $("#orderPopup").css("display","block");
                var orderId = $(this).attr('data-orderid');
                getOrderDetails(orderId);
            });
        }, 1000);

        $("#closePopup1").click(function(e) {
            $("#orderPopup").css("display","none");
        });

        function getOrderDetails(orderId) {
            $.ajax({
                method : "POST",
                url : baseUrl + "/vendor/getOrderDetails",
                data : {"orderId":orderId,"_token":token},
                dataType : "json",
                success : function(response) {
                    var response = response['data'];
                    $("#ord_order_no").html("customer order #"+response['order_no']);
                    $("#ord_customer_name").val(response['customer_master']['first_name']+" "+response['customer_master']['last_name']);
                    var b_address = response['billing_address']['address1'] + ", " + response['billing_address']['city'] + ", " + response['billing_address']['country'] + ", " + response['billing_address']['province'] + ", " + response['billing_address']['zip'];
                    $("#ord_billing_address").val(b_address);
                    var s_address = response['shipping_address']['address1'] + ", " + response['shipping_address']['city'] + ", " + response['shipping_address']['country'] + ", " + response['shipping_address']['province'] + ", " + response['shipping_address']['zip'];
                    $("#ord_shipping_address").val(s_address);
                    var html = '';
                    $.each(response['order_products'], function(key, value) {
                        html += '<tr>';
                        html += '<td>'+value['product_name']+'</td>';
                        html += '<td>'+'Qty: x'+value['quantity']+'</td>';
                        html += '<td>'+'£'+value['price']+'</td>';
                        html += '</tr>';
                    });
                    $("#order_products").html(html);
                }, error : function(xhr) {
                    console.log(xhr);
                }
            });
        }
    });
</script>
@endsection