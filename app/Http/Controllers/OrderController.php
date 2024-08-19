<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Auth;
use GuzzleHttp\Client;
use App\Models\Order;
use App\Models\OrderProducts;
use App\Models\Customer;
use App\Models\ShippingAddress;
use App\Models\BillingAddress;
use App\Models\ProductVariant;
use App\Models\VendorStore;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function getOrder() {
        $ord = '{"order":{"id":5413169692869,"admin_graphql_api_id":"gid:\/\/shopify\/Order\/5413169692869","app_id":1354745,"browser_ip":"103.240.76.147","buyer_accepts_marketing":false,"cancel_reason":null,"cancelled_at":null,"cart_token":null,"checkout_id":35040204521669,"checkout_token":"669aa89c8edad0d80f4997c2c030610d","client_details":{"accept_language":null,"browser_height":null,"browser_ip":"103.240.76.147","browser_width":null,"session_hash":null,"user_agent":"Mozilla\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/127.0.0.0 Safari\/537.36"},"closed_at":null,"company":null,"confirmation_number":"FQXMH9I6A","confirmed":true,"contact_email":"ahireakshay20@gmail.com","created_at":"2024-08-03T12:21:02-04:00","currency":"GBP","current_subtotal_price":"2374.95","current_subtotal_price_set":{"shop_money":{"amount":"2374.95","currency_code":"GBP"},"presentment_money":{"amount":"2374.95","currency_code":"GBP"}},"current_total_additional_fees_set":null,"current_total_discounts":"0.00","current_total_discounts_set":{"shop_money":{"amount":"0.00","currency_code":"GBP"},"presentment_money":{"amount":"0.00","currency_code":"GBP"}},"current_total_duties_set":null,"current_total_price":"2374.95","current_total_price_set":{"shop_money":{"amount":"2374.95","currency_code":"GBP"},"presentment_money":{"amount":"2374.95","currency_code":"GBP"}},"current_total_tax":"0.00","current_total_tax_set":{"shop_money":{"amount":"0.00","currency_code":"GBP"},"presentment_money":{"amount":"0.00","currency_code":"GBP"}},"customer_locale":"en","device_id":null,"discount_codes":[],"email":"ahireakshay20@gmail.com","estimated_taxes":false,"financial_status":"paid","fulfillment_status":null,"landing_site":null,"landing_site_ref":null,"location_id":null,"merchant_of_record_app_id":null,"name":"#1015","note":null,"note_attributes":[],"number":15,"order_number":1015,"order_status_url":"https:\/\/lsauve-test.myshopify.com\/65884881093\/orders\/0409db52fb3faf1ecef0e72899928a4a\/authenticate?key=8b0767c473711e0c234030e3b351d1dc\u0026none=VQxWAlRFXQ","original_total_additional_fees_set":null,"original_total_duties_set":null,"payment_gateway_names":["Cash on Delivery (COD)"],"phone":null,"po_number":null,"presentment_currency":"GBP","processed_at":"2024-08-03T12:21:01-04:00","reference":"a7dfde6d43daaa2db7ed089ec22e5cdc","referring_site":null,"source_identifier":"a7dfde6d43daaa2db7ed089ec22e5cdc","source_name":"shopify_draft_order","source_url":null,"subtotal_price":"2374.95","subtotal_price_set":{"shop_money":{"amount":"2374.95","currency_code":"GBP"},"presentment_money":{"amount":"2374.95","currency_code":"GBP"}},"tags":"","tax_exempt":false,"tax_lines":[],"taxes_included":true,"test":false,"token":"0409db52fb3faf1ecef0e72899928a4a","total_discounts":"0.00","total_discounts_set":{"shop_money":{"amount":"0.00","currency_code":"GBP"},"presentment_money":{"amount":"0.00","currency_code":"GBP"}},"total_line_items_price":"2374.95","total_line_items_price_set":{"shop_money":{"amount":"2374.95","currency_code":"GBP"},"presentment_money":{"amount":"2374.95","currency_code":"GBP"}},"total_outstanding":"0.00","total_price":"2374.95","total_price_set":{"shop_money":{"amount":"2374.95","currency_code":"GBP"},"presentment_money":{"amount":"2374.95","currency_code":"GBP"}},"total_shipping_price_set":{"shop_money":{"amount":"0.00","currency_code":"GBP"},"presentment_money":{"amount":"0.00","currency_code":"GBP"}},"total_tax":"0.00","total_tax_set":{"shop_money":{"amount":"0.00","currency_code":"GBP"},"presentment_money":{"amount":"0.00","currency_code":"GBP"}},"total_tip_received":"0.00","total_weight":0,"updated_at":"2024-08-03T12:21:03-04:00","user_id":86897328325,"billing_address":{"first_name":"Akshay","address1":"Gujarat Express","phone":"+91","city":"London","zip":"NW9 9HN","province":"England","country":"United Kingdom","last_name":"Ahire","address2":null,"company":"test","latitude":null,"longitude":null,"name":"Akshay Ahire","country_code":"GB","province_code":"ENG"},"customer":{"id":7417693208773,"email":"ahireakshay20@gmail.com","created_at":"2024-06-16T10:11:41-04:00","updated_at":"2024-08-03T12:21:02-04:00","first_name":"Akshay","last_name":"Ahire","state":"disabled","note":null,"verified_email":true,"multipass_identifier":null,"tax_exempt":false,"phone":null,"email_marketing_consent":{"state":"not_subscribed","opt_in_level":"single_opt_in","consent_updated_at":null},"sms_marketing_consent":null,"tags":"","currency":"GBP","accepts_marketing":false,"accepts_marketing_updated_at":null,"marketing_opt_in_level":"single_opt_in","tax_exemptions":[],"admin_graphql_api_id":"gid:\/\/shopify\/Customer\/7417693208773","default_address":{"id":8695637442757,"customer_id":7417693208773,"first_name":"Akshay","last_name":"Ahire","company":"test","address1":"Gujarat Express","address2":null,"city":"London","province":"England","country":"United Kingdom","zip":"NW9 9HN","phone":"+91","name":"Akshay Ahire","province_code":"ENG","country_code":"GB","country_name":"United Kingdom","default":true}},"discount_applications":[],"fulfillments":[],"line_items":[{"id":13238069035205,"admin_graphql_api_id":"gid:\/\/shopify\/LineItem\/13238069035205","attributed_staffs":[],"fulfillable_quantity":1,"fulfillment_service":"manual","fulfillment_status":null,"gift_card":false,"grams":0,"name":"The Collection Snowboard: Hydrogen","price":"600.00","price_set":{"shop_money":{"amount":"600.00","currency_code":"GBP"},"presentment_money":{"amount":"600.00","currency_code":"GBP"}},"product_exists":true,"product_id":8045269319877,"properties":[],"quantity":1,"requires_shipping":true,"sku":"","taxable":true,"title":"The Collection Snowboard: Hydrogen","total_discount":"0.00","total_discount_set":{"shop_money":{"amount":"0.00","currency_code":"GBP"},"presentment_money":{"amount":"0.00","currency_code":"GBP"}},"variant_id":43916729254085,"variant_inventory_management":"shopify","variant_title":null,"vendor":"Hydrogen Vendor","tax_lines":[],"duties":[],"discount_allocations":[]},{"id":13238069067973,"admin_graphql_api_id":"gid:\/\/shopify\/LineItem\/13238069067973","attributed_staffs":[],"fulfillable_quantity":1,"fulfillment_service":"manual","fulfillment_status":null,"gift_card":false,"grams":0,"name":"The Collection Snowboard: Liquid","price":"749.95","price_set":{"shop_money":{"amount":"749.95","currency_code":"GBP"},"presentment_money":{"amount":"749.95","currency_code":"GBP"}},"product_exists":true,"product_id":8045269287109,"properties":[],"quantity":1,"requires_shipping":true,"sku":"","taxable":true,"title":"The Collection Snowboard: Liquid","total_discount":"0.00","total_discount_set":{"shop_money":{"amount":"0.00","currency_code":"GBP"},"presentment_money":{"amount":"0.00","currency_code":"GBP"}},"variant_id":43916729188549,"variant_inventory_management":"shopify","variant_title":null,"vendor":"Hydrogen Vendor","tax_lines":[],"duties":[],"discount_allocations":[]},{"id":13238069100741,"admin_graphql_api_id":"gid:\/\/shopify\/LineItem\/13238069100741","attributed_staffs":[],"fulfillable_quantity":1,"fulfillment_service":"manual","fulfillment_status":null,"gift_card":false,"grams":0,"name":"The Collection Snowboard: Oxygen","price":"1025.00","price_set":{"shop_money":{"amount":"1025.00","currency_code":"GBP"},"presentment_money":{"amount":"1025.00","currency_code":"GBP"}},"product_exists":true,"product_id":8045269254341,"properties":[],"quantity":1,"requires_shipping":true,"sku":"","taxable":true,"title":"The Collection Snowboard: Oxygen","total_discount":"0.00","total_discount_set":{"shop_money":{"amount":"0.00","currency_code":"GBP"},"presentment_money":{"amount":"0.00","currency_code":"GBP"}},"variant_id":43916729123013,"variant_inventory_management":"shopify","variant_title":null,"vendor":"Hydrogen Vendor","tax_lines":[],"duties":[],"discount_allocations":[]}],"payment_terms":null,"refunds":[],"shipping_address":{"first_name":"Akshay","address1":"Gujarat Express","phone":"+91","city":"London","zip":"NW9 9HN","province":"England","country":"United Kingdom","last_name":"Ahire","address2":null,"company":"test","latitude":51.58516299999999,"longitude":-0.2790612,"name":"Akshay Ahire","country_code":"GB","province_code":"ENG"},"shipping_lines":[]}}';

        $response = json_decode($ord,TRUE);
        DB::beginTransaction();
        try {

            $api_version = env('SHOPIFY_API_VERSION'); 
            $orderRes = $response['order'];
            $totalQty = 0;
            // $client = new Client();
            // foreach ($orderRes['line_items'] as $key => $value) {
            //     $ord_pro_id = $value['product_id'];
            //     $ord_vari_id = $value['variant_id'];
            //     $vendor = "lsauve-co-in.myshopify.com";
            //     $res = ProductVariant::where(['sync_product_id'=>$ord_pro_id,'sync_variant_id'=>$ord_vari_id])->select('inventory_item_id')->first();
            //     if($res!=null) {
            //         $res2 = VendorStore::where('store_name',$vendor)->select("access_token")->first();
            //         if($res2!=null) {
            //             $inventoryItemIds = $res->inventory_item_id;
            //             $ch = curl_init("https://$vendor/admin/api/$api_version/inventory_levels.json?inventory_item_ids={$inventoryItemIds}");
            //             curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //             curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            //                 "X-Shopify-Access-Token: shpua_5fecc267c318fde2f446efed883de419"
            //             ));

            //             $response = curl_exec($ch);
            //             curl_close($ch);

            //             $locations = json_decode($response, true);
            //             if(count($locations['inventory_levels']) > 0) {
            //                 foreach ($locations['inventory_levels'] as $key => $location) {
            //                     if($location['available'] >= $value['quantity']) {
            //                         $response = $client->request('POST', "https://$vendor/admin/api/2023-04/inventory_levels/adjust.json", [
            //                             'headers' => [
            //                                 'Content-Type' => 'application/json',
            //                                 'X-Shopify-Access-Token' => 'shpua_5fecc267c318fde2f446efed883de419',
            //                             ],
            //                             'json' => [
            //                                 'location_id' => $location['location_id'],
            //                                 'inventory_item_id' => $inventoryItemIds,
            //                                 'available_adjustment' => -$value['quantity'],
            //                             ]
            //                         ]);
            //                     }
            //                 }
            //             }
            //         }
            //     }
            // }

            // foreach ($orderRes['line_items'] as $key => $value) {
            //     $ordProdArr = new OrderProducts;
            //     $ordProdArr['order_id'] = $orderId;
            //     $ordProdArr['product_id'] = $value['product_id'];
            //     $ordProdArr['product_name'] = $value['name'];
            //     $ordProdArr['price'] = $value['price'];
            //     $ordProdArr['quantity'] = $value['quantity'];
            //     $ordProdArr['variant_id'] = $value['variant_id'];
            //     $ordProdArr['vendor'] = $value['vendor'];
            //     $ordProdArr->save();
            //     $productId = $value['product_id'];
            // }
            $fulfillment = 0;
            $tracking_no = '';
            $fulfillment_status = $orderRes['fulfillment_status'];
            if($fulfillment_status == 'fulfilled') {
                if(!empty($orderRes['fulfillments'])) {
                    $tracking_no = $orderRes['fulfillments'][0]['tracking_number'];
                }
                $fulfillment = 1;
            }

            foreach ($orderRes['line_items'] as $key => $value) {
                $totalQty += $value['quantity'];
            }
            
            $orderArr = new Order;
            $orderArr['order_id'] = $orderRes['id'];
            $orderArr['order_no'] = $orderRes['order_number'];
            $orderArr['total_qty'] = $totalQty;
            $orderArr['total_price'] = $orderRes['total_price'];
            $orderArr['fulfillment_status'] = $fulfillment;
            $orderArr['tracking_no'] = $tracking_no;
            $orderArr->save();

            $orderId = $orderArr->id; 

            if($orderRes['billing_address']!=null) {
                $billingAdd = new BillingAddress;
                $billingAdd['order_id'] = $orderId;
                $billingAdd['address1'] = $orderRes['billing_address']['address1'];
                $billingAdd['phone'] = $orderRes['billing_address']['phone'];
                $billingAdd['city'] = $orderRes['billing_address']['city'];
                $billingAdd['zip'] = $orderRes['billing_address']['zip'];
                $billingAdd['province'] = $orderRes['billing_address']['province'];
                $billingAdd['country'] = $orderRes['billing_address']['country'];
                $billingAdd['address2'] = $orderRes['billing_address']['address2'];
                $billingAdd['company'] = $orderRes['billing_address']['company'];
                $billingAdd['country_code'] = $orderRes['billing_address']['country_code'];
                $billingAdd->save();
            }

            if($orderRes['shipping_address']!=null) {
                $shippingAdd = new ShippingAddress;
                $shippingAdd['order_id'] = $orderId;
                $shippingAdd['address1'] = $orderRes['shipping_address']['address1'];
                $shippingAdd['phone'] = $orderRes['shipping_address']['phone'];
                $shippingAdd['city'] = $orderRes['shipping_address']['city'];
                $shippingAdd['zip'] = $orderRes['shipping_address']['zip'];
                $shippingAdd['province'] = $orderRes['shipping_address']['province'];
                $shippingAdd['country'] = $orderRes['shipping_address']['country'];
                $shippingAdd['address2'] = $orderRes['shipping_address']['address2'];
                $shippingAdd['company'] = $orderRes['shipping_address']['company'];
                $shippingAdd['country_code'] = $orderRes['shipping_address']['country_code'];
                $shippingAdd->save();
            }

            if($orderRes['customer']!=null) {
                $customerAdd = new Customer;
                $customerAdd['order_id'] = $orderId;
                $customerAdd['customer_id'] = $orderRes['customer']['default_address']['customer_id'];
                $customerAdd['first_name'] = $orderRes['customer']['default_address']['first_name'];
                $customerAdd['last_name'] = $orderRes['customer']['default_address']['last_name'];
                $customerAdd['company'] = $orderRes['customer']['default_address']['company'];
                $customerAdd['address1'] = $orderRes['customer']['default_address']['address1'];
                $customerAdd['address2'] = $orderRes['customer']['default_address']['address2'];
                $customerAdd['city'] = $orderRes['customer']['default_address']['city'];
                $customerAdd['province'] = $orderRes['customer']['default_address']['province'];
                $customerAdd['country'] = $orderRes['customer']['default_address']['country'];
                $customerAdd['zip'] = $orderRes['customer']['default_address']['zip'];
                $customerAdd['phone'] = $orderRes['customer']['default_address']['phone'];
                $customerAdd['country_name'] = $orderRes['customer']['default_address']['country_name'];
                $customerAdd->save();
            }

            foreach ($orderRes['line_items'] as $key => $value) {
                $vendor_id = 1;
                $vendor = VendorStore::where('store_name',$value['vendor'])->first();
                if($vendor!=null) {
                    $vendor_id = $vendor->vendor_id;
                }

                $ordProdArr = new OrderProducts;
                $ordProdArr['order_id'] = $orderId;
                $ordProdArr['vendor_id'] = $vendor_id;
                $ordProdArr['product_id'] = $value['product_id'];
                $ordProdArr['product_name'] = $value['name'];
                $ordProdArr['price'] = $value['price'];
                $ordProdArr['quantity'] = $value['quantity'];
                $ordProdArr['variant_id'] = $value['variant_id'];
                $ordProdArr['vendor'] = $value['vendor'];
                $ordProdArr->save();
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
        }
    }

    public function orderLists() {
        return view('vendor.list_orders');
    }

    public function getOrderData(Request $request) {
        if(\request()->ajax()){
            $vendor_id = Auth::user()->id;
            DB::statement("SET SESSION sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
            // $data = Order::join('customer_master','customer_master.order_id', '=', 'order_master.id')->select('order_master.*','customer_master.first_name','customer_master.last_name')->get();
            $data = Order::select('order_master.id as orderId','order_master.order_no','order_master.created_at','customer_master.first_name','customer_master.last_name','order_master.fulfillment_status')
                    ->leftJoin('order_products','order_products.order_id','order_master.id')
                    ->leftJoin('customer_master','customer_master.order_id','order_master.id')
                    ->where('order_products.vendor_id',$vendor_id)
                    ->groupBy('order_products.order_id')
                    ->get();
            return DataTables::of($data)
                ->addColumn('order_no', function($row) {
                    $img_url = url('asset/images/product_search.png');
                    return '<div class="d-flex align-items-center">
                                    <div class="search_icon mr-3">
                                        <img src="'.$img_url.'">
                                    </div>
                                    <div>
                                        <p class="m-0">#'.$row->order_no.'</p>
                                    </div>
                                </div>';
                })
                ->addColumn('date_of_purchase', function($row) {
                    $carbonDate = Carbon::parse($row->created_at);
                    $customFormatDate = $carbonDate->format('d.m.y');
                    return $customFormatDate;
                })
                ->addColumn('customer_name', function($row) {
                    return $row->first_name." ".$row->last_name;
                })
                ->addColumn('fullfillment', function($row) {
                    if($row['fulfillment_status'] == 1) {
                        return '<div class="active_status">Fulfilment</div>';
                    } else {
                        return '<div class="active_status non_active">Unfulfillment</div>';
                    }
                })
                ->addColumn('tracking', function($row) { 
                    if($row['fulfillment_status'] == 1) {
                        return '<div class="active_status">Added</div>';
                    } else {
                        return '<div class="active_status non_active">Needed</div>';
                    }
                })
                ->addColumn('download_order', function($row) {
                    $img_url = url('asset/images/product_btn.png');
                    return '<button type="button" class="bulk_upload" data-orderid="'.$row->orderId.'" id="openPopup_'.$row->orderId.'"> DOWNLOAD ORDERS <span><img src="'.$img_url.'"></Span></button>';
                })
                ->rawColumns(['order_no','fullfillment','tracking','download_order'])
                ->make(true);
        }
    }

    public function getOrderDetails(Request $request) {
        $orderDt = Order::with('order_products','billing_address','shipping_address','customer_master')->where('id',$request->orderId)->first();
        $data = [
            'status' => 200,
            'message' => 'Order Details',
            'data' => $orderDt,
        ];
        return response()->json($data);
    }

    public function addTrackingNo(Request $request) {
        $orderId = 1;
        $orderNo = '5413169692869';
        $client = new Client();

        /*$order = Order::with('order_products')->where(['id'=>$orderId])->first();
        foreach ($order->order_products as $key => $value) {
            // $res = ProductVariant::where(['product_id'=>$value['product_id'],'variant_id'=>$value['variant_id']])->select('inventory_item_id')->first();
            $variantId = $value['variant_id'];
            $response = $client->request('GET', "https://lsauve-test.myshopify.com/admin/api/2023-01/variants/{$variantId}.json", [
                'headers' => [
                    'X-Shopify-Access-Token' => 'shpua_75a6f4550cc0b379c9c3441f6df7b84c',
                ],
            ]);

            $variant = json_decode($response->getBody()->getContents(), true);
            $inventory_item_id = $variant['variant']['inventory_item_id'];

            $ch = curl_init("https://lsauve-test.myshopify.com/admin/api/2023-01/inventory_levels.json?inventory_item_ids={$inventory_item_id}");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "X-Shopify-Access-Token: shpua_75a6f4550cc0b379c9c3441f6df7b84c"
            ));

            $response = curl_exec($ch);
            curl_close($ch);

            $locations = json_decode($response, true);
            dd($locations);
        }*/
        $trackingNumber='123456789';
        $carrierTrackingUrl = "https://www.examplecarrier.com/track?trackid=" . $trackingNumber;
        $response = $client->request('GET', "https://lsauve-test.myshopify.com/admin/api/2023-01/locations.json", [
            'headers' => [
                'X-Shopify-Access-Token' => 'shpua_75a6f4550cc0b379c9c3441f6df7b84c',
            ],
        ]);
        $locations = json_decode($response->getBody()->getContents(), true);
        $locationId = $locations['locations'][0]['id'];
        // dd($locationId);z

        $fulfillment = [
            'fulfillment' => [
                'location_id' => $locationId,
                'tracking_number' => 'XYZ123',
                'tracking_urls' => [$carrierTrackingUrl],
                'notify_customer' => true,
            ],
        ];


        $res = '{"fulfillment":{"line_items_by_fulfillment_order":[{"fulfillment_order_id":1046001336}],"tracking_info":{"number":"MS1562678","url":"https://www.my-shipping-company.com?tracking_number=MS1562678"}}}';

        // dd($fulfillment);

        try {
            $response = $client->request('POST', "https://lsauve-test.myshopify.com/admin/api/2023-01/fulfillments.json", [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'X-Shopify-Access-Token' => 'shpua_75a6f4550cc0b379c9c3441f6df7b84c',
                ],
                $res
            ]);
        
            // Check if the response is successful
            if ($response->getStatusCode() == 200) {
                echo "Fulfillment created successfully!";
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            echo "Request failed with status code: " . $e->getCode();
            echo "Error message: " . $e->getMessage();
        }
    }
}
