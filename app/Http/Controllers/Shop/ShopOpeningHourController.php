<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopOpeningHourController extends Controller
{
    public function shopOpeningHours(Request $request, Shop $shop)
    {
        return view('admin.shops.opening_hours.opening_hours', compact('shop'));
    }

    public function updateOpeningHours(Request $request, Shop $shop)
    {
        $request->validate([
            'opening_hours' => 'array',
        ]);

        $shop->setOpeningHours($request->input('opening_hours'));

        return redirect()->route('admin.shops.opening_hours', $shop->id)->with('success', 'Opening hours updated successfully');
    }
}
