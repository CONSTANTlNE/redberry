<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class AgentsController extends Controller
{


    public function index()
    {

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.config('api.redberry'),
        ])->get('https://api.real-estate-manager.redberryinternship.ge/api/agents');


    }

    public function create(Request $request)
    {

        $file = $request->file('file');
        $filePath = $file->path();

         Http::withHeaders([
            'accept' => 'application/json',
            'Authorization' => 'Bearer ' . config('api.redberry'),
        ])->attach(
            'avatar', file_get_contents($filePath), 'file_name.jpg'
        )->post('https://api.real-estate-manager.redberryinternship.ge/api/agents', [
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

         Cache::forget('agents');


         return back()->with('alert_success','აგენტი წარმატებით დაემატა');


    }
}
