
@extends('layouts.app')

@section('content')



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

    <div class="container-fluid ">
        <div class="row justify-content-center">
              <div class="col-md-8">
                  <div class="card ">
                    <div class="card-header  bg-secondary text-white">{{ __('Delay Prediction') }}</div>
                      <div class="card-body bg-primary">
                        <form>    
            
                        <div class="row mb-0">
                          <div class="col-md-6" style="margin: 5px">                           
                            <input type="text" class="form-control " id="train_no" name="train_no" placeholder="Train No">
                          </div>

                          <div class="col-md-4  " style="margin: 5px">
                            <button type="submit" class="btn btn-xs btn-info pull-right btn-submit">Process</button>
                        </div>

                        </div>                                                                   
                                      
                        </form>
                      </div>
                  </div>            
                </div>

                
            </div>
        </div>

        <div class="container mt-5">
          <div class="row">
              <div class="col-lg-4">
                  <div class="fxt-column-wrap justify-content-between">
                      <div class="fxt-animated-img">
                          <div class="fxt-transformX-L-50 fxt-transition-delay-10">
                              
                          </div>
                      </div>
                    
                      <div class="fxt-transformX-L-50 fxt-transition-delay-5">
                          <div class="fxt-middle-content">
                              <h1 class="fxt-main-title">Due to unexpecxted dealy follwoing view points will miss you</h1>
                              <ul id="responseList">
                                <!-- Your list items will be added here dynamically -->
                            </ul>
                          </div>
                      </div>
                      
                  </div>
              </div>
              <div class="col-lg-8">
                  <div class="container">
                      <div class="gallery" id="view_point_gallery">
                          
                      </div>
                  </div>
          
              </div>
          </div>
      </div>
    </div>


  
</section>


<div class="container-fluid error-container mt-3  text-center"  >
  <!-- Validation errors will be displayed here -->
</div>




@section('page-css')

<style>
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  
  td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }
  
  tr:nth-child(even) {
    background-color: #dddddd;
  }
  </style>
  

@stop

@section('page-script')

<script type="text/javascript">
$(document).ajaxSetup


 
     
    $(".btn-submit").click(function(e){

    
        e.preventDefault();    
     
        var train_no = $("#train_no").val();
       
     
        $.ajax({
           type:'POST',
           url:"{{ route('get-delay-my-train') }}",
           data:{ "_token": "{{ csrf_token() }}",train_no:train_no},
           success:function(data){

              //Check is train avaibale
            if(data =='no train found'){  //if not avaibale          
                $('#is_train').show();
                $('#is_train_avaibale').text("No Trains Available");     

            }else{//if avaiabale

              var jsonObject = JSON.parse(data);
              var res_delay=jsonObject.res_delay;
              var res_s3=jsonObject.res_s3;
              var responseList = document.getElementById('responseList');
              var viewpoint = document.getElementById('view_point_gallery');
              console.log(jsonObject);

                       
              if (Array.isArray(res_delay)) {
    // Get the keys from the first object in the array
    var keys = Object.keys(res_delay[0]);
    
    // Iterate through the keys
    keys.forEach(function (key) {
        // Create a new list item element
        var listItem = document.createElement('li');
        
        // Set the text content of the list item with the key and its corresponding value
        listItem.textContent = key + ': ' + res_delay[0][key];
        
        // Append the list item to the <ul> element
        responseList.appendChild(listItem);
    });


    for (var key in res_s3) {
    if (res_s3.hasOwnProperty(key)) {
        var imageUrls = res_s3[key];
        
        // Loop through the image URLs for this key
        imageUrls.forEach(function (imageUrl) {
            // Create a <figure> element
            var figure = document.createElement('figure');
            figure.className = 'gallery__item';

            // Create an <img> element
            var img = document.createElement('img');
            img.src = imageUrl;
            img.alt = 'Gallery image ' + key;
            img.className = 'gallery__img';

            // Add the <img> element to the <figure> element
            figure.appendChild(img);

            // Add the <figure> element to the gallery container
              viewpoint.appendChild(figure);
        });
    }
}





} else {         
  
  
}

                  

                 

                 

                 

                  
              
                    
            }          
                  
               
           },
           error:function(data){            
              $('.error-container').html('');            
              $.each(data.responseJSON.errors, function (key, value) {
                  $('.error-container').append('<p class="text-danger font-weight-bold" >' + value + '</p>');
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



    
