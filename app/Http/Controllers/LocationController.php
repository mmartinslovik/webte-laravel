<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Location;

class LocationController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('location');
        $locationResponse = Http::get('http://api.positionstack.com/v1/forward', [
            'access_key' => 'd035dc610782f997abaa2cfbd4f77e4a',
            'query' => $query,
            'country_module' => 1,
        ]);

        $decoded = json_decode($locationResponse);

        $country = new Country();
        $country->name = $decoded->data[0]->country;
        $country->capital = $decoded->data[0]->country_module->capital;
        $country->iso_code = $decoded->data[0]->country_code;
        CountryController::check($country);

        $location = new Location();

        $location->name = $decoded->data[0]->name;
        $location->latitude = $decoded->data[0]->latitude;
        $location->longitude = $decoded->data[0]->longitude;
        $location->country_iso_code = $decoded->data[0]->country_code;

        $weatherResponse = Http::get('http://api.weatherapi.com/v1/forecast.json', [
            'key' => 'ebc2266fdf0f489381472849222404',
            'q' => "$location->latitude,$location->longitude",
            'days' => 1,
        ]);

        $location->local_time = json_decode($weatherResponse)->location->localtime;
        $location->save();

        session_start();
        $_SESSION['user'] = [
            'location' => $location,
            'country' => $country,
            'weather' => json_decode($weatherResponse)->forecast->forecastday[0]->day,
            'iso_code' => $location->country_iso_code,
        ];

        return view('result')->with([
            'location' => $location,
            'country' => $country,
            'weather' => json_decode($weatherResponse)->forecast->forecastday[0]->day,
            'iso_code' => $location->country_iso_code,
        ]);
    }
}
