<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">GoodFood</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          @if (Auth::check())
          <a class="nav-link active" aria-current="page" href="/logout">Log out</a>  
          @endif 
        </li>
        <li> <a class="nav-item nav-link" href="register"  > @if (Auth::check())
@else
    Créer un compte
@endif</a></li>
        <li><a class="nav-item nav-link" href="login" > @if (Auth::check())
@else
    Connexion
@endif</a> </li>
        
    
       
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
  @foreach($restaurants as $restaurant)
 

  <div class="card" style="width: 18rem; display: inline-block;">
  
  <div class="card-body">
    <h5 class="card-title"> {{$restaurant['Nom']}}</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    @if (Auth::check())
    <a href="{{route('restaurants.show', ['id' => $restaurant->id])}}" class="btn btn-primary">Choisir ce restaurant</a>
    @else
  <a href="login" class="btn btn-primary">Choisir ce restaurant</a>                                                                                                                                                                                                                                                                                                                                                                                             
    @endif
    
  </div>
</div>
  @endforeach
  </body>