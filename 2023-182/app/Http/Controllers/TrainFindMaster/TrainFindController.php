<?php

namespace App\Http\Controllers\TrainFindMaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Validator;

class TrainFindController extends Controller
{
    //
    private $thimeh;

    public function index(){
        $position= $this->Get_user_current_location();
        //dd($position);        
        return view('layouts.TrainFinder.index')->with(['data'=>'','position'=>$position]);
    }        

    public function GetNearByPlaces(Request $request){    


        $validator = Validator::make($request->all(), [
            'destination' => 'required|nullable',
            'current_position'=>'required|nullable',
            'timeh' => 'required|nullable',  
            'timem' => 'required|nullable',
        ]);

        if($validator->fails()){
            // return back()->with('errors', $validator->messages());
            return response()->json(['errors' => $validator->errors()], 422);
        }else{           
       
        $this->thimeh=$request->timeh.":".$request->timem.":00";         

        $baseUrl = 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?';
        $location =  '7.027893808136716, 79.91585404345092';//user location
        $radius = '1500';
        $type = 'train_station';
        $apiKey = 'AIzaSyB9xkCZ1dvL1ho6NNLdquof56LM8Jh9wlc';

        $response = Http::get($baseUrl, [
            'location' => $location,
            'radius' => $radius,
            'type' => $type,
            'key' => $apiKey,
        ]);
        
        return $this->GetDistanceFromLocations($response['results'],$location,$request->destination);
    
        
        //dd($data);

        //return redirect()->route('find-my-train.index',['data'=>$data]);
       // return redirect()->back()->with(['data'=>$data]);

        }    
      
    }

    public function GetDistanceFromLocations($place,$user_location,$destination){    
        $my_place= array();
        $place_id =array();

        foreach ($place as $value) {
            $my_place [] = $value['geometry']['location']['lat']. ",". $value['geometry']['location']['lng'];        
            $place_id [] = $value['place_id'];
        }    

       return $this->destination($my_place,$place_id,$user_location,$destination);     
    }

    public function destination($destinations,$place_id,$user_location,$destination){
        $baseUrl = 'https://maps.googleapis.com/maps/api/distancematrix/json?';
        $origins = $user_location;//user location long lat
        $destinations = $destinations;//nearest train station long lat
        $apiKey = 'AIzaSyB9xkCZ1dvL1ho6NNLdquof56LM8Jh9wlc';

        $response = Http::get($baseUrl, [
            'origins' => $origins,
            'destinations' => implode('|', $destinations),
            'key' => $apiKey,
        ]);    

     return  $this->GetNearestTrainStationOrder($response,$place_id,$destination);
    }

    public function GetNearestTrainStationOrder($stations,$place_id,$destination){
      
        $nearby_place_data = array();
        $nearby_place_sort= array();
     
        $elements = $stations['rows'][0]['elements'];
        $station_name = $stations['destination_addresses'] ;
        foreach ($elements as $index => $element) {
            $duration = $element['duration']['value'];
            $distance_text = $element['distance']['text'];
            $duration_text = $element['duration']['text'];
            $placeId = $place_id[$index];
            $s_name =$station_name[$index];
            $nearby_place_data[$index] = [
                'index'=> $index,
                'Station_name' => $s_name,
                'placeID' => $placeId,
                'duration'=>$duration,
                'duration_text'=>$duration_text,
                'distance_text' => $distance_text
            ];
        }   

        //sort ascending  order by using duration
        usort($nearby_place_data, function($a, $b) {
            return $a['duration'] - $b['duration'];
        });    
        
       return $this->CallDataSetApi($nearby_place_data,$destination);
      //return $data;
       //return $data['arrival_data'];
    
 
      
        //return view('layouts.TrainFinder.index',['data'=>$data]);

    }

    public function Get_user_current_location() :array{
        if ($position = Location::get()) {
            // Successfully retrieved position.
            //dd($position-> cityName );
            return ['lat'=>$position->latitude ,'lon'=>$position->longitude ];
        } else {
            dd("error");
            // Failed retrieving position.
        }
    }

    public function CallDataSetApi($placeId,$destination){
       // dd($time);
     
        $stationsJson = json_encode($placeId);
        $baseUrl = 'http://192.168.10.10:8000/api/?';
 
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
