<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;


class DelayController extends Controller
{
    public function index(){       
        return view('layouts.DelayTrain.index');
    }

    public function GetDelayData(Request $request){
        $stationsJson = json_encode($placeId);
        $baseUrl = 'http://192.168.1.15:8000/api/delay_prediction?';
 
        $response = Http::get($baseUrl, [
            'stations' => $stationsJson,
            'destination' => $destination,
            'time' => $this->thimeh,
        ]); 

        if($response->getStatusCode() == 500){
            return "no train found";
        }else{
            return   $response->body();
        }
    }

}
