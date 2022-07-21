@extends('layouts.layout2')
 
@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add user</h1>
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
      <form method="post" action="{{ route('users.store') }}">
          @csrf
          <div class="form-group">    
              <label for="user_name">user Name:*</label>
              <input type="text" class="form-control" name="name"/>
          </div>
 
          <div class="form-group">
              <label for="email">email:*</label>
              <input type="text" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="paswword">mdp</label>
              <input type="password" class="form-control" name="password"/>
          </div>
          <div class="form-group">
              <label for="role">role</label>
              <input type="text" class="form-control" name="role"/>
          </div>
 
         
          <button type="submit" class="btn btn-primary">Ajouter user</button>
      </form>
  </div>
</div>
</div>
@endsection
