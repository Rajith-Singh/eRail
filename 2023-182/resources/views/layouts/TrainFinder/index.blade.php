@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Find My Train') }}</div>

                <div class="card-body">
                  <form method="POST" action="{{ route('find-my-train.get-nearby-places') }}">
                    @csrf
                    <div class="row mb-0">                 
                      
                        <div class="col-md-4">                       
                          <select class="form-select" aria-label="Default select example" name="destination" id="destination">
                              <option value="">Select Station</option>
                              <option value="Colombo Fort">Colombo Fort</option>
                              <option value="Secretariat Halt">Secretariat Halt</option>
                              <option value="Kompannavidiya">Kompannavidiya</option>
                              <option value="Kollupitiya">Kollupitiya</option>
                              <option value="Bambalapitiya">Bambalapitiya</option>
                              <option value="Wellawatte">Wellawatte</option>
                              <option value="Dehiwala">Dehiwala</option>
                              <option value="Mount Lavinia">Mount Lavinia</option>
                              <option value="Rathmalana">Rathmalana</option>
                              <option value="Angulana">Angulana</option>
                              <option value="Lunawa">Lunawa</option>
                              <option value="Moratuwa">Moratuwa</option>
                              <option value="Koralawella">Koralawella</option>
                              <option value="Egoda Uyana">Egoda Uyana</option>
                              <option value="Panadura">Panadura</option>
                              <option value="Pinwatta">Pinwatta</option>
                              <option value="Wadduwa">Wadduwa</option>
                              <option value="Train Halt 01">Train Halt 01</option>
                              <option value="Kalutara North">Kalutara North</option>
                              <option value="Kalutara South">Kalutara South</option>
                              <option value="Katukurunda">Katukurunda</option>
                              <option value="Paiyagala  North">Paiyagala  North</option>
                              <option value="Paiyagala  South">Paiyagala  South</option>
                              <option value="Maggona">Maggona</option>
                              <option value="Beruwala">Beruwala</option>
                              <option value="Hettimulla">Hettimulla</option>
                              <option value="Aluthgama">Aluthgama</option>
                              <option value="Bentota">Bentota</option>
                              <option value="Induruwa">Induruwa</option>
                              <option value="Maha Induruwa">Maha Induruwa</option>
                              <option value="Kosgoda">Kosgoda</option>
                              <option value="Piyagama">Piyagama</option>
                              <option value="Ahungalla">Ahungalla</option>
                              <option value="Pathagangoda">Pathagangoda</option>
                              <option value="Balapitiya">Balapitiya</option>
                              <option value="Andadola">Andadola</option>
                              <option value="Kandegoda">Kandegoda</option>
                              <option value="Ambalangoda">Ambalangoda</option>
                              <option value="Madampagama">Madampagama</option>
                              <option value="Akurala">Akurala</option>
                              <option value="Kahawa">Kahawa</option>
                              <option value="Telwatta">Telwatte</option>
                              <option value="Sinigama">Sinigama</option>
                              <option value="Hikkaduwa">Hikkaduwa</option>
                              <option value="Thiranagama">Thiranagama</option>
                              <option value="Kumarakanda">Kumarakanda</option>
                              <option value="Dodanduwa">Dodanduwa</option>
                              <option value="Rathgama">Rathgama</option>
                              <option value="Boossa">Boossa</option>
                              <option value="Ginthota">Ginthota</option>
                              <option value="Piyadigama">Piyadigama</option>
                              <option value="Richmond Hill">Richmond Hill</option>
                              <option value="Galle">Galle</option>
                              <option value="Katugoda">Katugoda</option>
                              <option value="Unawatuna">Unawatuna</option>
                              <option value="Talpe">Talpe</option>
                              <option value="Habaraduwa">Habaraduwa</option>
                              <option value="Koggala">Koggala</option>
                              <option value="Kathaluwa">Kathaluwa</option>
                              <option value="Ahangama">Ahangama</option>
                              <option value="Midigama">Midigama</option>
                              <option value="Kubalgama">Kubalgama</option>
                              <option value="Weligama">Weligama</option>
                              <option value="Polwathumodara">Polwathumodara</option>
                              <option value="Mirissa">Mirissa</option>
                              <option value="Kamburugamuwa">Kamburugamuwa</option>
                              <option value="Walgama">Walgama</option>
                              <option value="Matara">Matara</option>
                              <option value="Piladuwa">Piladuwa</option>
                              <option value="Weherahena">Weherahena</option>
                              <option value="Kekandura">Kekandura</option>
                              <option value="Bambarenda">Bambarenda</option>
                              <option value="Wewurukannala">Wewurukannala</option>
                              <option value="Nakulugamuwa">Nakulugamuwa</option>
                              <option value="Beliatta">Beliatta</option>
                          </select>
                        </div>                      
                        
                        <div class="col-md-2">                           
                            <input type="text" class="form-control timepicker" id="timeh" name="timeh" placeholder="Enter Time">
                        </div>    
                        
                        <div class="col-md-2">                           
                          <input type="text" class="form-control timepicker" id="timem" name="timem" placeholder="Enter Time">
                       </div> 
                    
                        <div class="col-md-4 ">
                          <button type="submit" class="btn btn-xs btn-info pull-right">Find Nearest Train Station</button>
                      </div>
     
                  </div>              
                  </form>
                </div>
                </div>
            
              @if(!$data)
              
              @else
              
                @php
               $data = json_decode($data,true);
              $destination=$data['destination_data'];
              $arraiv=$data['arrival_data'];
        
               @endphp
            
               @if($destination == 'null')
                 <p class="text-center">No Train To Found</p>    
               @else
               <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Station Name</th>
                    <th scope="col">Place ID</th>
                    <th scope="col">Train Name</th>
                    <th scope="col">Arrival</th>
                    <th scope="col">dEPATUER</th>
                  </tr>
                </thead>
                <tbody>               
                   
                    @foreach ($arraiv as $items)
                  <tr >     
                   <td>{{$items['Station Name (Code)']}}</td>
                   <td>{{$items['Place ID']}}</td>
                    <td>{{$items['Train Number or Train Name']}}</td>                                      
                    <td>{{$items['Arrival Time']}}</td>
                    <td>{{$items['Departure Time']}}</td>
                  </tr> 
                  @endforeach  
                               
                </tbody>
              </table>
               @endif
                                 
              
                                 
                             
                                   @endif
                  
            </div>
        </div>
    </div>
</div>
@endsection

    
