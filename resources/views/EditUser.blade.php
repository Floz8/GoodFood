@extends('layouts.layout2') 
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Edition du user</h1>
 
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('users.update', $user->id) }}">
            @method('POST') 
            @csrf
            <div class="form-group">
 
                <label for="Nom">Nom du user:*</label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}" />

                <label for="prix">email de user:*</label>
                <input type="text" class="form-control" name="email" value="{{ $user->email }}" />

                <label for="prix">mot de passe de user:*</label>
                <input type="password" class="form-control" name="password" value="{{ $user->password }}" />

                <label for="id">role de user:*</label>
                <input type="text" class="form-control" name="role" value="{{ $user->role}}" />
            </div>
 
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
</div>
@endsection