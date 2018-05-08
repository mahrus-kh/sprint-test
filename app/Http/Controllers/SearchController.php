<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Province;
use App\City;

class SearchController extends Controller
{
    public function getProvinces(Request $request)
    {
//        $this->validate($request, [
//            'id' => 'required|max:2'
//        ]);

        $province = Province::select('id','province')
            ->where('id', $request->id)
            ->first();

        return $province;
    }

    public function getCity(Request $request)
    {
//        $this->validate($request, [
//            'id' => 'required|max:2'
//        ]);

        $city = City::with(['province'])
            ->select('id','province_id','city_name')
            ->where('id', $request->id)
            ->first();

        return $city;
    }
}
