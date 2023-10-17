<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Section;
use DB;
use App\Events\etabletHandling;
use App\Models\etablet;
use App\Models\engine_tablet;
use Carbon\Carbon;
use GuzzleHttp\Client;
use DateTime;

class SectionController extends Controller
{
    public function storeSection(Request $request) {

        $section = new Section;

        $section->train_type=$request->t_type;
        $section->section=$request->section;
        $section->duration=$request->time;
        $section->note=$request->note;

        $section->save();

        return back()->with('msg', 'The section has been successfully stored.');
    }
}
