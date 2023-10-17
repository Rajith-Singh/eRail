<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Etablet_Request;
use DB;
use App\Events\etabletHandling;
use App\Models\etablet;
use App\Models\engine_tablet;
use Carbon\Carbon;
use GuzzleHttp\Client;
use DateTime;


class eTabletController extends Controller
{
    public function storeTablet(Request $request) {

        $tablet = new Etablet_Request;

        $tablet->req_station=$request->req;
        $tablet->des_station=$request->des;
        $tablet->status=$request->status;

        $tablet->save();

        // Call the API
        $apiUrl = 'http://127.0.0.1:5000/tts?text=Hii. Welcome to the ' . urlencode($request->req) . ' railway station. Requested the etablet from ' . urlencode($request->des) . ' railway station.';
        
        $client = new Client();
        $response = $client->get($apiUrl);

        return back()->with('msg', 'Request sent successfully.');
        //dd($request->all());
    }

    public function getRequest($station) {
        $tablet = DB::table('etablet__requests')
            ->select('id', 'req_station', 'des_station', 'status', 'created_at')
            ->where('des_station', '=', $station)
            ->get();

            $des_station = DB::table('etablet__requests')
            ->select('des_station')
            ->where('des_station', '=', $station)
            ->get();

            $req_station = DB::table('etablet__requests')
            ->select('req_station')
            ->where('des_station', '=', $station)
            ->get();

        // Call the API
        // $apiUrl = 'http://127.0.0.1:5000/tts?text=Hii. Welcome to the ' . urlencode($req_station) . ' railway station. ' . urlencode($req_station) . ' railway station has requested e-tablet from ' . urlencode($des_station) . ' railway station.';
        
        // $client = new Client();
        // $response = $client->get($apiUrl);
    
        $track = DB::table('etablets')
            ->select('id', 'req_station', 'des_station', 'train', 'created_at')
            ->where('des_station', '=', $station)
            ->get();
    
        return view('dashboard.stationmaster.etablet-approval', compact('tablet', 'track'));
    }
    

    // public function getRequest($station) {
    //     $tablet = DB::table('etablet__requests')
    //         ->join('etablets', function ($join) {
    //             $join->on('etablet__requests.req_station', '=', 'etablets.req_station')
    //                 ->orWhere('etablet__requests.des_station', '=', 'etablets.des_station');
    //         })
    //         ->select('etablets.id', 'etablet__requests.id', 'etablet__requests.req_station', 'etablet__requests.des_station', 'etablet__requests.status', 'etablet__requests.created_at')
    //         ->where('etablet__requests.req_station', '=', $station)
    //         ->get();
    
    //     return view('dashboard.stationmaster.etablet-approval')->with('data', $tablet);
    // }
    


    public function updateTablet($id, $des_station)
    {
        // Retrieve the $etablet data from your database based on the $id
        $etablet = DB::table('etablet__requests')->where('id', $id)->first();

        // Call the API
        $apiUrl = 'http://127.0.0.1:5000/tts?text=The e-tablet requested from was approved. You are now temporarily blocked.';

        $client = new Client();
        $response = $client->get($apiUrl);
    
        // Check if $etablet is found
        if (!$etablet) {
            return back()->with('error', 'Tablet not found.');
        }
    
        // Update the status
        $affectedRows = DB::table('etablet__requests')->where('id', $id)->update([
            'status' => '1',
        ]);
    
        if ($affectedRows > 0) {
            // API URL
            $apiUrl = 'https://api.thingspeak.com/update?api_key=QG5T4N6JNQ71MU64&field1=111';
    
            // Call the API
            $response = Http::get($apiUrl);
    
            if ($response->successful()) {
                return back()->with('message', 'The Tablet was accepted successfully.');
            } else {
                // If the API request fails, rollback the status update
                DB::table('etablet__requests')->where('id', $id)->update([
                    'status' => '0',
                ]);
                return back()->with('error', 'Failed to call the API. The Tablet status was rolled back.');
            }
        } else {
            return back()->with('error', 'Failed to update the Tablet.');
        }

        
    }
    
    
    public function selectTrackAPIMain(){
        $apiUrl = 'https://api.thingspeak.com/update?api_key=QG5T4N6JNQ71MU64&field1=112';

    
        // Call the API using Guzzle
        $response = file_get_contents($apiUrl);
    }
    
    public function selectTrackAPILoop(){
            // API URL
            $apiUrl = 'https://api.thingspeak.com/update?api_key=QG5T4N6JNQ71MU64&field1=113';
    
        // Call the API using Guzzle
        $response = file_get_contents($apiUrl);
    }
    

    public function selectTrack(Request $request) {
        $id = $request->input('id');
        $selectedTrack = $request->input('track');
    
        // Update the 'track' field for the found record
        $tablet = DB::table('etablets')
            ->where(['id' => $id])
            ->update([
                'track' => $selectedTrack,
            ]);
            
            
        if ($selectedTrack == 'Main Track') {
            $this->selectTrackAPIMain();
        } else if ($selectedTrack == 'Loop Track') {
            $this->selectTrackAPILoop();
        } else {
            // Handle invalid track value
            return redirect()->back()->with('error', 'Invalid track value.');
        }

        $station = $request->input('station');

        if ($station) {
            // Logic for when 'station' is present in the request
            event(new etabletHandling($station));
        } else {
            // Logic for when 'station' is not present in the request
        }
    
        // if ($selectedTrack == 'Main Track') {
        //     // API URL
        //     $apiUrl = 'https://api.thingspeak.com/update?api_key=RNODHFZ2AVATTPX4&field1=112';
        // } else if ($selectedTrack == 'Loop Track') {
        //     // API URL
        //     $apiUrl = 'https://api.thingspeak.com/update?api_key=RNODHFZ2AVATTPX4&field1=113';
        // } else {
        //     // Handle invalid track value
        //     return redirect()->back()->with('error', 'Invalid track value.');
        // }
    
        // // Call the API using Guzzle
        // $response = file_get_contents($apiUrl);
        
        // $this->selectTrackAPI();        
        return back()->with('message', 'The track was selected successfully.');
    }

    
    
    
    public function viewStatus($station) {
        $tablet = DB::table('etablet__requests')
            ->select('id', 'req_station', 'des_station', 'status', 'created_at')
            ->where('des_station', '=', $station)
            ->get();
    
        return view('dashboard.stationmaster.etablet-request')->with('data', $tablet);
    }

