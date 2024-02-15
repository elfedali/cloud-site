<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopMenuItemController extends Controller
{
    public function updateMenuItem(Request $request, Shop $shop, Menu $menu, $menuItem)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string|max:255',
            'position' => 'nullable|numeric',
        ]);

        $menu->updateItem($menuItem, $request->all());

        return redirect()->route('admin.shops.menu', ['shop' => $shop->id])->with('success', 'Menu item updated successfully');
    }

    public function destroyMenuItem(Request $request, Shop $shop, Menu $menu, $item)
    {

        $menu->deleteItem($item);
        return redirect()->route('admin.shops.menu', ['shop' => $shop->id])->with('success', 'Menu item deleted successfully');
    }

    /**
     * Save the menu item to the database
     */
    public function addItem(
        Request $request,
        Shop $shop,
        Menu $menu
    ) {
        // validate the request
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);
        $data = $request->only([

            'title',
            'price',
            'description',
        ]);
        $menu->addItem($data);
        $menu->save();
        return redirect()->route(
            'admin.shops.menu',
            ['shop' => $shop->id]
        )->with('success', 'Menu item updated successfully');
    }
}
