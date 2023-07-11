<?php

namespace App\Http\Controllers\TrainFindMaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Stevebauman\Location\Facades\Location;
class TrainFindController extends Controller
{
    //

    public function index(){
        return view('layouts.TrainFinder.index',['data'=>'']);
    }

    public function GetNearByPlaces(){      
        
        //$position= $this->Get_user_current_location();       

        $baseUrl = 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?';
        $location =  '6.8732403, 79.8799101';
        $radius = '1500';
        $type = 'train_station';
        $apiKey = 'AIzaSyB9xkCZ1dvL1ho6NNLdquof56LM8Jh9wlc';

        $response = Http::get($baseUrl, [
            'location' => $location,
            'radius' => $radius,
            'type' => $type,
            'key' => $apiKey,
        ]);

        //response data array
       return $this->GetDistanceFromLocations($response['results'],$location);
    }

    public function GetDistanceFromLocations($place,$user_location){    
        $my_place= array();
        $place_id =array();

        foreach ($place as $value) {
            $my_place [] = $value['geometry']['location']['lat']. ",". $value['geometry']['location']['lng'];        
            $place_id [] = $value['place_id'];
        }    

       return $this->destination($my_place,$place_id,$user_location);     
    }

    public function destination($destinations,$place_id,$user_location){
        $baseUrl = 'https://maps.googleapis.com/maps/api/distancematrix/json?';
        $origins = $user_location;
        $destinations = $destinations;
        $apiKey = 'AIzaSyB9xkCZ1dvL1ho6NNLdquof56LM8Jh9wlc';

        $response = Http::get($baseUrl, [
            'origins' => $origins,
            'destinations' => implode('|', $destinations),
            'key' => $apiKey,
        ]);    

      return $this->GetNearestTrainStationOrder($response,$place_id);
    }

    public function GetNearestTrainStationOrder($stations,$place_id){
      
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

 

      
        return view('layouts.TrainFinder.index',['data'=>$nearby_place_data]);

    }

    public function Get_user_current_location() :array{
        if ($position = Location::get()) {
            // Successfully retrieved position.
            dd($position-> cityName );
            return ['lat'=>$position->latitude ,'lon'=>$position->longitude ];
        } else {
            dd("error");
            // Failed retrieving position.
        }
    }
    
}
