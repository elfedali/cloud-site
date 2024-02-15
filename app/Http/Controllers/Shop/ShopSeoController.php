<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopSeoController extends Controller
{
    public function shopSeo(Request $request)
    {
        return view('admin.shop.seo');
    }
}
