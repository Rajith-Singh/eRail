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
        // dd($request);

        $validator = Validator::make($request->all(), [
            'train_no' => 'required|nullable',       
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 422);
        }else{ 

            $train_no = $request->train_no;
            $baseUrl = 'http://192.168.10.10:8000/api/delay_prediction?';
     
            $response = Http::get($baseUrl, [
                'train_no' => $train_no,            
            ]); 
    
            if($response->getStatusCode() == 500){
                return "no train found";
            }else{
                return   $response->body();
            }

        }    
       
    }

}
