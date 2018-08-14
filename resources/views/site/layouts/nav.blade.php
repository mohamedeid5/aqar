<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ route('home') }}">{{ settings()->site_name_en }}</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      @auth
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ auth()->user()->name }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('profile.index') }}">Profile</a>
          <a class="dropdown-item" href="{{ route('item.index') }}">Items</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
        </div>
      </li>
        <li class="nav-item">
        <a href="{{ route('item.create') }}" class="btn btn-info">Add Item</a>
      </li>
      @endauth
      @guest
      <li class="nav-item">
        <a href="{{ route('login') }}" class="nav-link">Login</a>
      </li>
       <li class="nav-item">
        <a href="{{ route('register') }}" class="nav-link">Register</a>
      </li>
      <li class="nav-item">
        <a href="{{ route('item.create') }}" class="btn btn-info">Add Item</a>
      </li>
      @endguest
      @foreach(\App\Category::all() as $cat)
         <li class="nav-item">
        <a href="{{ url('category/'.$cat->slug) }}" class="nav-link">{{ $cat->cat_name }}</a>
      </li>
      @endforeach
    </ul>
   
  </div>
</nav>