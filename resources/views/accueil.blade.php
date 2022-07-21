
@extends('layouts.layout2')



@section('content')



<body>
  @foreach($restaurants as $restaurant)
 

  <div class="card" style="width: 18rem; display: inline-block;">
  
  <div class="card-body">
    <h5 class="card-title"> {{$restaurant['Nom']}}</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="{{route('restaurants.show', ['id' => $restaurant->id])}}" class="btn btn-primary">Choisir ce restaurant</a>

    
  </div>
</div>
  @endforeach
  {{Session::get('restoId');}}
  
  </body>
  @endsection