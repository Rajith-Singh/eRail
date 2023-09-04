<?php

namespace App\Http\Controllers;
use PDF;
use Illuminate\Http\Request;
use App\Models\CreateTrainModel;
use App\Models\TrainOparation;


class YardManagement extends Controller
{
    public function index(){
        $data=CreateTrainModel::with('trainOparation')->get()->all();
        return view('layouts.YardManagement.index',['data'=>$data]);
    }

    public function CreateTrain(Request $request){
        try {
            $val=  $request->validate([
                'train_type' => 'required',
                'line_no' => 'required',
                'compartment_no' => 'required',
                'from' => 'required',
                'to' => 'required',           
            ]);
        }catch (\Throwable $th) {  
             return back()->with('error', $th->getMessage())->withErrors($th->validator);
        }     

        if($request->one_eng == null && $request->train_type == "Night Mali"){      

                $new_eng = array_filter($request->new_eng, function ($value) {
                    return $value !== null;
                });
                
                $position = array_filter($request->position, function ($value) {
                    return $value !== null;
                });
                
                if (empty($new_eng) && empty($position)) {
                    return back()->with('error','Night main need data');
                }

                $mergedArray = [];
                $positionCount = array_count_values($position);
                $letters = range('A', 'Z');
                $letterIndex = array();
        
                foreach ($position as $index => $positionValue) {
                    if (!isset($letterIndex[$positionValue])) {
                        $letterIndex[$positionValue] = 0;
                    }
        
                    if ($positionCount[$positionValue] > 1) {
                        $mergedArray[] = $new_eng[$index] . $positionValue . $letters[$letterIndex[$positionValue]];
                        $letterIndex[$positionValue]++;
                    } else {
                        $mergedArray[] = $new_eng[$index]  . $positionValue;
                    }
                }      
                $finalString = implode('-', $mergedArray);
        }else if($request->one_eng == null && $request->train_type == "Power Set"){
            return back()->with('error', "'You Select Power Set")->withErrors("Power Set enter engine number");
        }else{
            $finalString = $request->one_eng;
        }            
        
        $eng_number = $finalString;
        $line_no = $request->line_no;
        $compartment_no = $request->compartment_no;

        $data= CreateTrainModel::create([
            'eng_no'=>$eng_number,
            'train_no'=>$this->GenTrainNo($eng_number,$line_no,$compartment_no),
            'line'=>$request->line_no,
            'from'=>$request->from,
            'to'=>$request->to,
        ]);  
        
        return back()->with('success','Train Created');
    }

    public function GenTrainNo($eng_number,$line_no,$compartment_no){
         return $line_no. "-".$compartment_no."-" .$eng_number;
    }

    public function TrainOperation(Request $request){
    //dd($request);
        try {
            $val=  $request->validate([               
                'new_eng' => 'required_if:operation_type,RMF,RMB,ADDF,ADDB',
                'station' => 'required',             
              
            ]);
        } catch (\Throwable $th) {
            //dd($th);
           return back()->with('Operation_error', $th->getMessage())->withErrors($th->validator);
        }

        $traindata=CreateTrainModel::find($request->index);            
        $operation = $request->operation_type;
        $new_eng = $request->new_eng;
        $old_eng =$request->old_eng;
       // dd($traindata->id);

       if($traindata->final_code == null){
   
        $data= TrainOparation::create([
            'index'=>$request->index,
            'train_id'=>$this->ChangeCode($operation,$new_eng,$old_eng),
            'change_point'=>$request->station,
        ]);  

        if($traindata->to == $request->station ){
            $oparationdata =TrainOparation::where('index',$traindata->id)->pluck('train_id')->toArray();

            $finalString = implode('-', $oparationdata);
           // dd($finalString);
            if($finalString == ""){
                $completeCode= $traindata->train_no;
            }else{
                $completeCode= $traindata->train_no .'-'.$finalString;

            }
         

            $traindata->update([
                'final_code'=>rtrim($completeCode,'-'),
            ]);   
        }               
        
        return redirect()->back();
       }else{
        return back()->with('Operation_error', "Cannot process")->withErrors("cand enter data,This train is reached to the destionationh");

       }

       
    }

    public function ChangeCode($operation,$new_eng,$old_eng){
      
        if($operation == "RMF" || $operation == "RMB" || $operation == "ADDF" ||$operation == "ADDB" && $new_eng != null){

            return $operation."-".$new_eng;
        }else{
           // return $operation."-".$new_eng;
           return "";
        }      

    }


    public function GenPdf(){
       ;
        $data=CreateTrainModel::with('trainOparation')->get()->all();
        // share data to view
    
        $pdf = PDF::loadView('layouts.YardManagement.pdf',['data'=>$data] );
        return $pdf->stream('Cashier_Summary.pdf');

    }
}
