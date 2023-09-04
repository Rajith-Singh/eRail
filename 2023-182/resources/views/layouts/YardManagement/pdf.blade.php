<table class="table">
    <thead>
      <tr>
        <th >Train No</th>
        <th style="width:5%">Line</th>
        <th>From - To</th>
        <th >Date</th>
        <th>Oparation History</th>
        <th >Oparation End Of Operation </th>
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
            </ul>                          
              @endforeach               
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

  
<style type="text/css">
    
      p{
        padding: 0px;
        margin: 0px;
      }
    
      span{
        font-weight: bold;
      }
    
      h4,h5{
        color:#154360;
        font-weight: bold;
      }
    
      table{
        border: 1px solid black; width: 100%; word-wrap:break-word;   table-layout: fixed;
        padding-top: 10px;
      }
    
      table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
      }
      th, td {
        padding: 5px;
        text-align: left;
        font-size: 10px;
      }
      .center {
      text-align:center;
      display: flex;
      justify-content: center;
        }
    
       h2{
         text-align:center;
        padding-top: 10px;
      }
    
        h3{
         text-align:center;
       
      }
    
      .document{
      padding-top: 20px; 
      text-align:center;
      font-weight: bold;
        }
    
      .top{
      text-align:center;
      font-weight: bold;
      color: gray;
        }
    
      .page-break {
        page-break-after: always;
        }
    
    /*.page-brake-auto{
      page-break-inside: avoid;
    }*/
    .page-brake-auto{
      page-break-inside: auto;
    }
    
      .column { 
      padding-top: 20px;
    
    }
    
    .column p{
     line-height: 2.0;
    }
    
    .row:after {
      content: "";
      display: table;
      clear: both;
    }
    
     
    
    
    
    </style>