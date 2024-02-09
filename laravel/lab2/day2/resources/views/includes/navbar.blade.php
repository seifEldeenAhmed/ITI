<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{URL()->current()=='http://127.0.0.1:8000/home'? 'active':''}}" aria-current="page" href="{{route('users.home')}}">Home</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle {{URL()->current()=='http://127.0.0.1:8000/users/create'||URL()->current()=='http://127.0.0.1:8000/users'? 'active':''}}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            User
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item {{URL()->current()=='http://127.0.0.1:8000/users/create'? 'active':''}}" href="{{route('users.create')}}">User Add</a></li>
            <li><a class="dropdown-item {{URL()->current()=='http://127.0.0.1:8000/users'? 'active':''}}" href="{{route('users.index')}}">User List</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>