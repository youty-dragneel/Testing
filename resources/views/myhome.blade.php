
<?php
    session_start();
    if(isset($_SESSION['userName'])){
        $a = $_SESSION['userName'];
    } else {
        echo "<script>window.location.href='http://localhost:8000/login'</script>";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Home page</title>
    <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.css">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/myJs/paginate.js"></script>
    <script type="text/javascript" src="semantic/dist/semantic.js"></script>
</head>
<body>

    <div class="ui container">
        <div class="ui pointing menu">
  <a class="item active">
    Home
  </a>
  <a class="item">
    Messages
  </a>
  <a class="item">
    Friends
  </a>
  <div class="right menu">
    <div class="item">
      <div class="ui transparent icon input">
        <input type="text" placeholder="Search...">
        <i class="search link icon"></i>
      </div>
    </div>
  </div>
</div>
<div class="ui segment">
          <div class="">
            <a href="{{ url('/logout')}}">Logout</a>
        </div>
        <table class="ui celled table" border=1>
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Qty</th>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{ $item->itemId }}</td>
                    <td>{{ $item->itemName }}</td>
                    <td>{{ $item->Qty }}</td>
                </tr>
            @endforeach                
            </tbody>
             <tfoot>
            <tr>
                <th colspan="3">
                 @if ($data->lastPage() > 1)
                    <div class="ui right floated pagination menu">
                        <a class="icon item {{ ($data->currentPage() == 1) ? ' disabled' : '' }}" href="{{ $data->url(1) }}">
                           <i class="left chevron icon"></i>
                        </a>
                         <a class="icon item {{ ($data->currentPage() == 1) ? ' disabled' : '' }}" href="{{ $data->url($data->currentPage()-1) }}">
                           <i class="angle double left icon"></i>
                        </a>
                        @for ($i = $data->currentPage(); $i < $data->currentPage() + 5; $i++)
                          <a  class="{{ ($data->currentPage() == $i) ? ' active' : '' }} item" href="{{ $data->url($i) }}">{{ $i }}</a>
                        @endfor
                        <a class="icon item {{ ($data->currentPage() == $data->lastPage()) ? ' disabled' : '' }}" 
                           href="{{ $data->url($data->currentPage()+1) }}">
                          <i class="angle double right icon"></i>
                        </a>
                        <a class="icon item {{ ($data->currentPage() == $data->lastPage()) ? ' disabled' : '' }}" 
                           href="{{ $data->url($data->lastPage()+1) }}">
                          <i class="right chevron icon"></i>
                        </a>
                    </div>
                 @endif
                </th>
            </tr>
          </tfoot> 
        </table>
        <div>
            Total data     : {{$data->total()}}    
        </div>
        <div>
            Last Page      : {{$data->lastPage()}}    
        </div>
        <div>
            CurrentPage   : {{$data->currentPage()}}    
        </div>
</div>

      
     </div>
</body>
<script type="text/javascript">
    var x = {!! json_encode($data) !!};
    console.log(x);
</script>
</html>
