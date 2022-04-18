<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class JdeApiController extends Controller
{
    public function jdeComp() {

        $client = new Client([
            // Url base
            'base_uri' => 'http://localhost:8001/api/',
        ]);
    
        $response = $client->request('GET', 'fullJde', [
            'headers' => [
                'Authorization' => [
                       'Bearer', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMDNjMzk5N2I0MTQyMWM2MTQ4NDU3YWFjMjExZThmYjEwNjNiNDczYjkyYmZmZTRiODliODkyZThmMzYwOTk2NDIxYWI0ODljZTQ4ZjA2MjMiLCJpYXQiOjE2NDkwNzYyNzEuMTY5NDE5LCJuYmYiOjE2NDkwNzYyNzEuMTY5NDI3LCJleHAiOjE2ODA2MTIyNzEuMTA5NzU1LCJzdWIiOiI4Iiwic2NvcGVzIjpbXX0.E-Q1K65qDYG8dvQEf6G3Edy--lXHGYsr0NyLvjkiYvKgTJz9S7EIU0UXCDnjGvqvtwDK19i3-zg3y8FXqDlvQ_1hbCdnywISUuX7ym6uPV4WaStLj8Mt5W94A57kBdWW7iNgFVbmP-86g753s3eZsnDXfIP8_MdnKaApUGmJISUSNIJJXxLwxy-bm1Rj6KGNebrWMI0i59dsixcwz4IHSTOjKVq6yFJQS_jryWvWZs_4-6fqaFxlqW7tKVSA677CYsYyNlJTnaXn-NZVLnDy3w7WXkL1ogITSnMSIX2wUuwRSMYuwyG_zHdzb0VsIb6EHpQV4eKy_VJ_qMRbsssjpmzhWTTk2Lsjt6PsMo1omD0bD3W8uBnaI1uwEqkB_A6AXMr6Z_0BCsS36y92gas8eXHfuAQVhav6wwiERFPRTYhXjN1RoXPa7KSyB-o0UFJJxu7nKzKmymjKgmyZkvm_6Hlu45scL2jlrVQ8GjjJ8IxE5z-j-Mdt_FBINZWBf6g3eFZoJfepUGzLj85UECGkiCZLYaQrMjDznI4z2JT2KIonIhxQ45W5oqXDAtUVcBhldaeoq6lfJFcr8Nb9BTr3QG-POjRHFGlguczxR5-tCRSCXnMFrOhsuI8lPXrKUNMGqe4sEZzn06wYlqfbdEDoUiOIhKvq8oF-PLuQFILtBMg'
                    ]
            ]
        ]);
    
        return $data2 = json_decode($response->getBody()->getcontents());
    
        // return view('jde', compact('data2'));
    }



    public function index() {

        $client = new Client([
            // Url base
        ]);
        $token = 'NluQJEGxlnyCrilEBRwFVJiMtmBDbD3CQqR3hBQY' ;
        $response = $client->get('http://localhost:8001/api/fullJde', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' =>  'Bearer ' . $token
            ]
        ]);
    
        $data2 = json_decode($response->getBody()->getcontents());
    
        return view('jde', compact('data2'));
    }
}
