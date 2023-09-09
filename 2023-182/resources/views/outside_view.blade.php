
@extends('layouts.app')

@section('content')


<div class="container-fluid error-container mt-3 bg-dark text-center"  >
  <!-- Validation errors will be displayed here -->
</div>

<div id="preloader" class="preloader">
  <div class='inner'>
      <div class='line1'></div>
      <div class='line2'></div>
      <div class='line3'></div>
  </div>
</div>
<section class="fxt-template-animation fxt-template-layout34" data-bg-image="img/elements/bg1.png">
  <div class="fxt-shape">
      <div class="fxt-transformX-L-50 fxt-transition-delay-1">
          <img src="img/elements/shape1.png" alt="Shape">
      </div>
  </div>
  <div class="container">
      <div class="row">
          <div class="col-lg-8">
              
              <div class="fxt-column-wrap justify-content-between">
                  <h1 class="fxt-main-title">Hello Jhon Welcome !</h1>
                  
<div class="box" style="
margin-bottom: 19px;
">
<a class="button" href="{{ route('delay-my-train.index') }}">Delay My Train</a>
</div>

<div id="popup1" class="overlay">
<div class="popup">
<h2>Live Train alart -</h2>
<a class="close" href="#">&times;</a>
<div class="content">
TRAIN WILL BE LATE TO REACH TO NEXT LOCATION ON TIME DUE TO BAD WEATHER CONDITIONS
</div>
</div>
</div>
                  <iframe width="auto" height="560" src="https://www.youtube.com/embed/hxITmHjOD-w" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                   
              </div>
          </div>
          <div class="col-lg-4" style="margin-top: 152px;">
              <div class="fxt-column-wrap justify-content-center">
                  <div class="fxt-form">
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/d328MlMoWeo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/K4RddOJG7R0?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/s8VNJ88AFWw?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                      
                  </div>
                  
              </div>
          </div>
      </div>
  </div>
</section>

{{-- 
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card ">
                <div class="card-header  bg-secondary text-white">{{ __('Find My Train') }}</div>
                  <div class="card-body bg-primary">
                    <form>     
                        
                        <div class="row mb-0">  
                            <div class="col-md-12" style="margin: 5px">                           
                              <input type="text" class="form-control " id="train_no" name="train_no" placeholder="Train No">
                            </div>
                        <div>

                        <div class="row mb-0">                 
                            <div class="col-md-12" style="margin: 5px">                       
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
                        <div>                          
                       
                        <div class="row mb-0">    
                          <div class="col-md-12" style="margin: 5px">                           
                              <input type="text" class="form-control timepicker" id="delay_reason" name="delay_reason" placeholder="Delay Reason">
                          </div> 
                        </div>   

                        <div class="row mb-0">    
                            <div class="col-md-12" style="margin: 5px">                           
                                <input type="text" class="form-control timepicker" id="delay_time" name="delay_time" placeholder="Delay Time">
                            </div> 
                        </div>                        
                      
                        <div class="col-md-6  " style="margin: 5px">
                            <button type="submit" class="btn btn-xs btn-info pull-right btn-submit">Process</button>
                        </div>
      
                      </div>              
                    </form>
                  </div>
              </div>            
          </div>

          <div class ="container mt-5 mb-5" id="ml_section">
            <h2 class="text-center text-danger" id="ml_data"></h2>
          </div>

          <table class="table bg-1-dark" id="arrival_table">
              <thead>
                  <tr>
                      <th>Train Number</th>                     
                      <th>Station Name</th>
                      <th>Arrival Time</th>
                      <th>Departure Time</th>                   
                  </tr>
              </thead>
              <tbody id="arrival-data-body">
                  <!-- Data will be inserted here -->
              </tbody>
          </table>

          <table class="table bg-1-light" id="destination_table">
            <thead>
                <tr>
                    <th>Train Nfumber</th>                 
                    <th>Station Name</th>
                    <th>Arrival Time</th>
                    <th>Departure Time</th>                   
                </tr>
            </thead>
            <tbody id="destination-data-body">
                <!-- Data will be inserted here -->
            </tbody>
          </table>

          <table class="table bg-2-dark" id="transit_arrival_table">
              <thead>
                  <tr>
                      <th>Train Number</th>                     
                      <th>Station Name</th>
                      <th>Arrival Time</th>
                      <th>Departure Time</th>                  
                  </tr>
              </thead>
              <tbody id="transit_arrival-data-body">
                  <!-- Data will be inserted here -->
              </tbody>
          </table>

          <table class="table bg-2-light" id="transit_destination_1_table">
              <thead>
                  <tr>
                      <th>Train Number</th>                 
                      <th>Station Name</th>
                      <th>Arrival Time</th>
                      <th>Departure Time</th>                     
                  </tr>
              </thead>
              <tbody id="transit_destination_1-data-body">
                <tr>
                  <td id="train-number"></td>           
                  <td id="station-name"></td>
                  <td id="arrival-time"></td>
                  <td id="departure-time"></td>                
              </tr>
              </tbody>
          </table>

          <table class="table bg-3-light" id="trasit_final_start_table">
          <thead>
          <tr>
          <th>Train Number</th>         
          <th>Station Name</th>
          <th>Arrival Time</th>
          <th>Departure Time</th>          
          </tr>
          </thead>
          <tbody id="trasit_final_start-data-body">
          <!-- Data will be inserted here -->
          </tbody>
          </table>

          <table class="table bg-3-light" id="trasit_final_destination_table">
          <thead>
          <tr>
            <th>Train Number</th>           
            <th>Station Name</th>
            <th>Arrival Time</th>
            <th>Departure Time</th>            
          </tr>
          </thead>
          <tbody id="trasit_final_destination-data-body">
          <!-- Data will be inserted here -->
          </tbody>
          </table>  
          
          <div class ="container mt-5" id="is_train">
            <h2 class="text-center text-danger" id="is_train_avaibale"></h2>
          </div>

            
        </div>
    </div>
</div> --}}

