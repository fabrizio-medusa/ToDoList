<nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">LOGO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href=" {{ route ('homepage') }} ">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route ('contacts.form') }}">Contatti</a>
        </li>
      </ul>
        @auth
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Ciao <strong>{{ auth()->user()->name }}</strong>!
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  @if(Auth::user()->role === 'admin')
                  <li><a class="dropdown-item"
                    href="{{route('admin.dashboard')}}">Dashboard Amministratore</a></li>
                  <li><hr class="dropdown-divider"></li>
                  @endif
                  <li><a class="dropdown-item"
                    href="{{route('todo')}}">ToDoList</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <form action="/logout" method="POST">
                      @csrf
                      <button class="dropdown-item" type="submit">Esci</button>
                    </form>
                  </li>
                </ul>
              </li>
          </ul>
          @else
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="/login">Accedi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/register">Registrati</a>
            </li>
          </ul>
          @endauth      
    </div>
  </div>
</nav>