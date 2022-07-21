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
<div class="card-body">
    <h5 class="card-title"> Gestion des Restaurants</h5>
    <a href="/RestaurantManager" class="btn btn-primary">Aller</a>
  </div>
</div>
<div class="card-body">
    <h5 class="card-title"> Gestion des Fournisseurs</h5>
    <a href="" class="btn btn-primary">Aller</a>
  </div>
</div>
<div class="card-body">
    <h5 class="card-title"> Voir les commandes</h5>
    <a href="" class="btn btn-primary">Aller</a>
  </div>
</div>
<div class="card-body">
    <h5 class="card-title"> Voir les plats</h5>
    <a href="" class="btn btn-primary">Aller</a>
  </div>
</div>
  </body>