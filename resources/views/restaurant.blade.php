@extends('layouts.layout2')

@section('content')
<body><h1>{{$restaurant->Nom}}</h1></body>
@foreach($restaurant->plats as $plat)
<div>{{$plat->Nom}}      {{$plat->prix}}€   <a href="{{route('restaurants.show', ['id' => $restaurant->id])}}" class="btn btn-primary">Ajouter au panier</a></div> 


@endforeach
@endsection
