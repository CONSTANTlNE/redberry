<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;


class RealEstatesController extends Controller
{
    public function index(Request $request)
    {
        // Cache regions for 30 minutes
        $regions = Cache::remember('regions', 300 * 60, function () {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . config('api.redberry'),
            ])->get('https://api.real-estate-manager.redberryinternship.ge/api/regions');

            if ($response->successful()) {
                return $response->json();
            } else {
                dd($response->status(), $response->body());
            }
        });

        // Cache listings for 30 minutes
        $listings = Cache::remember('listings', 300 * 60, function () {
            $response2 = Http::withHeaders([
                'Authorization' => 'Bearer ' . config('api.redberry'),
            ])->get('https://api.real-estate-manager.redberryinternship.ge/api/real-estates');

            if ($response2->successful()) {
                return $response2->json();
            } else {
                dd($response2->status(), $response2->body());
            }
        });

        // START FILTERING
        $filteredregions  = [];
        $filteredlistings = $listings; // Start with all listings

        // Filter by region if provided
        if ($request->has('region')) {
            $requestregions   = $request->region;
            $filteredlistings = [];

            foreach ($listings as $listing) {
                if (in_array($listing['city']['region_id'], $requestregions)) {
                    $filteredlistings[] = $listing;
                }
            }

            foreach ($regions as $item) {
                if (in_array($item['id'], $requestregions)) {
                    $filteredregions[] = $item;
                }
            }
        }

        // Filter by price range if provided
        if ($request->has('minprice') && $request->minprice != null && $request->has('maxprice') && $request->maxprice != null) {
            $minPrice = $request->minprice;
            $maxPrice = $request->maxprice;

            $filteredlistings = array_filter($filteredlistings, function ($listing) use ($minPrice, $maxPrice) {
                return $listing['price'] >= $minPrice && $listing['price'] <= $maxPrice;
            });
        }

        // Filter by area if provided
        if ($request->has('minarea') && $request->minarea != null && $request->has('maxarea') && $request->maxarea != null) {
            $minArea = (float) $request->minarea;
            $maxArea = (float) $request->maxarea;

            $filteredlistings = array_filter($filteredlistings, function ($listing) use ($minArea, $maxArea) {
                return $listing['area'] >= $minArea && $listing['area'] <= $maxArea;
            });
        }

        // Filter by rooms if provided
        if ($request->has('bedrooms') && $request->bedrooms != null) {
            $rooms = $request->bedrooms;

            $filteredlistings = array_filter($filteredlistings, function ($listing) use ($rooms) {
                return $listing['bedrooms'] == $rooms;
            });
        }

        // If no filters are applied, return all listings
        if (!$request->has('region') && !$request->has('minprice') && !$request->has('maxprice') && !$request->has('minarea') && !$request->has('maxarea') && !$request->has('rooms')) {
            $filteredlistings = $listings;
        }

        return view('index', compact('regions', 'listings', 'filteredregions', 'filteredlistings'));
    }

    public function create()
    {

        $regions = Cache::remember('regions', 300 * 60, function () {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . config('api.redberry'),
            ])->get('https://api.real-estate-manager.redberryinternship.ge/api/regions');

            if ($response->successful()) {
                return $response->json();
            } else {
                dd($response->status(), $response->body());
            }
        });



        $cities = Cache::remember('cities', 300 * 60, function () {
            $response2 = Http::withHeaders([
                'Authorization' => 'Bearer '.config('api.redberry'),
            ])->get('https://api.real-estate-manager.redberryinternship.ge/api/cities');

            if ($response2->successful()) {
                return $response2->json();
            } else {
                dd($response2->status(), $response2->body());
            }
        });




        $agents = Cache::remember('agents', 300 * 60, function () {
            $response3 = Http::withHeaders([
                'Authorization' => 'Bearer '.config('api.redberry'),
            ])->get('https://api.real-estate-manager.redberryinternship.ge/api/agents');

            if ($response3->successful()) {
              return $response3->json();
            } else {
                dd($response3->status(), $response3->body());
            }
        });



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
            'image', file_get_contents($filePath), 'file_name.jpg', // Change 'file_name.jpg' as needed
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


        // When a listing is updated
        Cache::forget('listings');




        if (!$response->successful()) {
            return redirect()->route('real-estates.index')->with('alert_error', 'რაღაც შეცდომა');
        }



        return redirect()->route('real-estates.index')->with('alert_success', 'ლისტინგი წარმატებით დაემატა');
    }

    public function show(Request $request, $id)
    {
        // Get single listing
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.config('api.redberry'),
        ])->get('https://api.real-estate-manager.redberryinternship.ge/api/real-estates/'.$id);


        $listing = $response->json();


        // Get All listings for swiper
        $response2 = Http::withHeaders([
            'Authorization' => 'Bearer '.config('api.redberry'),
        ])->get('https://api.real-estate-manager.redberryinternship.ge/api/real-estates');

        if ($response2->successful()) {
            $listings = $response2->json();
        } else {
            dd($response2->status(), $response2->body());
        }


        return view('pages.singleListing', compact('listing', 'listings'));
    }

    public function delete(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.config('api.redberry'),
        ])->delete('https://api.real-estate-manager.redberryinternship.ge/api/real-estates/'.$request->id);


        Cache::forget('listings');

        return redirect()->route('real-estates.index')->with('alert_success', 'ლისტინგი წარმატებით წაიშალა');
    }

}