@section('page-css')

<style>
.hidden {
    display: none;
}

.bg-1-dark {
  background-color: #D4EFDF; 
  color: #000;
}

.bg-1-light {
  background-color: #D0ECE7; 
  color: #000;
}

.bg-2-dark {
  background-color: #FDEBD0; 
  color: #000;
}

.bg-2-light {
  background-color: #FCF3CF; 
  color: #000;
}

.bg-3-dark {
  background-color: #E8DAEF; 
  color: #000; 
}

.bg-3-light {
  background-color: #EBDEF0; 
  color: #000;
}



  </style>

@stop

@section('page-script')

<script type="text/javascript">
$(document).ajaxSetup

   
 

    $('#arrival_table').addClass('hidden');
    $('#destination_table').addClass('hidden');
    $('#transit_arrival_table').addClass('hidden');
    $('#transit_destination_1_table').addClass('hidden');
    $('#trasit_final_start_table').addClass('hidden');
    $('#trasit_final_destination_table').addClass('hidden');
    $('#is_train').addClass('hidden');
    $('#ml_section').addClass('hidden');   
     
    $(".btn-submit").click(function(e){

        $('#arrival_table').hide();
        $('#destination_table').hide();
        $('#transit_arrival_table').hide();
        $('#transit_destination_1_table').hide();
        $('#trasit_final_start_table').hide();
        $('#trasit_final_destination_table').hide();
        $('#is_train').hide();
        $('#ml_section').hide();
    
        e.preventDefault();    
     
        var train_no = $("#train_no").val();
        var destination = $("#destination").val();
        var delay_reason = $("#delay_reason").val();
        var delay_time = $("#delay_time").val();
     
        $.ajax({
           type:'POST',
           url:"{{ route('get--delay-my-train') }}",
           data:{ "_token": "{{ csrf_token() }}",train_no:train_no, destination:destination,delay_reason:delay_reason,delay_time:delay_time},
           success:function(data){
          
              //Check is train avaibale
            if(data =='no train found'){  //if not avaibale          
                $('#is_train').show();
                $('#is_train_avaibale').text("No Trains Available");     

            }else{//if avaiabale

              var jsonObject = JSON.parse(data);
              console.log(jsonObject);

              //Show ML DATA
              $('#ml_section').show();
              $('#ml_data').text('This is a '+jsonObject.ml_data + " Train");              
             
                  if (jsonObject.arrival_data && jsonObject.arrival_data != 'null') {
                      $('#arrival_table').show();              
                      var arrivalDataBody = $('#arrival-data-body');
                      // Clear any existing table rows
                      arrivalDataBody.empty();
                      
                      // Populate the table with data
                      $.each(jsonObject.arrival_data, function (index, arrival) {
                          arrivalDataBody.append('<tr>' +
                              '<td>' + arrival['Train Number or Train Name'] + '</td>' +                     
                              '<td>' + arrival['Station Name (Code)'] + '</td>' +
                              '<td>' + arrival['Arrival Time'] + '</td>' +
                              '<td>' + arrival['Departure Time'] + '</td>' +                                                      
                              '</tr>');
                      });
                  }else {                     
                  }

                  if (jsonObject.destination_data && jsonObject.destination_data != 'null') {
                      $('#destination_table').show();  
                      var destinationDataBody = $('#destination-data-body');
                      // Clear any existing table rows
                      destinationDataBody.empty();
                      // Populate the table with data
                      $.each(jsonObject.destination_data, function (index, destination) {
                        destinationDataBody.append('<tr>' +
                              '<td>' + destination['Train Number or Train Name'] + '</td>' +                              
                              '<td>' + destination['Station Name (Code)'] + '</td>' +
                              '<td>' + destination['Arrival Time'] + '</td>' +
                              '<td>' + destination['Departure Time'] + '</td>' +                                                  
                              '</tr>');
                      });
                  }else {                      
                  }

                  if (jsonObject.transit_arrival && jsonObject.transit_arrival != 'null') {
                    $('#arrival_table').hide();
                      $('#transit_arrival_table').show();

                      var transit_arrivalDataBody = $('#transit_arrival-data-body');

                      // Clear any existing table rows
                      transit_arrivalDataBody.empty();

                      // Populate the table with data
                      $.each(jsonObject.transit_arrival, function (index, transit_arrival) {

                        var arrivalDatetime = new Date(transit_arrival['Arrival Time']);

                        var hours24 = arrivalDatetime.getHours(); // 24-hour format
                        var minutes = arrivalDatetime.getMinutes();
                        var ampm = hours24 >= 12 ? 'PM' : 'AM';
                      
                        var formattedTime = hours24 + ':' + (minutes < 10 ? '0' : '') + minutes + ' ' + ampm;



                        transit_arrivalDataBody.append('<tr>' +
                              '<td>' + transit_arrival['Train Number or Train Name'] + '</td>' +                              
                              '<td>' + transit_arrival['Station Name (Code)'] + '</td>' +
                              '<td>' + formattedTime + '</td>' +
                              '<td>' + transit_arrival['Departure Time'] + '</td>' +                                                           
                              '</tr>');
                      });
                  }else {                
                  }

                  if (jsonObject.transit_destination_1  && jsonObject.transit_destination_1 != 'null') {

                      var arrivalDatetime = new Date(jsonObject.transit_destination_1['Arrival Time']);

                      var hours24 = arrivalDatetime.getHours(); // 24-hour format
                      var minutes = arrivalDatetime.getMinutes();
                      var ampm = hours24 >= 12 ? 'PM' : 'AM';

                      var formattedTime = hours24 + ':' + (minutes < 10 ? '0' : '') + minutes + ' ' + ampm;

                    
                        $('#transit_destination_1_table').show();                  
                        $('#train-number').text(jsonObject.transit_destination_1 ['Train Number or Train Name']);                      
                        $('#station-name').text(jsonObject.transit_destination_1 ['Station Name (Code)']);
                        $('#arrival-time').text(formattedTime);
                        $('#departure-time').text(jsonObject.transit_destination_1 ['Departure Time']);                                           

                  }else {                   
                  }

                  if (jsonObject.trasit_final_start && jsonObject.trasit_final_start != 'null') {
                    $('#trasit_final_start_table').show();
                    var trasit_final_startDataBody = $('#trasit_final_start-data-body');

                    


                      // Clear any existing table rows
                      trasit_final_startDataBody.empty();

                      // Populate the table with data
                      $.each(jsonObject.trasit_final_start, function (index, trasit_final_start) {
                        
                        trasit_final_startDataBody.append('<tr>' +
                              '<td>' + trasit_final_start['Train Number or Train Name'] + '</td>' +                              
                              '<td>' + trasit_final_start['Station Name (Code)'] + '</td>' +
                              '<td>' + trasit_final_start['Arrival Time'] + '</td>' +
                              '<td>' + trasit_final_start['Departure Time'] + '</td>' +                             
                              '</tr>');
                      });
                  }else {                     
                  }   

                  if (jsonObject.trasit_final_destination && jsonObject.trasit_final_destination != 'null') {
                      $('#trasit_final_destination_table').show();
                      var trasit_final_destinationDataBody = $('#trasit_final_destination-data-body');



                      // Clear any existing table rows
                      trasit_final_destinationDataBody.empty();

                      // Populate the table with data
                      $.each(jsonObject.trasit_final_destination, function (index, trasit_final_destination) {
                        trasit_final_destinationDataBody.append('<tr>' +
                              '<td>' + trasit_final_destination['Train Number or Train Name'] + '</td>' +                              
                              '<td>' + trasit_final_destination['Station Name (Code)'] + '</td>' +
                              '<td>' + trasit_final_destination['Arrival Time'] + '</td>' +
                              '<td>' + trasit_final_destination['Departure Time'] + '</td>' +                                                    
                              '</tr>');
                      });
                  }else {                      
                  }
              
                    
            }          
                  
               
           },
           error:function(data){            
              $('.error-container').html('');            
              $.each(data.responseJSON.errors, function (key, value) {
                  $('.error-container').append('<p class="text-danger" >' + value + '</p>');
              });                
           }

        });
    
    });

</script>


<!-- Imagesloaded js -->
<script src="js/imagesloaded.pkgd.min.js"></script>
<!-- Validator js -->
<script src="js/validator.min.js"></script>
<!-- Custom Js -->
<script src="js/dmain.js"></script>
@stop


@endsection



    