@extends('layouts.layout2') 
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Edition du fournisseur</h1>
 
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
        <form method="post" action="{{ route('fournisseurs.update', $fournisseur->id) }}">
            @method('POST') 
            @csrf
            <div class="form-group">
 
                <label for="raison_sociale">Nom du fournisseur:*</label>
                <input type="text" class="form-control" name="raison_sociale" value="{{ $fournisseur->Nom }}" />

            </div>
 
            <button type="submit" class="btn btn-primary" style="margin-top:2rem;">Mettre à jour</button>
        </form>
    </div>
</div>
@endsection