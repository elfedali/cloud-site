<?php

namespace App\Http\Controllers\Shop;

use App\Models\Shop;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;

class ShopMenuController extends Controller
{
    // create a new menu
    public function shopMenu(
        Request $request,
        Shop $shop
    ) {

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'title' => 'required|string|max:255',
            ]);

            $menu = new \App\Models\Menu();
            $menu->title = $request->input('title');

            $menu->status = 'publish';
            $menu->comment_status = 'closed';
            $menu->ping_status = 'closed';
            $menu->position = 0;
            $menu->is_active = true;
            $menu->owner_id = $shop->owner_id;
            $menu->save();

            return redirect()->route(
                'admin.shops.menu',

                ['shop' => $shop->id]
            );
        }

        $menus = $shop->getShopMenus();


        return view(
            'admin.shops.menu.menu',
            [
                'shop' => $shop,
                'menus' => $menus,
            ]
        );
    }

    public function destroy(
        Request $request,
        Shop $shop,
        Menu $menu
    ) {
        $menu->delete();

        return redirect()->route(
            'admin.shops.menu',
            ['shop' => $shop->id]
        )->with('success', __('label.data_deleted'));
    }

    public function update(
        Request $request,
        Shop $shop,
        Menu $menu
    ) {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'position' => 'nullable|numeric',
        ]);

        $menu->title = $request->input('title');
        $menu->position = $request->input('position') ?? 0;
        $menu->save();

        return redirect()->route(
            'admin.shops.menu',
            ['shop' => $shop->id]
        )->with('success', __('label.data_updated'));
    }
}
