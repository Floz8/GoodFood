@extends('layouts.layout2')

@section('content')
<style>
      .bg-glass {
        background-color: hsla(0, 0%, 100%, 0.7) !important;
        backdrop-filter: saturate(200%) blur(20px);
      }
      .bg-glass-title {
        background-color: hsla(0, 0%, 100%, 0.7) !important;
        backdrop-filter: saturate(200%) blur(1px);
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

<body>
    <div class="card" style="background-color: transparent; ">
        <div class="card-body bg-glass-title" style=" width:20rem; margin-left: 0.6rem; margin-bottom: 0.6rem;">
            <h2 class="card-title" style="text-align:center;">{{$restaurant->Nom}}</h2>
        </div>
    </div>
</body>

@foreach($restaurant->plats as $plat)
@if (Auth::check())
<div class="card bg-glass" style="width: 18rem; display: inline-block; margin-left: 0.6rem;">
    <div class="card-body">
      <h5 class="card-title"> {{$plat->Nom}}        {{$plat->prix}} €</h5>
      <a href="{{route('restaurants.show', ['id' => $restaurant->id])}}" class="btn btn-primary box">Ajouter au panier</a>
    </div>
</div>
@else
<div class="card bg-glass" style="width: 18rem; display: inline-block; margin-left: 0.6rem;">
    <div class="card-body">
      <h5 class="card-title"> {{$plat->Nom}}        {{$plat->prix}} €</h5>
      <a href="../login" class="btn btn-primary box">Ajouter au panier</a>
    </div>
</div>
@endif

@endforeach


@endsection
