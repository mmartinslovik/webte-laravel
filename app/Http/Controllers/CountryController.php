<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public static function check(Country $country)
    {
        if(Country::where('iso_code', $country->iso_code)->count() == 0) {
            $country->save();
        }
    }
}
