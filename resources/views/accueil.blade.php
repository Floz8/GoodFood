
@extends('layouts.layout2')



@section('content')
<body>
    <style>
      .bg-glass {
        background-color: hsla(0, 0%, 100%, 0.7) !important;
        backdrop-filter: saturate(200%) blur(15px);
      }
      body {
          font-family: 'Nunito', sans-serif;
          background-image: url("/wallpaper.jpg");
          background-color: #2d3748;
          background-repeat: no-repeat;
          background-size: cover;
      }
      .box {
        display: flex;
        align-items: center;
        justify-content: center;
      }
    </style>
  @foreach($restaurants as $restaurant)

  <div class="card bg-glass" style="width: 18rem; display: inline-block; margin-left: 0.6rem;">
    <div class="card-body">
      <h5 class="card-title"> {{$restaurant['Nom']}}</h5>
      <p class="card-text">{{$restaurant['description']}}</p>
      <a href="{{route('restaurants.show', ['id' => $restaurant->id])}}" class="btn btn-primary box">Choisir ce restaurant</a>
    </div>
  </div>
  @endforeach
  
</body>
  @endsection