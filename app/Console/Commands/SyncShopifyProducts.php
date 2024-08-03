<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Auth;
use GuzzleHttp\Client;
use App\Models\VendorProduct;
use App\Models\ProductVariant;
use App\Models\VendorStore;

class SyncShopifyProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync shopify products';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::beginTransaction();
        try {
            $storeDts = VendorStore::get();
            if(!empty($storeDts)) {
                foreach ($storeDts as $key => $storeDt) {
                    $shop = $storeDt['store_name'];
                    $accessToken = $storeDt['access_token'];
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
                            $dt->vendor_id = $storeDt['vendor_id'];
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
                            
                            $prodDt = VendorProduct::with('product_variants')->where(['shopify_product_id'=>$pr['id'],'is_product_sync'=>1])->first();
                            if($prodDt!=null) {
                                $response = $client->request('GET', "https://lsauve-test.myshopify.com/admin/api/2023-01/locations.json", [
                                    'headers' => [
                                        'X-Shopify-Access-Token' => 'shpua_75a6f4550cc0b379c9c3441f6df7b84c',
                                    ],
                                ]);

                                $v_arr = [];
                                foreach ($prodDt->product_variants as $key => $value) {
                                    $v_arr[$value['variant_id']] = $value['sync_inventory_item_id'];
                                }

                                $v2_arr = [];
                                foreach ($pr['variants'] as $k2 => $variants) {
                                    $v2_arr[$variants['id']] = $variants['inventory_quantity'];
                                }

                                $locations = json_decode($response->getBody()->getContents(), true);
                                $locationId = $locations['locations'][0]['id'];

                                foreach ($v_arr as $vid => $vdata) {
                                    $response = $client->request('POST', "https://lsauve-test.myshopify.com/admin/api/2023-01/inventory_levels/set.json", [
                                        'headers' => [
                                            'X-Shopify-Access-Token' => "shpua_75a6f4550cc0b379c9c3441f6df7b84c",
                                        ],
                                        'json' => [
                                            'location_id' => $locationId,
                                            'inventory_item_id' => $vdata,
                                            'available' => $v2_arr[$vid]
                                        ]
                                    ]);
                                    ProductVariant::where(['product_id'=>$prodDt->id,'variant_id'=>$vid])->update(['qty' => $v2_arr[$vid]]);
                                }
                            }
                        }
                    }
                    DB::commit();
                    $this->info('Product sync successfully');
                }
            }
        } catch (\Throwable $th) {
            DB::rollback();
            $this->info($th);
        }
        $this->info('Job finish');
    }
}
