@extends('vendor.layout.master')

@section('page_title','Products')

@section('content')

<!-- product--sync---screen---start -->
<div class="product_sync_screen">
    <div class="container-fluid">
        <div class="container">
            <div class="heading_blockscreen mb-2">
                <h3>Its Time To Sync Your <span>Products,</span> {{ Auth::user()->name }}</h3>
                <p>If you wish to check which products have been successfully synced, they will be
                    highlighted in green below.</p>
            </div>
            <div class="filter_btn">
                <button type="button" class="btn">FILTER COLLECTION <span class="ml-2"><img
                            src="{{ url('asset/images/down_arrow.png') }}"></span></button>
            </div>
            <div class="product_table table-responsive desktop_table">
                <table class="table table-borderless" id="tblProductData">
                    <thead>
                        <tr>
                            <!-- <th style="min-width: 250px;">Id</th> -->
                            <th style="min-width: 250px;">Title</th>
                            <th style="min-width: 200px;">Description</th>
                            <th style="min-width: 50px;">Media</th>
                            <th style="min-width: 150px;">Pricing</th>
                            <th style="min-width: 150px;">Inventory</th>
                            <th style="min-width: 100px;">Vendor</th>
                            <th style="min-width: 150px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr>
                              <td>
                                  <div class="d-flex align-items-center">
                                      <div class="search_icon mr-3">
                                          <img src="{{ url('asset/images/product_search.png') }}">
                                      </div>
                                      <div>
                                          <p class="m-0">Berry Wax Melts</p>
                                      </div>
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex align-items-center">
                                      <div class="search_icon mr-3">
                                          <img src="{{ url('asset/images/product_search.png') }}">
                                      </div>
                                      <div>
                                          <p class="m-0">the product ....</p>
                                      </div>
                                  </div>
                              </td>
                              <td>
                                  <div class="upload_imgtable">
                                      <ul>
                                          <li>
                                              <img src="{{ url('asset/images/product_img.png') }}">
                                          </li>
                                          <li>
                                              <img src="{{ url('asset/images/product_img.png') }}">
                                          </li>
                                          <li>
                                              <img src="{{ url('asset/images/product_img.png') }}">
                                          </li>
                                          <li>
                                              <img src="{{ url('asset/images/uploadproduct.png') }}">
                                          </li>
                                          <li>
                                              <img src="{{ url('asset/images/uploadproduct.png') }}">
                                          </li>
                                          <li>
                                              <img src="{{ url('asset/images/uploadproduct.png') }}">
                                          </li>
                                      </ul>
                                  </div>
                              </td>
                              <td>£9.00
                              </td>
                              <td>456</td>
                              <td>uk melts</td>
                              <td>
                                  <div class="text-center">
                                      <button type="button" class="btn_synce active_product">SYNC <span><img
                                                  src="{{ url('asset/images/right_mark.png') }}"></span></button>
                                  </div>
                              </td>

                          </tr> -->
                    </tbody>
                </table>
                <!-- mobile--view--table -->


                <!-- mobile--view--table -->


            </div>


            <!-- mobile--view---table---product -->
            <!-- <div class="mobile_table">
                  <table class="product_table">
                      <tbody>
                          <tr>
                              <td class="pro_table_title"
                                  style="border-top-left-radius: 10px;border-top-right-radius: 10px;">
                                  <div>
                                      <span>Title</span>
                                  </div>
                              </td>
                              <td class="pro_table_data">
                                  <div class="d-flex align-items-center">
                                      <div class="search_icon mr-3">
                                          <img src="{{ url('asset/images/product_search.png') }}">
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
                                      <span>Description</span>
                                  </div>
                              </td>
                              <td class="pro_table_data">
                                  <div class="d-flex align-items-center">
                                      <div class="search_icon mr-3">
                                          <img src="{{ url('asset/images/product_search.png') }}">
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
                                      <span>Media</span>
                                  </div>
                              </td>
                              <td class="pro_table_data">
                                  <div class="upload_imgtable">
                                      <ul>
                                          <li>
                                              <img src="{{ url('asset/images/product_img.png') }}">
                                          </li>
                                          <li>
                                              <img src="{{ url('asset/images/product_img.png') }}">
                                          </li>
                                          <li>
                                              <img src="{{ url('asset/images/product_img.png') }}">
                                          </li>
                                          <li>
                                              <img src="{{ url('asset/images/uploadproduct.png') }}">
                                          </li>
                                          <li>
                                              <img src="{{ url('asset/images/uploadproduct.png') }}">
                                          </li>
                                          <li>
                                              <img src="{{ url('asset/images/uploadproduct.png') }}">
                                          </li>
                                      </ul>
                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td class="pro_table_title">
                                  <div>
                                      <span>Pricing</span>
                                  </div>
                              </td>
                              <td class="pro_table_data">
                                  <div>
                                      <span>£9.00 </span>
                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td class="pro_table_title">
                                  <div>
                                      <span>Inventory</span>
                                  </div>
                              </td>
                              <td class="pro_table_data">
                                  <div>
                                      <span>456</span>
                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td class="pro_table_title">
                                  <div>
                                      <span>Vendor</span>
                                  </div>
                              </td>
                              <td class="pro_table_data">
                                  <div>
                                      <span>Uk Melts</span>
                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td class="pro_table_title" style="    border-bottom-left-radius: 10px;
                    border-bottom-right-radius: 10px;">
                                  <div>
                                      <span>Action</span>
                                  </div>
                              </td>
                              <td class="pro_table_data">
                                  <div>

                                      <button type="button" class="btn_synce">SYNC <span><img
                                                  src="{{ url('asset/images/product_btn.png') }}"></span></button>
                                  </div>
                              </td>
                          </tr>
                      </tbody>
                  </table>

              </div> -->
            <!-- mobile--view---table---product -->

            <div class="bulk_btnbottm">
                <button type="button" class="bulk_upload" id="openPopup"> BULK SYNCE <span><img
                            src="{{ url('asset/images/product_btn.png') }}"></Span></button>
            </div>
        </div>
    </div>
