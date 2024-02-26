<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShopPhoneController extends Controller
{
    // shopPhone get post put delete
    public function shopPhone(Request $request, Shop $shop)
    {
        if ($request->isMethod('post')) {
            Validator::make($request->all(), [
                'phones' => 'required|array',
                'phones.*.number' => [
                    'nullable',
                    'string',
                    'max:255',
                    // Add custom validation rule for phone number format
                    // function ($attribute, $value, $fail) {
                    //     if (!preg_match('/^\+(?:[0-9] ?){6,14}[0-9]$/', $value)) {
                    //         $fail(__('validation.phone'));
                    //     }
                    // },
                ],
                'phones.*.position' => 'required|numeric',
            ])->validate();

            $phones = $request->input('phones');
            $serializedPhones = [];
            foreach ($phones as $phone) {
                $serializedPhones[] = [
                    'number' => $phone['number'],
                    'position' => $phone['position']
                ];
            }

            $shop->metas()->updateOrCreate(
                ['meta_key' => \App\Models\ShopMeta::META_PHONE_NUMBER],
                ['meta_value' => serialize($serializedPhones)]
            );

            return redirect()->back()->with('success', __('label.data_updated'));
        }

        // If there are no existing phone numbers, provide two empty fields
        $phones = [];
        if ($shop->metas()->where(
            'meta_key',
            \App\Models\ShopMeta::META_PHONE_NUMBER
        )->exists()) {
            $phones = unserialize($shop->metas()->where('meta_key', \App\Models\ShopMeta::META_PHONE_NUMBER)->first()->meta_value);
        } else {
            // Provide two empty fields
            $phones = [
                ['number' => '', 'position' => ''],
                ['number' => '', 'position' => '']
            ];
        }
        // sort by position
        usort($phones, function ($a, $b) {
            return $a['position'] <=> $b['position'];
        });

        return view('admin.shops.phone.phone', compact('shop', 'phones'));
    }
}
