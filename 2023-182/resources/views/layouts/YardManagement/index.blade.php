@extends('layouts.app')

@section('content')

<div>
  @if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('error'))
<script type="text/javascript">
   $(document).ready(function() {
    // Show the modal
    $('#exampleModalLong').modal('show');
    
    // Get the success message from the session
   // const successMessage = "{{ $message }}";
    
    // Construct an HTML paragraph for the success message
    //const successHtml = '<p>' + successMessage + '</p>';
    
    // Append the success message to the error paragraph
    //$('#errorParagraph').append(successHtml);
    
    @if ($errors->any())
      // Get the list of error messages
      const errorMessages = @json($errors->all());
      
      // Construct an HTML list of error messages
      let errorList = '<ul class="text-danger">';
      errorMessages.forEach(message => {
        errorList += '<li>' + message + '</li>';
      });
      errorList += '</ul>';
      
      // Append the error list to the error paragraph
      $('#errorParagraph').append(errorList);
    @endif
  });
</script>
@endif


@if ($message = Session::get('Operation_error'))
<script type="text/javascript">
   $(document).ready(function() {
    // Show the modal
    $('#myModal').modal('show');
    
    // Get the success message from the session
   // const successMessage = "{{ $message }}";
    
    // Construct an HTML paragraph for the success message
    //const successHtml = '<p>' + successMessage + '</p>';
    
    // Append the success message to the error paragraph
    //$('#errorParagraph').append(successHtml);
    
    @if ($errors->any())
      // Get the list of error messages
      const errorMessages = @json($errors->all());
      
      // Construct an HTML list of error messages
      let errorList = '<ul class="text-danger">';
      errorMessages.forEach(message => {
        errorList += '<li>' + message + '</li>';
      });
      errorList += '</ul>';
      
      // Append the error list to the error paragraph
      $('#processerrorParagraph').append(errorList);
    @endif
  });
</script>
@endif


@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif

</div>
<div class="container">

    <div class="row justify-content-center"> 

      <div class="col-md-6"> 
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
            Create Train
        </button>
      </div>

      @if ($data)
      <div class="col-md-6">      
        <a href="{{ route('yard-management.report') }}" target="_blank">
          <button type="button" class="btn btn-warning">  Genarate PDF</button>
        </a>
      </div>
          @else
        
      @endif

      
    
      <div class="col-md-12">         
        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create Train</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeCreateModel()">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <p id="errorParagraph"></p>
                    <form method="POST" action="{{ route('create-train') }}" 
                    id="createFrom" novalidate role="form">
                    
                      @csrf
                        <div class="form-group">
                          <label for="train_type">Train Type</label>
                          <select class="form-control" id="train_type" name="train_type">
                            <option value="">Select Train Type</option>
                            <option value="Night Mali">Night Mali</option>
                            <option value="Power Set">Power Set</option>
                            <option value="Odyssey">Odyssey</option>
                          </select>
                        </div>

                        <div class="form-group" id="ShowSingaleTrain" style="display: none;">
                          <label for="one_eng">Engine Nunmber</label>
                          <select class="form-control" id="one_eng" name="one_eng">
                            <option value="">Select Engine Nunmber</option>
                            <option value="S5">S5</option>
                            <option value="S14">S14</option>
                            <option value="S12">S12</option>
                            <option value="M4">M4</option>
                            <option value="M6">M6</option>
                          </select>
                        </div>

                        <div class="form-group" id="ShowMultipleTrain" style="display: none;">
                              <div class="control-group" id="fields">
                                  <label class="control-label" for="field1">Engine Nunmber</label>
                                  <div class="controls"> 
                                      <div role="form" autocomplete="off">
                                          <div class="entry input-group col-xs-3">
                                            <select class="form-control" id="new_eng" name="new_eng[]">
                                              <option value="">Select Engine Nunmber</option>
                                              <option value="S5">S5</option>
                                              <option value="S14">S14</option>
                                              <option value="S12">S12</option>
                                              <option value="M4">M4</option>
                                              <option value="M6">M6</option>
                                            </select>

                                            <select class="form-control" id="position" name="position[]">
                                              <option value="">Select Engine Nunmber</option>
                                              <option value="Front">Front</option>
                                              <option value="Back">Back</option>                            
                                            </select>
                                              
                                            <span class="input-group-btn">
                                                  <button class="btn btn-success btn-add" type="button">
                                                      <span class="glyphicon glyphicon-plus">+</span>
                                                  </button>
                                              </span>
                                          </div>
                                      </div>                     
                                  </div>
                              </div>
                        </div>

                        <div class="form-group">
                          <label for="line_no">Line</label>
                          <select class="form-control" id="line_no" name="line_no">
                            <option value="">Select Line</option>
                            <option value="1">Main Line</option>
                            <option value="2">Matale Line</option>
                            <option value="3">Puttalam Line</option>
                            <option value="4">Kelani Valley Line</option>
                            <option value="5">Northern Line</option>
                            <option value="4">Mannar Line</option>
                            <option value="5">Trincomalee Line</option>
                            <option value="4">Batticaloa Line</option>
                            <option value="5">Coastal Line</option>
                          </select>
                        </div>

                        <div class="form-group">
                            <label for="compartment_no">Compartment Number</label>
                            <input type="text" class="form-control" id="compartment_no" value="{{ old('compartment_no') }}" name="compartment_no"  placeholder="Enter Compartment Number" required>                           
                        </div>

                        <div class="form-group">
                          <label for="from">From</label>
                          <select class="form-control" id="from" name="from">
                            <option value="">Select Start Station</option>
                            <option value="Colombo Fort">Colombo Fort</option>
                            <option value="Maradana">Maradana</option>
                            <option value="Dematagoda">Dematagoda</option>
                            <option value="Kelaniya">Kelaniya</option>
                            <option value="Wanawasala">Wanawasala</option>
                            <option value="Hunupitiya">Hunupitiya</option>
                            <option value="Ederamulla">Ederamulla</option>
                            <option value="Horape">Horape</option>
                            <option value="Ragama Junction">Ragama Junction</option>
                            <option value="Walpola">Walpola</option>
                            <option value="Batuwaththa">Batuwaththa</option>
                            <option value="Bulugahagoda">Bulugahagoda</option>
                            <option value="Ganemulla">Ganemulla</option>
                            <option value="Yagoda">Yagoda</option>
                            <option value="Gampaha">Gampaha</option>
                            <option value="Daraluwa">Daraluwa</option>
                            <option value="Bemmulla">Bemmulla</option>
                            <option value="Magalegoda">Magalegoda</option>
                            <option value="Heendeniya Pattiyagoda">Heendeniya Pattiyagoda</option>
                            <option value="Veyangoda">Veyangoda</option>
                            <option value="Wadurawa">Wadurawa</option>
                            <option value="Keenawala">Keenawala</option>
                            <option value="Pallewela">Pallewela</option>
                            <option value="Ganegoda">Ganegoda</option>
                            <option value="Wijaya Rajadahana">Wijaya Rajadahana</option>
                            <option value="Meerigama">Meerigama</option>
                            <option value="Wilwatta">Wilwatta</option>
                            <option value="Botale">Botale</option>
                            <option value="Ambepussa">Ambepussa</option>
                            <option value="Yaththalgoda">Yaththalgoda</option>
                            <option value="Bujjomuwa">Bujjomuwa</option>
                            <option value="Alawwa">Alawwa</option>
                            <option value="Walakumbura">Walakumbura</option>
                            <option value="Polgahawela Junction">Polgahawela Junction</option>
                            <option value="Panaliya">Panaliya</option>
                            <option value="Tismalpola">Tismalpola</option>
                            <option value="Korossa">Korossa</option>
                            <option value="Yatagama">Yatagama</option>
                            <option value="Rambukkana">Rambukkana</option>
                            <option value="Kadigamuwa">Kadigamuwa</option>
                            <option value="Yatiweldeniya">Yatiweldeniya</option>
                            <option value="Gangoda">Gangoda</option>
                            <option value="Ihala Kotte">Ihala Kotte</option>
                            <option value="Bambaragala">Bambaragala</option>
                            <option value="Makehelwala">Makehelwala</option>
                            <option value="Balana">Balana</option>
                            <option value="Weralugolla">Weralugolla</option>
                            <option value="Kadugannawa">Kadugannawa</option>
                            <option value="Kotabogolla">Kotabogolla</option>
                            <option value="Urapola">Urapola</option>
                            <option value="Pilimatalawa">Pilimatalawa</option>
                            <option value="Barammane">Barammane</option>
                            <option value="Kiribathkumbura">Kiribathkumbura</option>
                            <option value="Peradeniya Junction">Peradeniya Junction</option>
                            <option value="Koshinna">Koshinna</option>
                            <option value="Gelioya">Gelioya</option>
                            <option value="Polgahaanga">Polgahaanga</option>
                            <option value="Weligalla">Weligalla</option>
                            <option value="Botalapitiya">Botalapitiya</option>
                            <option value="Gangathilaka">Gangathilaka</option>
                            <option value="Kahatapitiya">Kahatapitiya</option>
                            <option value="Gampola">Gampola</option>
                            <option value="Wallahagoda">Wallahagoda</option>
                            <option value="Tembiligala">Tembiligala</option>
                            <option value="Warakapitiya">Warakapitiya</option>
                            <option value="Ulapane">Ulapane</option>
                            <option value="Pallegama">Pallegama</option>
                            <option value="Warakawa">Warakawa</option>
                            <option value="Nawalapitiya">Nawalapitiya</option>
                            <option value="Selam">Selam</option>
                            <option value="Hieghtenford">Hieghtenford</option>
                            <option value="Inguruoya">Inguruoya</option>
                            <option value="Penrose">Penrose</option>
                            <option value="Galboda">Galboda</option>
                            <option value="Dekinda">Dekinda</option>
                            <option value="Wewelthalawa">Wewelthalawa</option>
                            <option value="Watawala">Watawala</option>
                            <option value="Ihala Watawala">Ihala Watawala</option>
                            <option value="Rozella">Rozella</option>
                            <option value="Hatton">Hatton</option>
                            <option value="Galkandawatta">Galkandawatta</option>
                            <option value="Kotagala">Kotagala</option>
                            <option value="St. Clair">St. Clair</option>
                            <option value="Thalawakelle">Thalawakelle</option>
                            <option value="Watagoda">Watagoda</option>
                            <option value="Great Western">Great Western</option>
                            <option value="Radella">Radella</option>
                            <option value="Nanu Oya">Nanu Oya</option>
                            <option value="Perakumpura">Perakumpura</option>
                            <option value="Ambewela">Ambewela</option>
                            <option value="Pattipola">Pattipola</option>
                            <option value="Ohiya">Ohiya</option>
                            <option value="Idalgashinna">Idalgashinna</option>
                            <option value="Glenanore">Glenanore</option>
                            <option value="Haputale">Haputale</option>
                            <option value="Diyatalawa">Diyatalawa</option>
                            <option value="Bandarawela">Bandarawela</option>
                            <option value="Kinigama">Kinigama</option>
                            <option value="Heeloya">Heeloya</option>
                            <option value="Kitalella">Kitalella</option>
                            <option value="Ella">Ella</option>
                            <option value="Demodara">Demodara</option>
                            <option value="Uduwara">Uduwara</option>
                            <option value="Hali-Ela">Hali-Ela</option>
                            <option value="Badulla">Badulla</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="to">To</label>
                          <select class="form-control" id="to" name="to">
                            <option value="">Select Destination Station</option>
                            <option value="Colombo Fort">Colombo Fort</option>
                            <option value="Maradana">Maradana</option>
                            <option value="Dematagoda">Dematagoda</option>
                            <option value="Kelaniya">Kelaniya</option>
                            <option value="Wanawasala">Wanawasala</option>
                            <option value="Hunupitiya">Hunupitiya</option>
                            <option value="Ederamulla">Ederamulla</option>
                            <option value="Horape">Horape</option>
                            <option value="Ragama Junction">Ragama Junction</option>
                            <option value="Walpola">Walpola</option>
                            <option value="Batuwaththa">Batuwaththa</option>
                            <option value="Bulugahagoda">Bulugahagoda</option>
                            <option value="Ganemulla">Ganemulla</option>
                            <option value="Yagoda">Yagoda</option>
                            <option value="Gampaha">Gampaha</option>
                            <option value="Daraluwa">Daraluwa</option>
                            <option value="Bemmulla">Bemmulla</option>
                            <option value="Magalegoda">Magalegoda</option>
                            <option value="Heendeniya Pattiyagoda">Heendeniya Pattiyagoda</option>
                            <option value="Veyangoda">Veyangoda</option>
                            <option value="Wadurawa">Wadurawa</option>
                            <option value="Keenawala">Keenawala</option>
                            <option value="Pallewela">Pallewela</option>
                            <option value="Ganegoda">Ganegoda</option>
                            <option value="Wijaya Rajadahana">Wijaya Rajadahana</option>
                            <option value="Meerigama">Meerigama</option>
                            <option value="Wilwatta">Wilwatta</option>
                            <option value="Botale">Botale</option>
                            <option value="Ambepussa">Ambepussa</option>
                            <option value="Yaththalgoda">Yaththalgoda</option>
                            <option value="Bujjomuwa">Bujjomuwa</option>
                            <option value="Alawwa">Alawwa</option>
                            <option value="Walakumbura">Walakumbura</option>
                            <option value="Polgahawela Junction">Polgahawela Junction</option>
                            <option value="Panaliya">Panaliya</option>
                            <option value="Tismalpola">Tismalpola</option>
                            <option value="Korossa">Korossa</option>
                            <option value="Yatagama">Yatagama</option>
                            <option value="Rambukkana">Rambukkana</option>
                            <option value="Kadigamuwa">Kadigamuwa</option>
                            <option value="Yatiweldeniya">Yatiweldeniya</option>
                            <option value="Gangoda">Gangoda</option>
                            <option value="Ihala Kotte">Ihala Kotte</option>
                            <option value="Bambaragala">Bambaragala</option>
                            <option value="Makehelwala">Makehelwala</option>
                            <option value="Balana">Balana</option>
                            <option value="Weralugolla">Weralugolla</option>
                            <option value="Kadugannawa">Kadugannawa</option>
                            <option value="Kotabogolla">Kotabogolla</option>
                            <option value="Urapola">Urapola</option>
                            <option value="Pilimatalawa">Pilimatalawa</option>
                            <option value="Barammane">Barammane</option>
                            <option value="Kiribathkumbura">Kiribathkumbura</option>
                            <option value="Peradeniya Junction">Peradeniya Junction</option>
                            <option value="Koshinna">Koshinna</option>
                            <option value="Gelioya">Gelioya</option>
                            <option value="Polgahaanga">Polgahaanga</option>
                            <option value="Weligalla">Weligalla</option>
                            <option value="Botalapitiya">Botalapitiya</option>
                            <option value="Gangathilaka">Gangathilaka</option>
                            <option value="Kahatapitiya">Kahatapitiya</option>
                            <option value="Gampola">Gampola</option>
                            <option value="Wallahagoda">Wallahagoda</option>
                            <option value="Tembiligala">Tembiligala</option>
                            <option value="Warakapitiya">Warakapitiya</option>
                            <option value="Ulapane">Ulapane</option>
                            <option value="Pallegama">Pallegama</option>
                            <option value="Warakawa">Warakawa</option>
                            <option value="Nawalapitiya">Nawalapitiya</option>
                            <option value="Selam">Selam</option>
                            <option value="Hieghtenford">Hieghtenford</option>
                            <option value="Inguruoya">Inguruoya</option>
                            <option value="Penrose">Penrose</option>
                            <option value="Galboda">Galboda</option>
                            <option value="Dekinda">Dekinda</option>
                            <option value="Wewelthalawa">Wewelthalawa</option>
                            <option value="Watawala">Watawala</option>
                            <option value="Ihala Watawala">Ihala Watawala</option>
                            <option value="Rozella">Rozella</option>
                            <option value="Hatton">Hatton</option>
                            <option value="Galkandawatta">Galkandawatta</option>
                            <option value="Kotagala">Kotagala</option>
                            <option value="St. Clair">St. Clair</option>
                            <option value="Thalawakelle">Thalawakelle</option>
                            <option value="Watagoda">Watagoda</option>
                            <option value="Great Western">Great Western</option>
                            <option value="Radella">Radella</option>
                            <option value="Nanu Oya">Nanu Oya</option>
                            <option value="Perakumpura">Perakumpura</option>
                            <option value="Ambewela">Ambewela</option>
                            <option value="Pattipola">Pattipola</option>
                            <option value="Ohiya">Ohiya</option>
                            <option value="Idalgashinna">Idalgashinna</option>
                            <option value="Glenanore">Glenanore</option>
                            <option value="Haputale">Haputale</option>
                            <option value="Diyatalawa">Diyatalawa</option>
                            <option value="Bandarawela">Bandarawela</option>
                            <option value="Kinigama">Kinigama</option>
                            <option value="Heeloya">Heeloya</option>
                            <option value="Kitalella">Kitalella</option>
                            <option value="Ella">Ella</option>
                            <option value="Demodara">Demodara</option>
                            <option value="Uduwara">Uduwara</option>
                            <option value="Hali-Ela">Hali-Ela</option>
                            <option value="Badulla">Badulla</option>
                          </select>
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeCreateModel()">Close</button>
                          <button type="submit" class="btn btn-primary">Create Train</button>
                        </div>
                      </form>
                </div>                
            </div>
            </div>
        </div>
      </div>  
    </div>

    <div class="row justify-content-center" style="padding-top:10px">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header  bg-secondary text-white">{{ __('Yard Management') }}</div>

                <div class="card-body bg-primary">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Train No</th>
                            <th scope="col">Line</th>
                            <th scope="col">From - To</th>
                            <th scope="col">Date</th>
                            <th scope="col">Oparation History</th>
                            <th scope="col">Oparation </th>
                            <th scope="col">Oparation End Of Operation </th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)                       
                            <tr>
                                <th scope="row">{{$item->train_no}}</th>
                                <td>{{$item->line}}</td>
                                <td>{{$item->from}} - {{$item->to}}</td>      
                                <td>{{$item->created_at}}</td>
                            
                                <td>
                                  
                                  @foreach ($item->trainOparation as $operation) 
                                  <ul>                          
                                  <li>Operation Engine: {{ $operation['train_id'] }}</li>  
                                  <li>Operation Station: {{ $operation['change_point'] }}</li>  
                                  <li>Operation Date And Time: {{ $operation['created_at'] }}</li>  
                                  {{-- <li>Operation Status: {{ $operation['created_at'] }}</li>   --}}
                                </ul>                          
                                  @endforeach 
                                  
                                </td>
                              
                                
                                <td>
                                    <button type="button" class="btn btn-primary open-modal-btn"
                                        data-toggle="modal" data-target="#myModal"
                                        data-index="{{$item->id}}"
                                        data-eng_no="{{$item->eng_no}}"
                                        data-train-number="{{$item->train_no}}"
                                        data-train-line="{{$item->line}}"
                                        data-train-destination="{{$item->from}} - {{$item->to}}">
                                        <i class="fa-solid fa-sliders"></i>
                                    </button>
                                 </td>    
                                 
                                 
                                 <td>@if ($item->final_code == null)
                                  train is travelling
                                  @else
                                  {{$item->final_code }}
                                     
                                 @endif</td>
                              </tr> 
                           
                             
                            @endforeach                                               
                        </tbody>
                      </table>
                  
                    
                </div>           
            </div>
        </div>
    </div>


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Operation</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeOparationModel()">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           
            <div class="modal-body">
              <form method="POST" action="{{ route('train-operation') }}" id="opration">
                @csrf

                <p id="processerrorParagraph"></p>
                  <div class="form-group">                   
                    <input type="text"   class="form-control" name="index" id="index" hidden>
                  </div>       
                  
                  <div class="form-group">                    
                    <input type="text"   class="form-control" name="old_eng" id="old_eng" hidden>
                  </div> 
             
                  <div class="form-group ">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="operation_type" id="radio_option1" value="RMF">
                        <label class="form-check-label" for="radio_option1">Remove Engine Front</label>
                  </div>

                  <div class="form-group ">
                    <div class="form-check ">
                        <input class="form-check-input" type="radio" name="operation_type" id="radio_option1" value="RMB">
                        <label class="form-check-label" for="radio_option1">Remove Engine Back</label>
                    </div>
                  </div>

                  <div class="form-group ">
                    <div class="form-check ">
                        <input class="form-check-input" type="radio" name="operation_type" id="radio_option1" value="ADDF">
                        <label class="form-check-label" for="radio_option1">Add Engine Front</label>
                    </div>
                  </div>

                  <div class="form-group ">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="operation_type" id="radio_option1" value="ADDB">
                      <label class="form-check-label" for="radio_option1">Add Engine Back</label>
                    </div>
                  </div>                    
              
                  </div>

                  <div class="form-group" style="padding-top:10px">
                    <label for="new_eng">Engine Nunmber</label>
                    <select class="form-control" id="new_eng" name="new_eng">
                      <option value="">Select Engine Nunmber</option>
                      <option value="S5">S5</option>
                      <option value="S14">S14</option>
                      <option value="S12">S12</option>
                      <option value="M4">M4</option>
                      <option value="M6">M6</option>
                    </select>
                  </div>

                  <div class="form-group" style="padding-top:10px">
                    <label for="station">Station</label>
                    <select class="form-control" id="station" name="station">
                      <option value="">Select Station</option>
                      <option value="Colombo Fort">Colombo Fort</option>
                      <option value="Maradana">Maradana</option>
                      <option value="Dematagoda">Dematagoda</option>
                      <option value="Kelaniya">Kelaniya</option>
                      <option value="Wanawasala">Wanawasala</option>
                      <option value="Hunupitiya">Hunupitiya</option>
                      <option value="Ederamulla">Ederamulla</option>
                      <option value="Horape">Horape</option>
                      <option value="Ragama Junction">Ragama Junction</option>
                      <option value="Walpola">Walpola</option>
                      <option value="Batuwaththa">Batuwaththa</option>
                      <option value="Bulugahagoda">Bulugahagoda</option>
                      <option value="Ganemulla">Ganemulla</option>
                      <option value="Yagoda">Yagoda</option>
                      <option value="Gampaha">Gampaha</option>
                      <option value="Daraluwa">Daraluwa</option>
                      <option value="Bemmulla">Bemmulla</option>
                      <option value="Magalegoda">Magalegoda</option>
                      <option value="Heendeniya Pattiyagoda">Heendeniya Pattiyagoda</option>
                      <option value="Veyangoda">Veyangoda</option>
                      <option value="Wadurawa">Wadurawa</option>
                      <option value="Keenawala">Keenawala</option>
                      <option value="Pallewela">Pallewela</option>
                      <option value="Ganegoda">Ganegoda</option>
                      <option value="Wijaya Rajadahana">Wijaya Rajadahana</option>
                      <option value="Meerigama">Meerigama</option>
                      <option value="Wilwatta">Wilwatta</option>
                      <option value="Botale">Botale</option>
                      <option value="Ambepussa">Ambepussa</option>
                      <option value="Yaththalgoda">Yaththalgoda</option>
                      <option value="Bujjomuwa">Bujjomuwa</option>
                      <option value="Alawwa">Alawwa</option>
                      <option value="Walakumbura">Walakumbura</option>
                      <option value="Polgahawela Junction">Polgahawela Junction</option>
                      <option value="Panaliya">Panaliya</option>
                      <option value="Tismalpola">Tismalpola</option>
                      <option value="Korossa">Korossa</option>
                      <option value="Yatagama">Yatagama</option>
                      <option value="Rambukkana">Rambukkana</option>
                      <option value="Kadigamuwa">Kadigamuwa</option>
                      <option value="Yatiweldeniya">Yatiweldeniya</option>
                      <option value="Gangoda">Gangoda</option>
                      <option value="Ihala Kotte">Ihala Kotte</option>
                      <option value="Bambaragala">Bambaragala</option>
                      <option value="Makehelwala">Makehelwala</option>
                      <option value="Balana">Balana</option>
                      <option value="Weralugolla">Weralugolla</option>
                      <option value="Kadugannawa">Kadugannawa</option>
                      <option value="Kotabogolla">Kotabogolla</option>
                      <option value="Urapola">Urapola</option>
                      <option value="Pilimatalawa">Pilimatalawa</option>
                      <option value="Barammane">Barammane</option>
                      <option value="Kiribathkumbura">Kiribathkumbura</option>
                      <option value="Peradeniya Junction">Peradeniya Junction</option>
                      <option value="Koshinna">Koshinna</option>
                      <option value="Gelioya">Gelioya</option>
                      <option value="Polgahaanga">Polgahaanga</option>
                      <option value="Weligalla">Weligalla</option>
                      <option value="Botalapitiya">Botalapitiya</option>
                      <option value="Gangathilaka">Gangathilaka</option>
                      <option value="Kahatapitiya">Kahatapitiya</option>
                      <option value="Gampola">Gampola</option>
                      <option value="Wallahagoda">Wallahagoda</option>
                      <option value="Tembiligala">Tembiligala</option>
                      <option value="Warakapitiya">Warakapitiya</option>
                      <option value="Ulapane">Ulapane</option>
                      <option value="Pallegama">Pallegama</option>
                      <option value="Warakawa">Warakawa</option>
                      <option value="Nawalapitiya">Nawalapitiya</option>
                      <option value="Selam">Selam</option>
                      <option value="Hieghtenford">Hieghtenford</option>
                      <option value="Inguruoya">Inguruoya</option>
                      <option value="Penrose">Penrose</option>
                      <option value="Galboda">Galboda</option>
                      <option value="Dekinda">Dekinda</option>
                      <option value="Wewelthalawa">Wewelthalawa</option>
                      <option value="Watawala">Watawala</option>
                      <option value="Ihala Watawala">Ihala Watawala</option>
                      <option value="Rozella">Rozella</option>
                      <option value="Hatton">Hatton</option>
                      <option value="Galkandawatta">Galkandawatta</option>
                      <option value="Kotagala">Kotagala</option>
                      <option value="St. Clair">St. Clair</option>
                      <option value="Thalawakelle">Thalawakelle</option>
                      <option value="Watagoda">Watagoda</option>
                      <option value="Great Western">Great Western</option>
                      <option value="Radella">Radella</option>
                      <option value="Nanu Oya">Nanu Oya</option>
                      <option value="Perakumpura">Perakumpura</option>
                      <option value="Ambewela">Ambewela</option>
                      <option value="Pattipola">Pattipola</option>
                      <option value="Ohiya">Ohiya</option>
                      <option value="Idalgashinna">Idalgashinna</option>
                      <option value="Glenanore">Glenanore</option>
                      <option value="Haputale">Haputale</option>
                      <option value="Diyatalawa">Diyatalawa</option>
                      <option value="Bandarawela">Bandarawela</option>
                      <option value="Kinigama">Kinigama</option>
                      <option value="Heeloya">Heeloya</option>
                      <option value="Kitalella">Kitalella</option>
                      <option value="Ella">Ella</option>
                      <option value="Demodara">Demodara</option>
                      <option value="Uduwara">Uduwara</option>
                      <option value="Hali-Ela">Hali-Ela</option>
                      <option value="Badulla">Badulla</option>
                    </select>
                  </div>              

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeOparationModel()">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>

          </form>
        </div>
          </div>
        </div>
      </div>  