    public function releaseTablet(){

    }

    public function showApprovalPage($req_station)
    {
        // Retrieve the tablet request data by ID
        $etablet = DB::table('etablet__requests')->where('req_station', $req_station)->first();

        // Check if the tablet request exists
        if (!$etablet) {
            return back()->with('error', 'Tablet not found.');
        }

        // Pass the tablet data to the view
        return view('dashboard.stationmaster.etablet-request', compact('etablet'));
    }

public function generateTablet(Request $request){
    // Generate a random unique hash
    $randomHash = hash('sha256', uniqid(mt_rand(), true));

    // Create a new tablet object
    $tablet = new etablet;

    // Assign the random hash to the etablet column
    $tablet->etablet = $randomHash;
    $tablet->req_station = $request->t_req;
    $tablet->des_station = $request->t_des;
    $tablet->train = $request->train;

    // Save the tablet object to the database
    $tablet->save();

    // Call the API
    $apiUrl = 'http://127.0.0.1:5000/tts?text=An e-tablet was generated. This is only valid between '. urlencode($request->t_req) . 'and'. urlencode($request->t_des) .'stations.';

    $client = new Client();
    $response = $client->get($apiUrl);

    // Convert the arrival time to a Unix timestamp in the "Asia/Colombo" timezone
    $arrivalTimestamp = Carbon::parse($request->arrival_time, 'Asia/Colombo')->timestamp;
    $arrivalTimeString = Carbon::createFromTimestamp($arrivalTimestamp, 'Asia/Colombo')->toDateTimeString();
    

    // Prepare the data to send to the Google Sheet API
    $data = [
        'id' => $request->id,
        'etablet' => $randomHash,
        'req_station' => $request->t_req,
        'des_station' => $request->t_des,
        'train' => $request->train,
        'track' => $request->track,
        'arrival_time' => $arrivalTimeString, // Use the timestamp here
    ];

    // Make a POST request to the Google Sheet API endpoint
    $response = Http::post('https://sheetdb.io/api/v1/f1ynqshw3qi1n', $data);

    // Check if the request was successful
    if ($response->successful()) {
        return back()->with('msg', 'eTablet sent successfully.');
    } else {
        return back()->with('error', 'Failed to send data to Google Sheet.');
    }
}


public function predict(Request $request)
{
    // Extract the form data
    $train = $request->input('train');
    $arrivalTime = $request->input('arrival');
    $crossingTime = $request->input('crossing_time'); // Update the input name
    $code = $request->input('code');

    // Perform time-to-float conversion for arrival and crossing_time
    $arrivalFloat = $this->timeToFloat($arrivalTime);
    $crossingFloat = $this->timeToFloat($crossingTime);

    // Define the API URLs
    $apiUrl = 'http://127.0.0.1:5000/predict/arrival';
    $apiUrl2 = 'http://127.0.0.1:5000/predict/departure';
    $apiUrl3 = 'http://127.0.0.1:5000/predict/crossing_train';

    // Create an array with the data to send to the Flask API
    $data = [
        'train' => $train,
        'latest_crossing_train_arrival' => $arrivalFloat,
        'latest_crossing_time' => $crossingFloat,
        'latest_crossing_station' => $code,
    ];

    // Send POST requests to the Flask APIs using Laravel's HTTP client
    $response = Http::post($apiUrl, $data);
    $response2 = Http::post($apiUrl2, $data);
    $response3 = Http::post($apiUrl3, $data);

    // Initialize prediction variables
    $prediction = [];
    $prediction2 = [];
    $prediction3 = [];

    // Check if the request for API 1 was successful
    if ($response->successful()) {
        // Parse the JSON response from the Flask API
        $prediction = $response->json();

        // Convert the float prediction to a time string
        $prediction['arrival'] = $this->floatToTime($prediction['arrival']);
    }

    // Check if the request for API 2 was successful
    if ($response2->successful()) {
        // Parse the JSON response from the Flask API
        $prediction2 = $response2->json();

        // Convert the float prediction to a time string
        $prediction2['departure'] = $this->floatToTime($prediction2['departure']);
    }

    // Check if the request for API 3 was successful
    if ($response3->successful()) {
        // Parse the JSON response from the Flask API
        $prediction3 = $response3->json();

        // Cast the 'crossing_train' prediction to an integer
        $prediction3['crossing_train'] = (int)$prediction3['crossing_train'];
    }

    // Return the predictions to your view
    return view('dashboard.stationmaster.arrival-departure-monitoring', [
        'prediction' => $prediction,
        'prediction2' => $prediction2,
        'prediction3' => $prediction3,
    ]);
}

    // Function to convert time string to float
    private function timeToFloat($timeString)
    {
        list($hours, $minutes) = explode(':', $timeString);
        return (float)$hours + ($minutes / 60.0);
    }

    private function floatToTime($floatValue)
    {
        // Separate the hours and minutes
        $hours = floor($floatValue);
        $minutes = round(($floatValue - $hours) * 60);

        // Format the time string
        return sprintf('%02d:%02d', $hours, $minutes);
    }

}


    
