<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CitiesController extends Controller
{
    public function cities(Request $request){

           $regionId = $request->input('region_id');



        $response2 = Http::withHeaders([
            'Authorization' => 'Bearer ' .config('api.redberry'),
        ])->get('https://api.real-estate-manager.redberryinternship.ge/api/cities');

        if ($response2->successful()) {

            $allcities = $response2->json();

        } else {

            dd($response2->status(), $response2->body());
        }


        $cities = array_filter($allcities, function ($city) use ($regionId) {

            return $city['region_id'] == $regionId;
        });



        return view('htmx.cities',compact('cities'));


    }
}
