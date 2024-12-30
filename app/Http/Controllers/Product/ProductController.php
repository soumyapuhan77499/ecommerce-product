<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Poojalist;
use App\Models\FlowerProduct;
use App\Models\Locality;
use App\Models\Apartment;
use App\Models\UserAddress;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function showProduct() {
        // Fetch banners from the external API
        $responseBanners = Http::get('https://pandit.33crores.com/api/app-banners');

        // Check if the response is successful and filter based on the 'flower' category
        $banners = $responseBanners->successful() && isset($responseBanners->json()['data'])
            ? collect($responseBanners->json()['data'])->filter(fn($banner) => isset($banner['category']) && strtolower($banner['category']) === 'flower')
            : collect();
           
            
        // Fetch other data for the view
        $upcomingPoojas = Poojalist::where('status', 'active')
                        ->where('pooja_date', '>=', now())
                        ->orderBy('pooja_date', 'asc')
                        ->take(3)
                        ->get();
        $otherpoojas = Poojalist::where('status', 'active')
                        ->whereNull('pooja_date')
                        ->take(9)
                        ->get();
        $products = FlowerProduct::where('status', 'active')
                        ->where('category', 'Package')
                        ->get();
                        
        $customizedpps = FlowerProduct::where('status', 'active')
                        ->where('category', 'Immediateproduct')
                        ->get();
                      
        return view("product/index", compact('upcomingPoojas', 'otherpoojas', 'products', 'banners','customizedpps'));
    }

    public function productdetails($slug)
    {
        $product = FlowerProduct::where('slug', $slug)->firstOrFail();
        return view('product.product-details', compact('product'));
    }

    public function show($product_id)
    {
       
        $product = FlowerProduct::where('product_id', $product_id)->firstOrFail();

        $localities = Locality::where('status', 'active')->select('unique_code', 'locality_name', 'pincode')->get();
        $apartments = Apartment::where('status', 'active')->get();
    
        $user = Auth::guard('users')->user();
        $addresses = UserAddress::where('user_id', $user->userid)->where('status', 'active')->get();
       
        return view('product.product-subscription-checkout', compact('localities','product','addresses','user','apartments'));
    }
}
