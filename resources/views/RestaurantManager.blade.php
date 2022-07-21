<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">GoodFood</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/logout">Log out</a>
        </li>
        <a class="nav-link active" aria-current="page" href="{{route('panier.show', ['id' => Auth::id()])}}" >Panier</a>
        
       
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>


</nav>


<body>

 


 
</div>
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Vue de tous les restaurants</h1>
    <div>
    <a href="/CreateResto" class="btn btn-primary mb-3">Ajouter un restaurant</a>
    </div>     
    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Nom du restaurant</td>
          <td>Descritpion du restaurant</td>
          <td>Editer le nom</td>
          <td>restaurant Value</td>
        </tr>
    </thead>
    <tbody>
        @foreach($restaurants as $restaurant)
        <tr>
            <td>{{$restaurant->id}}</td>
            <td>{{$restaurant->Nom}} </td>
            <td>{{$restaurant->description}} </td>
            <td>
                <a href="{{route('restaurants.goToEdit', ['id' => $restaurant->id])}}">Edit</a>
            </td>
            <td>
                
                  @csrf
    
                <a href="{{route('restaurants.delete', ['id' => $restaurant->id])}}" class="btn btn-danger">Effacer</a>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
  </body>