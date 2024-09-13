<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RealEstatesController extends Controller
{
    public function index (){


        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' .config('api.redberry'),
        ])->get('https://api.real-estate-manager.redberryinternship.ge/api/regions');

        if ($response->successful()) {

            $regions = $response->json();

        } else {

            dd($response->status(), $response->body());
        }


        return view('index',compact('regions'));
    }

    public function create(){


        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' .config('api.redberry'),
        ])->get('https://api.real-estate-manager.redberryinternship.ge/api/regions');

        if ($response->successful()) {

            $regions = $response->json();

        } else {

            dd($response->status(), $response->body());
        }


        $response2 = Http::withHeaders([
            'Authorization' => 'Bearer ' .config('api.redberry'),
        ])->get('https://api.real-estate-manager.redberryinternship.ge/api/cities');

        if ($response2->successful()) {

            $cities = $response2->json();

        } else {

            dd($response2->status(), $response2->body());
        }

        $response3 = Http::withHeaders([
            'Authorization' => 'Bearer ' .config('api.redberry'),
        ])->get('https://api.real-estate-manager.redberryinternship.ge/api/agents');

        if ($response3->successful()) {

            $agents = $response3->json();

        } else {

            dd($response3->status(), $response3->body());
        }




        return view('pages.createRealEstate',compact('regions','cities','agents'));
    }

    public function store(Request $request){

        dd($request->all());



    }
}
