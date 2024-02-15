<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopImageController extends Controller
{
    function uploadImage(Request $request, Shop $shop)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $shop->addMediaFromRequest('image')->toMediaCollection('images');

            //$imageName = time().'.'.$request->image->extension();  
            //$request->image->move(public_path('images'), $imageName);

            return redirect()->route('admin.shops.images', $shop->id)->with('success', 'Image uploaded successfully.');
        }

        return view('admin.shops.images.images', [
            'shop' => $shop,

        ]);
    }

    function destroyImage(Shop $shop, $id)
    {
        $shop->getMedia('images')->find($id)->delete();
        return redirect()->route('admin.shops.images', $shop->id)->with('success', 'Image deleted successfully.');
    }
}
