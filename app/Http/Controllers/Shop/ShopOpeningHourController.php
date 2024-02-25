<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;
use Spatie\OpeningHours\OpeningHours;


class ShopOpeningHourController extends Controller
{
    public function shopOpeningHours(Request $request, Shop $shop)
    {
        return view('admin.shops.opening_hours.opening_hours', compact('shop'));
    }

    public function updateOpeningHours(Request $request, Shop $shop)
    {
        //  dump($request->all());
        $this->validate($request, [
            'days' => 'required|array',
            'days.*.is_open' => 'nullable',
            'days.*.open_time' => 'required_if:days.*.is_open,true|date_format:H:i',
            'days.*.close_time' => 'required_if:days.*.is_open,true|date_format:H:i|after:days.*.open_time',
        ]);

        $requestData = $request->all();

        $data = $requestData['days'];

        // $openingHoursData = [];

        // foreach ($data as $day => $schedule) {
        //     $openingHours = [];

        //     if (isset($schedule['is_open']) && $schedule['is_open'] === "true") {
        //         $openingTime = $schedule['open_time'];
        //         $closingTime = $schedule['close_time'];
        //         $openingHours[] = $openingTime . '-' . $closingTime;
        //     } else {
        //         $openingHours = [];
        //     }

        //     $openingHoursData[$day] = $openingHours;
        // }
        // /**
        //  * @var OpeningHours $openingHours
        //  */
        // $openingHours = OpeningHours::create($openingHoursData);

        $shop->setOpeningHours($data);

        //$shop->openingHours()->update($openingHours->forDatabase());

        return redirect()->route('admin.shops.opening-hours', $shop->id)->with('success', __('label.data_saved'));
    }
}
