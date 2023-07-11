@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Find My Train') }}</div>

                <div class="card-body">

                  <form>
                    <div class="row mb-0">                 
                      
                      <div class="col-md-4"> 
                        <select class="form-select" aria-label="Default select example">
                          <option selected>Select Station</option>
                          <option value="plaeid">Gall</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                      </div>

                      <div class="col-md-4"> 
                        <div class="form-group">
                          <label for="datepicker">Date:</label>
                          <input type="text" class="form-control datepicker" id="datepicker" name="datepicker">
                      </div>
                      
                      <div class="form-group">
                          <label for="timepicker">Time:</label>
                          <input type="text" class="form-control timepicker" id="timepicker" name="timepicker">
                      </div>
                      
                      </div>


                      <div class="col-md-4 ">
                        <a href="{{ route('find-my-train.get-nearby-places') }}" class="btn btn-xs btn-info pull-right">Find Nearest Train Station</a>
                    </div>

                  </div>

                  </form>
                    
                </div>
            
              

                  @if(!$data)
                
           
                
                  @else              
                  <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Station Name</th>
                          <th scope="col">Place ID</th>
                          <th scope="col">Duration</th>
                          <th scope="col">Distance</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($data as $item)
                        <tr >                      
                          <td>{{$item['Station_name']}}</td>
                          <td>{{$item['placeID']}}</td>
                          <td>{{$item['duration_text']}}</td>
                          <td>{{$item['distance_text']}}</td>
                        </tr> 
                        @endforeach                
                      </tbody>
                    </table>
              
                
                  @endif

                  
            </div>
        </div>
    </div>
</div>
@endsection


