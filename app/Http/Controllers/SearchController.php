<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Province;
use App\City;
use App\Http\Controllers\SetGuzzleClient as Client;

class SearchController extends Controller
{
    public function getProvinces(Request $request)
    {
//        $this->validate($request, [
//            'id' => 'required|max:2'
//        ]);

        if (config('swap-api.source') != "db"){
            return $this->getApiRedirect('province', $request);
        }

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

        if (config('swap-api.source') != "db"){
            return $this->getApiRedirect('city', $request);
        }

        $city = City::with(['province'])
            ->select('id','province_id','city_name')
            ->where('id', $request->id)
            ->first();

        return $city;
    }

    private function getApiRedirect($url, $request)
    {
        $response = Client::client()->get($url, [
            'headers' => [
                'key' => '0df6d5bf733214af6c6644eb8717c92c'
            ],
            'query' => ['id' => $request->id],
        ])->getBody();

        return $response;
    }

    public function coba()
    {
        return "HALOO";
    }
}
