
@extends('layouts.app')

@section('content')


<div class="container-fluid error-container mt-3 bg-dark text-center"  >
  <!-- Validation errors will be displayed here -->
</div>

<div class ="container mt-5" id="is_train">
  <h2 class="text-center text-success" id="is_train_avaibale"></h2>
</div>


<div class="container-fluid mt-5">
    <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card ">
                <div class="card-header  bg-secondary text-white">{{ __('Train Delay Form') }}</div>
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
            
        </div>
    </div>
</div>

@section('page-css')

<style>
.hidden {
    display: none;
}

  </style>

@stop

@section('page-script')

<script type="text/javascript">
$(document).ajaxSetup  
 
$('#is_train').addClass('hidden');
    $(".btn-submit").click(function(e){
        
        e.preventDefault();    
     
        var train_no = $("#train_no").val();
        var destination = $("#destination").val();
        var delay_reason = $("#delay_reason").val();
        var delay_time = $("#delay_time").val();
     
        $.ajax({
           type:'POST',
           url:"{{ route('post-delay-my-train') }}",
           data:{ "_token": "{{ csrf_token() }}",train_no:train_no, destination:destination,delay_reason:delay_reason,delay_time:delay_time},
           success:function(data){
            var jsonObject = JSON.parse(data);
            console.log(jsonObject);
             
            if(jsonObject == true){     
                $('#is_train').show();
                $('#is_train_avaibale').text("Data Insert");     

            }else{                    
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

@stop


@endsection



    