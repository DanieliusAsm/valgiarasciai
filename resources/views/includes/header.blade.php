<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand">Closed Beta</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li @if(Route::currentRouteName()=="user")class="active"@endif><a href="{{route("user")}}">Vartotojai <span class="sr-only">(current)</span></a></li>
        <li @if(Route::currentRouteName()=="products")class="active"@endif><a href="{{route("products")}}">Produktai</a></li>
        <li @if(Route::currentRouteName()=="calculator")class="active"@endif><a href="{{route("calculator")}}">Skaičiuoklė</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->username }} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('account') }}">Profilis</a></li>
          </ul>
        </li>
        <li><a href="{{ route('logout') }}">Atsijungti</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>