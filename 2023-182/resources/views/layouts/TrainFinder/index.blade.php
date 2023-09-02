
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
                              <option value="Maradana">Maradana</option>
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
                              <option value="Ragama">Ragama</option>
                              <option value="Gampaha">Gampaha</option>
                              <option value="Veyangoda">Veyangoda</option>
                              <option value="Mirigama">Mirigama</option>
                              <option value="Polgahawela">Polgahawela</option>
                              <option value="Rambukkana">Rambukkana</option>
                              <option value="Polwathumodara">Polwathumodara</option>
                              <option value="Kadigamuwa">Kadigamuwa</option>
                              <option value="Ihalakotte">Ihalakotte</option>
                              <option value="Balana">Balana</option>
                              <option value="Kadugannawa">Kadugannawa</option>
                              <option value="Pilimatalawa">Pilimatalawa</option>
                              <option value="Kandy">Kandy</option>
                              <option value="Peradeniya">Peradeniya</option>
                              <option value="Geli Oya">Geli Oya</option>
                              <option value="Gampola">Gampola</option>
                              <option value="Tembiligala">Tembiligala</option>
                              <option value="Ulapane">Ulapane</option>
  			                      <option value="Nawalapitiya">Nawalapitiya</option>
                              <option value="Inguruoya">Inguruoya</option>
                              <option value="Galaboda">Galaboda</option>
                              <option value="Watawala">Watawala</option>
                              <option value="Ihalawatawala">Ihalawatawala</option>
                              <option value="Rozella">Rozella</option>
                              <option value="Hatton">Hatton</option>
                              <option value="Kotagala">Kotagala</option>
                              <option value="Talawakele">Talawakele</option>
                              <option value="Watagoda">Watagoda</option>
                              <option value="Great Western">Great Western</option>
                              <option value="Radella">Radella</option>
                              <option value="Nanuoya">Nanuoya</option>
                              <option value="Parakumpura">Parakumpura</option>
                              <option value="Ambewela">Ambewela</option>
                              <option value="Pattipola">Pattipola</option>
                              <option value="Ohiya">Ohiya</option>
                              <option value="Idalgashinna">Idalgashinna</option>
                              <option value="Haputale">Haputale</option>
                              <option value="Diyatalawa">Diyatalawa</option>
                              <option value="Bandarawela">Bandarawela</option>
                              <option value="Kinigama">Kinigama</option>
                              <option value="Heel Oya">Heel Oya</option>
                              <option value="Kital Ella">Kital Ella</option>
                              <option value="Ella">Ella</option>
                              <option value="Demodara">Demodara</option>
                              <option value="Uduwara">Uduwara</option>
                              <option value="Hali Ela">Hali Ela</option>
                              <option value="Badulla">Badulla</option>
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
              $ml_model=$data['ml_data'];
              $transit_arrival=$data['transit_arrival'];
              $transit_destination_1=$data['transit_destination_1'];
              $trasit_final_start=$data['trasit_final_start'];
              $trasit_final_destination=$data['trasit_final_destination'];  
              //  dd($trasit_final_destination);     
        
               @endphp
            
               @if($destination == 'null' && $transit_arrival != 'null' &&$transit_destination_1 != 'null' && $trasit_final_destination != 'null')
                 <p class="text-center">Transati avaiable</p>    
               @else

               <table class="table">
                <tr>
                  <td>Arrive Data</td>
                  <td>Destination Data</td>
                </tr>
              
                <tr>
                @foreach ($arraiv as $arrival)

                  <td>
                    <table>
                      <tr>
                        <td> Station : {{$arrival['Station Name (Code)']}}</td>
                      </tr>
                      <tr>
                        <td> Arrival Time : {{$arrival['Arrival Time']}}</td>                  
                      </tr>
                      <tr>           
                        <td> Departure Time : {{$arrival['Departure Time']}}</td>                   
                      </tr>
                      <tr>          
                        <td> Train Number or Train Name : {{$arrival['Train Number or Train Name']}}</td>
                      </tr>
                     </table>
                     </td>
                    @endforeach  

                    @foreach ($destination as $destinations)

                  <td>
                    <!-- nested row -->

                    <table>
                     <tr>
                      <td> Station : {{$destinations['Station Name (Code)']}}</td>
                     </tr>
                     <tr>
                       <td> Arrival Time : {{$destinations['Arrival Time']}}</td>  

                     </tr>
                    </table>
              
                  </td>
                  @endforeach  

                </tr>
               

               </table>

              @endif

              @if($transit_arrival == 'null' && $transit_destination_1 == 'null' && $trasit_final_destination == 'null')
                 <p class="text-center">Direct Trains Availae</p>    
              @else
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Train Number or Train Name</th>
                    <th scope="col">Station Name</th>
                    <th scope="col">Arrival Time</th>
                    <th scope="col">Departure Time</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($transit_arrival as $data)
                  <tr>                     
                    <td>{{$data['Train Number or Train Name']}}</td>
                    <td>{{$data['Station Name (Code)']}}</td>
                    @php                    
                    $datetimeString1 = $data['Arrival Time'];                   
                    @endphp
                    <td>{{ \Carbon\Carbon::parse($datetimeString1)->format('h:i A') }}</td>
                    <td>{{$data['Departure Time']}}</td>
                  </tr>  
                  @endforeach                 
                </tbody>
              </table>

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Train Number or Train Name</th>
                    <th scope="col">Station Name</th>
                    <th scope="col">Arrival Time</th>
                    <th scope="col">Departure Time</th>
                  </tr>
                </thead>
                <tbody>                
                  <tr>                          
                    <td>{{$transit_destination_1['Train Number or Train Name']}}</td>
                    <td>{{$transit_destination_1['Station Name (Code)']}}</td>

                    @php                    
                    $datetimeString = $transit_destination_1['Arrival Time'];                   
                    @endphp

                    <td>{{ \Carbon\Carbon::parse($datetimeString)->format('h:i A') }}</td>
                    <td>{{$transit_destination_1['Departure Time']}}</td>
                  </tr>                                  
                </tbody>
              </table>

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Train Number or Train Name</th>
                    <th scope="col">Station Name</th>
                    <th scope="col">Arrival Time</th>
                    <th scope="col">Departure Time</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($trasit_final_start as $data)
                  <tr>                     
                    <td>{{$data['Train Number or Train Name']}}</td>
                    <td>{{$data['Station Name (Code)']}}</td>
                    <td>{{$data['Arrival Time']}}</td>
                    <td>{{$data['Departure Time']}}</td>
                  </tr>  
                  @endforeach                 
                </tbody>
              </table>

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Train Number or Train Name</th>
                    <th scope="col">Station Name</th>
                    <th scope="col">Arrival Time</th>
                    <th scope="col">Departure Time</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($trasit_final_destination as $data)
                  <tr>                     
                    <td>{{$data['Train Number or Train Name']}}</td>
                    <td>{{$data['Station Name (Code)']}}</td>
                    <td>{{$data['Arrival Time']}}</td>
                    <td>{{$data['Departure Time']}}</td>
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

    
