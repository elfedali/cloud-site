<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;

class ShopSeoController extends Controller
{
    public function shopSeo(Request $request, Shop $shop)
    {


        return view('admin.shops.seo.seo', compact('shop'));
    }

    public function updateSeo(Request $request, Shop $shop)
    {
        $request->validate([
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable|max:255',
            'meta_keywords' => 'nullable|max:255',
        ]);

        $shop->setSeo($request->only('meta_title', 'meta_description', 'meta_keywords'));

        return redirect()->route('admin.shops.seo', $shop->id)->with('success', __('label.data_saved'));
    }
}
