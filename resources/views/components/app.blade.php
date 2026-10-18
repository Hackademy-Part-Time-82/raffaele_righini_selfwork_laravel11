<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Library Project</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('books.index') }}">Library RR</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link " href="{{ route('books.index') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('books.create') }}">Crea Libro</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('authors.index') }}">Lista Autori</a>
          </li>
        </ul>
      </div>
    </div>
    <div>
      @auth
      <div class="container-fluid d-flex align-items-center gap-3 text-nowrap">
        <div class="navbar-text d-flex align-items-center py-0">
          <i class="bi bi-person-circle fs-4 me-2"></i>
          <div class="lh-sm">
            Ciao, <strong>{{ Auth::user()->name }}</strong>
            <small class="d-block text-body-secondary">
              <i class="bi bi-envelope me-1"></i>{{ Auth::user()->email }}
            </small>
          </div>
        </div>
        @if (request()->routeIs('user.profile'))
        <a href="{{ route('books.index') }}" class="btn btn-outline-primary btn-sm">
          <i class="bi bi-book me-1"></i>Tutti i Libri
        </a>
        @else
        <a href="{{ route('user.profile') }}" class="btn btn-outline-primary btn-sm">
          <i class="bi bi-book me-1"></i>I miei Libri
        </a>
        @endif
        <form action="/logout" method="POST" class="m-0">
          @csrf
          <button type="submit" class="btn btn-outline-danger btn-sm">
            <i class="bi bi-box-arrow-right me-1"></i>Esci
          </button>
        </form>
      </div>
      @endauth
      
      @guest
      <div class="container-fluid d-flex gap-2 text-nowrap">
        <a href="/login" class="btn btn-outline-primary btn-sm">
          <i class="bi bi-box-arrow-in-right me-1"></i>Accedi
        </a>
        <a href="/register" class="btn btn-primary btn-sm">
          <i class="bi bi-person-plus me-1"></i>Registrati
        </a>
      </div>
      @endguest
    </div>
  </nav>
  
  <main>
    <div class="container mt-5">

      {{ $slot }}
    </div>
  </main>
</body>
</html>