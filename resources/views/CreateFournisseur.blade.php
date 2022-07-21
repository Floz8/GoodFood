@extends('layouts.layout2')
 
@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add Fournisseur</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('fournisseurs.store') }}">
          @csrf
          <div class="form-group">    
              <label for="raison_sociale">fournisseur Name:*</label>
              <input type="text" class="form-control" name="raison_sociale"/>
          </div>
 
          <button type="submit" class="btn btn-primary" href="RestaurantManager">Add Fournisseur</button>
      </form>
  </div>
</div>
</div>
@endsection