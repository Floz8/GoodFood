@extends('layouts.layout2')
 
@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add plat</h1>
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
      <form method="post" action="{{ route('plats.store') }}">
          @csrf
          <div class="form-group">    
              <label for="plat_name">Plat Name:*</label>
              <input type="text" class="form-control" name="Nom"/>
          </div>
 
          <div class="form-group">
              <label for="ticket">prix:*</label>
              <input type="text" class="form-control" name="prix"/>
          </div>
 
         
          <button type="submit" class="btn btn-primary">Ajouter plat</button>
      </form>
  </div>
</div>
</div>
@endsection
