<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RealEstatesController extends Controller
{
    public function index()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.config('api.redberry'),
        ])->get('https://api.real-estate-manager.redberryinternship.ge/api/regions');

        if ($response->successful()) {
            $regions = $response->json();
        } else {
            dd($response->status(), $response->body());
        }


        $response2 = Http::withHeaders([
            'Authorization' => 'Bearer '.config('api.redberry'),
        ])->get('https://api.real-estate-manager.redberryinternship.ge/api/real-estates');

        if ($response2->successful()) {
            $listings = $response2->json();
        } else {
            dd($response2->status(), $response2->body());
        }


        return view('index', compact('regions', 'listings'));
    }

    public function create()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.config('api.redberry'),
        ])->get('https://api.real-estate-manager.redberryinternship.ge/api/regions');

        if ($response->successful()) {
            $regions = $response->json();
        } else {
            dd($response->status(), $response->body());
        }


        $response2 = Http::withHeaders([
            'Authorization' => 'Bearer '.config('api.redberry'),
        ])->get('https://api.real-estate-manager.redberryinternship.ge/api/cities');

        if ($response2->successful()) {
            $cities = $response2->json();
        } else {
            dd($response2->status(), $response2->body());
        }

        $response3 = Http::withHeaders([
            'Authorization' => 'Bearer '.config('api.redberry'),
        ])->get('https://api.real-estate-manager.redberryinternship.ge/api/agents');

        if ($response3->successful()) {
            $agents = $response3->json();
        } else {
            dd($response3->status(), $response3->body());
        }


        return view('pages.createRealEstate', compact('regions', 'cities', 'agents'));
    }

    public function store(Request $request)
    {
        $file     = $request->file('image');
        $filePath = $file->path();

        $response = Http::withHeaders([
            'accept'        => 'application/json',
            'Authorization' => 'Bearer '.config('api.redberry'),
        ])->attach(
            'image', file_get_contents($filePath), 'file_name.jpg' // Change 'file_name.jpg' as needed
        )->post('https://api.real-estate-manager.redberryinternship.ge/api/real-estates', [
            'address'     => $request->address,
            'region_id'   => $request->region_id,
            'description' => $request->description,
            'city_id'     => $request->city_id,
            'zip_code'    => $request->zip_code,
            'price'       => $request->price,
            'area'        => $request->area,
            'bedrooms'    => $request->bedrooms,
            'is_rental'   => $request->is_rental,
            'agent_id'    => $request->agent_id,

        ]);


        if (!$response->successful()) {
            return back()->with('alert_error', 'რაღაც შეცდომა');
        }


        return back()->with('alert_success', 'ლისტინგი წარმატებით დაემატა');
    }

}
