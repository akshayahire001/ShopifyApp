<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kyon147\LaravelShopify\Facades\Shopify;
use App\Models\Shop; // Assuming you have a Shop model to store shop details
use GuzzleHttp\Client;
use Auth;
use App\Models\VendorStore;

class ShopifyController extends Controller
{
    public function installApp(){
        return view('vendor_auth.install_app');
    }

    public function install(Request $request) {
        $request->validate([
            'shopname' => 'required|unique:vendors_store,store_name'
        ]);

        $shop = $request->shopname;

        // $shopifyApiKey = "38861000dabfbeb19880e8ddba0db4fa";
        // $shopifyApiSecret = "c4d10206c73869b657ebdc1af5ab7377";
        // $redirectUri = "https://shopifyexperts.co.uk/callback";

        $shopifyApiKey = env('SHOPIFY_DESTINATION_APP_KEY');
        $scopes = env('SHOPIFY_API_SCOPES');
        $redirectUri = env('SHOPIFY_REDIRECT_URI');

        $installUrl = "https://$shop/admin/oauth/authorize?client_id=$shopifyApiKey&scope=$scopes&redirect_uri=$redirectUri";
        return redirect($installUrl);
    }

    public function callback(Request $request) {
        $code = $request->get('code');
        $shop = $request->get('shop');

        $shopifyApiKey = env('SHOPIFY_DESTINATION_APP_KEY');
        $shopifyApiSecret = env('SHOPIFY_DESTINATION_APP_SECRET');

        $client = new Client();

        $response = $client->post("https://{$shop}/admin/oauth/access_token", [
            'form_params' => [
                'client_id' => env('SHOPIFY_DESTINATION_APP_KEY'),
                'client_secret' => env('SHOPIFY_DESTINATION_APP_SECRET'),
                'code' => $code,
            ],
        ]);

        $data = json_decode($response->getBody()->getContents(), true);
        $accessToken = $data['access_token'];
        
        $shopData = [
            'vendor_id' => Auth::user()->id,
            'store_name' => $shop,
            'access_token' => $accessToken,
        ];
        VendorStore::updateOrCreate(['store_name' => $shop], $shopData);

        $appUrl = env('SHOPIFY_DESTINATION_APP_URL');
        // $url = "https://shopifyexperts.co.uk/shopify/install/".$shop;
        $url = $appUrl."/shopify/install/".$shop;
        $json = [
            'topic' => 'orders/create',
            'address' => $url,
            'format' => 'json',
        ];
        $response = $client->request('POST', "https://$shop/admin/api/2024-01/webhooks.json", [
            'headers' => [
                'Content-Type' => 'application/json',
                'X-Shopify-Access-Token' => $accessToken,
            ],
            'json' => ['webhook' => $json],
        ]);

        // $response123 = $client->request('GET', "https://$shop/admin/api/2024-01/webhooks.json", [
        //     'headers' => [
        //         'Content-Type' => 'application/json',
        //         'X-Shopify-Access-Token' => $accessToken,
        //     ]
        // ]);
        // $body = $response123->getBody();
        // $content = $body->getContents();    
        // $data = json_decode($content, true);
        // dd($data);

        return redirect("vendor/dashboard");
    }

    public function handleOrderCreate(Request $request)
    {
        $data = $request->getContent();
    }

    // public function install(Request $request)
    // {
    //     // Shopify App Installation Process

    //     // Step 1: Retrieve the Shopify App Credentials
    //     $shopifyApiKey = "38861000dabfbeb19880e8ddba0db4fa";
    //     $shopifyApiSecret = "c4d10206c73869b657ebdc1af5ab7377";
    //     $redirectUri = "https://shopifyexperts.co.uk/callback";

    //     // Step 2: Check if the Installation Request is Valid
    //     if (isset($_GET['shop'])) {
    //         $shop = $_GET['shop'];

    //         // Step 3: Generate Installation URL
    //         $installUrl = "https://$shop/admin/oauth/authorize?client_id=$shopifyApiKey&scope=read_products,write_products&redirect_uri=$redirectUri";

    //         // Step 4: Redirect the User to the Installation URL
    //         header("Location: $installUrl");
    //         exit;
    //     }

    //     // Step 5: Handle Callback After Installation
    //     if (isset($_GET['shop'], $_GET['code'])) {
    //         $shop = $_GET['shop'];
    //         $code = $_GET['code'];

    //         // Step 6: Exchange Authorization Code for Access Token
    //         $accessTokenUrl = "https://$shop/admin/oauth/access_token";
    //         $accessTokenParams = array(
    //             "client_id" => $shopifyApiKey,
    //             "client_secret" => $shopifyApiSecret,
    //             "code" => $code
    //         );
    //         $ch = curl_init();
    //         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //         curl_setopt($ch, CURLOPT_URL, $accessTokenUrl);
    //         curl_setopt($ch, CURLOPT_FAILONERROR, true); // Required for HTTP error codes to be reported via our call to curl_error($ch)

    //         curl_setopt($ch, CURLOPT_POST, count($accessTokenParams));
    //         curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($accessTokenParams));
    //         $accessqueryresultJSON = curl_exec($ch);
    //         if (curl_errno($ch)) {
    //             echo $error_msg = curl_error($ch);
    //         }
    //         curl_close($ch);


    //         // Step 7: Store Access Token in Database
    //         $accesstokenresultarray = json_decode($accessqueryresultJSON);
    //         $accesstoken = $accesstokenresultarray['access_token'];
    //     }

    //     // Step 9: Display Installation Button
    //     echo '<a href="install?shop=lsauve-test.myshopify.com/">Install App</a>';
    // }

    // function getAccessToken($shop, $apiKey, $secret, $code)
    // {
    //     $query = array(
    //         'client_id' => $apiKey,
    //         'client_secret' => $secret,
    //         'code' => $code
    //     );

    //     // Build access token URL
    //     $access_token_url = "https://{$shop}/admin/oauth/access_token";

    //     // Configure curl client and execute request
    //     $curl = curl_init();
    //     $curlOptions = array(
    //         CURLOPT_RETURNTRANSFER => TRUE,
    //         CURLOPT_URL => $access_token_url,
    //         CURLOPT_HTTPHEADER => [
    //             'content-type: application/x-www-form-urlencoded'
    //         ],
    //         CURLOPT_POSTFIELDS => http_build_query($query),

    //     );
    //     curl_setopt_array($curl, $curlOptions);
    //     curl_setopt($curl, CURLOPT_FAILONERROR, TRUE);
    //     $jsonResponse = json_decode(curl_exec($curl), TRUE);
    //     // dd($jsonResponse);

    //     if (curl_errno($curl)) {
    //         $error_msg = curl_error($curl);
    //         curl_close($curl);
    //         dd("Curl error: $error_msg");
    //         return null;
    //     }

    //     curl_close($curl);

    //     return $jsonResponse['access_token'];
    // }

    // public function callback(Request $request)
    // {
    //     $shop = $request->input('shop');
    //     $code = $request->input('code');
    //     $accessToken = $this->getAccessToken($shop, '38861000dabfbeb19880e8ddba0db4fa', 'c4d10206c73869b657ebdc1af5ab7377', $code);

    //     // Store shop details in the database
    //     $shopData = [
    //         'shop' => $shop,
    //         'access_token' => $accessToken,
    //     ];

    //     Shop::updateOrCreate(['shop' => $shop], $shopData);

    //     return redirect()->route('shopify.install');
    // }
}