</div>
<!-- product---mode---start -->
<div>
    <div id="popup" class="popup">
        <div class="popup-content">
            <div class="close_btnmodel" id="closePopup">
                <img src="{{ url('asset/images/closebtn.png')}}">
            </div>

            <div class="model_heading">
                <h2>Description</h2>
                <p>"Sync Your Products presents a curated array of luxury homeware, meticulously crafted to infuse
                    your living spaces with timeless elegance. From exquisite dinnerware to tasteful decorative
                    accents, each piece epitomizes superior craftsmanship and sophistication. Elevate your home décor
                    with our harmonious blend of functionality and aesthetics, indulging in the art of living
                    beautifully."</p>
            </div>
        </div>
    </div>
</div>



<!-- product---mode---start -->
@endsection

@section('page_section')
<script>
var table = $('#tblProductData').DataTable({
    processing: true,
    serverSide: true,
    ajax: baseUrl + "/vendor/get_products_data",
    columns: [
        // { data: 'id', name: 'id' },
        {
            data: 'product_name',
            name: 'product_name'
        },
        {
            data: 'description',
            name: 'description'
        },
        {
            data: 'images',
            name: 'images'
        },
        {
            data: 'pricing',
            name: 'pricing'
        },
        {
            data: 'inventory',
            name: 'inventory'
        },
        {
            data: 'vendor',
            name: 'vendor'
        },
        {
            data: 'action',
            name: 'action'
        },
    ]
});

function syncProduct(productId) {
    var img_url = baseUrl + "asset/images/product_btn.png";
    $("#btn_" + productId).html("Syncing..");
    $("#btn_" + productId).prop("disabled", true);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });
    $.ajax({
        method: "POST",
        url: baseUrl + "/vendor/single_sync_product",
        data: {
            "productId": productId
        },
        dataType: "json",
        success: function(response) {
            if (response.status == 200) {
                $("#messagediv").html(response.message);
                setTimeout(() => {
                    $("#messagediv").html("");
                }, 1000);
            } else {
                $("messagediv").html(response.message);
            }
            $("#btn_" + productId).prop("disabled", false);
            table.draw();
        },
        error: function(xhr) {
            if (xhr.status == 422) { // Validation failed status
                $("#btn_" + productId).prop("disabled", false);
                $("#messagediv").html(xhr.responseJSON.message);
            }
        }
    });
}
</script>
@endsection