</div>

<script>
     $(document).ready(function() {
        $('.open-modal-btn').on('click', function() {
          
            const index = $(this).data('index');
            const old_eng = $(this).data('eng_no');
            const trainNumber = $(this).data('train-number');
            const trainLine = $(this).data('train-line');
            const trainDestination = $(this).data('train-destination');
           
            $('#index').val(index);
            $('#old_eng').val(old_eng);
            $('#trainNumber').val(trainNumber);
            $('#trainLine').val(trainLine);
            $('#trainDestination').val(trainDestination);
        });
    });

    $(document).ready(function () {
        $('select[name="train_type"]').on('change', function () {
            if ($(this).val() === 'Night Mali') {
                $('#ShowMultipleTrain').show();
                $('#ShowSingaleTrain').hide();
                document.getElementById('one_eng').value = '';
            } else {
                $('#ShowMultipleTrain').hide();
                document.getElementById('new_eng').value = '';
                document.getElementById('position').value = '';
                $('#ShowSingaleTrain').show();
                
            }
        });
    });

    $(document).ready(function () {
        $('input[name="operation_type"]').on('change', function () {
            if ($(this).val() === 'RM' || $(this).val() === 'ADD') {
                $('#inputFieldWrapper').show();
            } else {
                $('#inputFieldWrapper').hide();
            }
        });
    });

    $(document).on('click', '.btn-add', function(e) {
        e.preventDefault();

        var controlForm = $('.controls div:first'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="glyphicon glyphicon-minus">-</span>');
    }).on('click', '.btn-remove', function(e)
    {
		$(this).parents('.entry:first').remove();
        e.preventDefault();
        return false;
	  });

    function closeCreateModel() {
      document.getElementById("createFrom").reset();
    }        

    function closeOparationModel() {
      document.getElementById("opration").reset();
    } 

</script>
@endsection



