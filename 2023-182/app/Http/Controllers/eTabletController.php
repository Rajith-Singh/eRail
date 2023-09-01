<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Etablet_Request;
use DB;
use App\Events\etabletHandling;
use App\Models\etablet;

class eTabletController extends Controller
{
    public function storeTablet(Request $request) {

        $tablet = new Etablet_Request;

        $tablet->req_station=$request->req;
        $tablet->des_station=$request->des;
        $tablet->status=$request->status;
        $tablet->train=$request->train;
        $tablet->save();

        return back()->with('msg', 'Request sent successfully.');
        //dd($request->all());
    }

    public function getRequest($station) {
        $tablet = DB::table('etablet__requests')
            ->select('id', 'req_station', 'des_station', 'status', 'created_at')
            ->where('des_station', '=', $station)
            ->get();
    
        return view('dashboard.stationmaster.etablet-approval')->with('data', $tablet);
    }


    public function updateTablet($id, $des_station)
    {
        // Retrieve the $etablet data from your database based on the $id
        $etablet = DB::table('etablet__requests')->where('id', $id)->first();
    
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
        $tablet = DB::table('etablet__requests')
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

        $tablet = new etablet;
        $tablet_cpy = new engine_tablet;

        // Assign the random hash to the etablet column
        $tablet->etablet = $randomHash;
        $tablet->req_station=$request->t_req;
        $tablet->des_station=$request->t_des;
        $tablet->save();





        // dd($request->all());
        return back()->with('msg', 'eTablet sent successfully.');
    }

    
}