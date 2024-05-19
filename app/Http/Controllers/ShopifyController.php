<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;

class ShopifyController extends Controller
{
    public function redirectToShopify()
    {
        //$vendorDetails = Vendor::where('store_name', $vendor)->firstOrFail();

        /*return Socialite::driver('shopify')
            ->setScopes(['read_products', 'write_products']) // Define necessary scopes
            ->with([
                'client_id' => '15711ab4a7495fdb67ef4829129464e6',
                'redirect_uri' => route('shopify.callback')
            ])
            ->redirectUrl("https://lsauve-test.myshopify.com/admin/oauth/authorize")
            ->redirect();*/
        
            $scopes = 'read_products,write_products';
            $redirectUri = route('shopify.callback');
        
            return redirect("https://lsauve-test.myshopify.com/admin/oauth/authorize?client_id=15711ab4a7495fdb67ef4829129464e6&scope={$scopes}&redirect_uri={$redirectUri}&response_type=code");
    }

    public function handleCallback(Request $request)
    {

        $code = $request->code;
        $shopUrl = $request->shop;
        dd($code, $shopUrl);
        // $user = Socialite::driver('shopify')->user();
        // dd($user);
        // Store access token and other details in your database
        // Shop::create([
        //     'vendor_id' => $request->session()->get('vendor_id'),
        //     'shop_domain' => $user->getNickname(), // Assuming the nickname is the shop domain
        //     'access_token' => $user->token
        // ]);

        // return redirect()->to('/dashboard'); // Redirect to a post-installation page
    }
}
