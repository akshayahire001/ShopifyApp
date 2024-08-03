<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use DB;
use Auth;
use App\Models\VendorProduct;
use App\Models\ProductVariant;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function syncProducs() {
        DB::beginTransaction();
        try {
            $store_data = \Auth::user()->vendor_store;
            $shop = $store_data['store_name']; //'lsauve-co-in.myshopify.com';
            $accessToken = $store_data['access_token']; //'shpua_f949cca74ed826231c139918334c951e';
            $client = new Client();
            $response = $client->request('GET', "https://{$shop}/admin/api/2023-01/products.json", [
                'headers' => [
                    'X-Shopify-Access-Token' => $accessToken,
                ],
            ]);

            $products = json_decode($response->getBody()->getContents(), true);
            $prdArr = $products['products'];
            foreach ($prdArr as $key => $product) {
                $cnt = 0;
                foreach ($product['variants'] as $key2 => $variants) {
                    $cnt += $variants['inventory_quantity'];                        
                }
                if($cnt == 0) {
                    unset($prdArr[$key]);
                }
            }

            $new_arr = array_values($prdArr);
            foreach ($new_arr as $k => $pr) {
                $check_prod = VendorProduct::where('shopify_product_id',$pr['id'])->count();
                if($check_prod == 0) {
                    $dt = new VendorProduct;
                    $dt->vendor_id = \Auth::user()->id;
                    $dt->shopify_product_id = $pr['id'];
                    $dt->product_name = $pr['title'];
                    $dt->description = $pr['body_html'];
                    $dt->product_json = json_encode($pr);
                    $dt->save();
                    $product_id = $dt->id;

                    foreach ($pr['variants'] as $k2 => $variants) {
                        $pv = new ProductVariant;
                        $pv->title = $variants['title'];
                        $pv->product_id = $product_id;
                        $pv->shopify_product_id = $variants['product_id'];
                        $pv->inventory_item_id = $variants['inventory_item_id'];
                        $pv->variant_id = $variants['id'];
                        $pv->qty = $variants['inventory_quantity'];
                        $pv->price = $variants['price'];
                        $pv->save();
                    }
                } else {
                    $prodDt = VendorProduct::where('shopify_product_id',$pr['id'])->first();
                    if($prodDt!=null) {
                        foreach ($pr['variants'] as $k2 => $variants) {
                            ProductVariant::where(['product_id'=>$prodDt->id,'variant_id'=>$variants['id']])->update(['qty' => $variants['inventory_quantity']]);
                        }
                    }
                }
            }
            DB::commit();
            dd("Done");
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
        }
    }

    public function getProducts() {
        // $id = \Auth::user()->id;
        // $products = VendorProduct::with('product_variants')->get();
        return view('vendor.product.index');
    }

    public function getProductsData(Request $request)
    {
        if(\request()->ajax()){
            $vendor_id = Auth::user()->id;
            $data = VendorProduct::with('product_variants')->latest()->where('vendor_id',$vendor_id)->get();
            return DataTables::of($data)
                // ->addIndexColumn()
                ->addColumn('product_name', function($row) {
                    $img_url = url('asset/images/product_search.png');
                    return '<div class="d-flex align-items-center">
                                      <div class="search_icon mr-3">
                                          <img src="'.$img_url.'">
                                      </div>
                                      <div>
                                          <p class="m-0">'.$row->product_name.'</p>
                                      </div>
                                  </div>';
                })
                ->addColumn('description', function($row) {
                    $img_url = url('asset/images/product_search.png');
                    return '<div class="d-flex align-items-center">
                                      <div class="search_icon mr-3">
                                          <img src="'.$img_url.'">
                                      </div>
                                      <div>
                                          <p class="m-0">'.$row->description.'</p>
                                      </div>
                                  </div>';
                })
                ->addColumn('images', function($row) {
                    $img_url = url('asset/images/product_img.png');
                    $img_url1 = url('asset/images/uploadproduct.png');
                    return '<div class="upload_imgtable">
                                      <ul>
                                          <li>
                                              <img src="'.$img_url.'">
                                          </li>
                                          <li>
                                              <img src="'.$img_url.'">
                                          </li>
                                          <li>
                                              <img src="'.$img_url.'">
                                          </li>
                                          <li>
                                              <img src="'.$img_url1.'">
                                          </li>
                                          <li>
                                              <img src="'.$img_url1.'">
                                          </li>
                                          <li>
                                              <img src="'.$img_url1.'">
                                          </li>
                                      </ul>
                                  </div>';
                })
                ->addColumn('pricing', function($row) {
                    $variants = $row->product_variants[0]->price;
                    return '£'.$variants;
                })
                ->addColumn('inventory', function($row) {
                    $variants = $row->product_variants;
                    $qty = 0;
                    foreach ($variants as $key => $variant) {
                        $qty += $variant->qty;
                    }
                    return $qty;
                })
                ->addColumn('vendor', function($row) {
                    return $row->vendor_name;
                })
                ->addColumn('action', function($row){
                    if($row->is_product_sync == 0) {
                        $img_url = url('asset/images/product_btn.png');
                        $actionBtn = '<div class="text-center"><button type="button" onClick=syncProduct("'.$row->shopify_product_id.'") class="btn_synce" id="btn_'.$row->shopify_product_id.'">SYNC <span><img src="'.$img_url.'"></span></button></div>';
                    }else if($row->is_product_sync == 1) {
                        $img_url = url('asset/images/right_mark.png');
                        $actionBtn = '<div class="text-center">
                                          <button type="button" class="btn_synce active_product">SYNC <span><img
                                                      src="'.$img_url.'"></span></button>
                                      </div>';
                    }
                    return $actionBtn;
                })
                ->rawColumns(['product_name','description','images','action'])
                ->make(true);
        }
    }

    public function singleSyncProduct(Request $request) {
        $productId = $request->input('productId');
        $getJson = VendorProduct::where('shopify_product_id',$productId)->with('product_variants')->first();
        
        // $store_data = \Auth::user()->vendor_store;
        // $accessToken = $store_data['access_token'];
        $prdJs = json_decode($getJson->product_json, TRUE);

        try {
            $client = new Client();
            $response = $client->request('POST', "https://lsauve-test.myshopify.com/admin/api/2023-01/products.json", [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'X-Shopify-Access-Token' => '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',
                ],
                'json' => ['product' => $prdJs],
            ]);

            $statusCode = $response->getStatusCode();
            if($statusCode == 201) {
                VendorProduct::where('shopify_product_id',$productId)->update(['is_product_sync'=>1]);
                $body = $response->getBody();
                $content = $body->getContents();    
                $data = json_decode($content, true);
                
                $prdData = $data['product']['variants'];
                foreach ($getJson['product_variants'] as $key => $value) {
                    $sync_prod_id = $prdData[$key]['product_id'];
                    $sync_variant_id = $prdData[$key]['id'];
                    $sync_inventory_item_id = $prdData[$key]['inventory_item_id'];
                    ProductVariant::where('id',$value->id)->update(['sync_product_id'=>$sync_prod_id,'sync_variant_id'=>$sync_variant_id,'sync_inventory_item_id'=>$sync_inventory_item_id]);
                }
                return response()->json(['message' => 'Product Sync Successfully','status'=>200], 200);                
            } else {
                return response()->json(['message' => 'Unable to sync product','status'=>500], 500);    
            }

        } catch (\Exception $e) {
            // dd($e->getMessage());
            return response()->json(['message' => 'Unable to sync product','status'=>422], 422);
        }
    }
}
