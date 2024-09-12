<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RealEstatesController extends Controller
{
    public function index (){

        $token = '9cfba85b-c5ed-4060-8cf9-21cf1a1fb339';
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('https://api.real-estate-manager.redberryinternship.ge/api/regions');

        if ($response->successful()) {

            $regions = $response->json();

        } else {

            dd($response->status(), $response->body());
        }


        return view('index',compact('regions'));
    }

    public function create(){



        return view('pages.createRealEstate');
    }
}
