<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\CompararArrays;

class ProactivanetApiController extends Controller
{
    public function proComp() {

        $client = new Client([
            'base_uri' => 'http://localhost:8002/api/',
        ]);
    
        $response = $client->request('GET', 'fullProacti');
    
        return $data = json_decode($response->getBody()->getcontents());

        // return view('proactivanet', compact('data'));

    }

    public function index() {

        $client = new Client([
            'base_uri' => 'http://localhost:8002/api/',
        ]);
    
        $response = $client->request('GET', 'fullProacti');
    
        $data = json_decode($response->getBody()->getcontents());

        return view('proactivanet', compact('data'));

    }
}
