<x-app>

    <header class="text-center py-4 mb-4 border-bottom">
        <i class="bi bi-people-fill display-4 text-primary"></i>
        <h1 class="display-5 fw-bold mt-2 mb-2">I nostri autori</h1>
        <p class="lead text-body-secondary mb-0">Scopri tutti gli autori dei libri della Libreria RR</p>
    </header>

    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
        <span class="text-body-secondary">
            <i class="bi bi-person-lines-fill me-1"></i><strong class="text-body">{{ $authors->count() }}</strong> autori in catalogo
        </span>
        <a href="{{ route('authors.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-person-plus me-1"></i>Nuovo autore
        </a>
    </div>

    @if ($authors->isNotEmpty())
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mb-5">

        @foreach ($authors as $author)
        <div class="col">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden book-card">
                <div class="author-hero text-center pt-4 pb-3 px-3">
                    {{-- Iniziali di nome e cognome (il cognome può mancare) --}}
                    <div class="author-avatar author-avatar-sm rounded-circle text-white fw-bold d-flex align-items-center justify-content-center shadow mx-auto mb-3">
                        {{ mb_strtoupper(mb_substr($author->firstname, 0, 1) . mb_substr($author->lastname ?? '', 0, 1)) }}
                    </div>
                    <h2 class="h6 fw-bold mb-1">{{ $author->firstname }} {{ $author->lastname }}</h2>
                    <span class="badge rounded-pill text-bg-light border">
                        <i class="bi bi-book me-1 text-primary"></i>{{ $author->books_count }} {{ $author->books_count == 1 ? 'libro' : 'libri' }}
                    </span>
                </div>

                <div class="card-body d-flex flex-column pt-2">
                    <a href="{{ route('authors.show', ['author' => $author]) }}" class="btn btn-outline-primary btn-sm w-100 mt-auto">
                        <i class="bi bi-eye me-1"></i>Dettaglio
                    </a>
                </div>

                @auth
                <div class="card-footer bg-body border-top d-flex justify-content-center gap-2">
                    <a href="{{ route('authors.edit', ['author' => $author]) }}" class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-pencil me-1"></i>Modifica
                    </a>
                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#destroy-{{ $author->id }}">
                        <i class="bi bi-trash me-1"></i>Elimina
                    </button>
                </div>
                @endauth
            </div>

            @auth
            <!-- Modal -->
            <div class="modal fade" id="destroy-{{ $author->id }}" tabindex="-1" aria-labelledby="destroyLabel-{{ $author->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="destroyLabel-{{ $author->id }}">Sei sicuro di voler eliminare l'autore?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('authors.destroy', ['author' => $author]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash me-1"></i>Elimina
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endauth
        </div>
        @endforeach

    </div>
    @else
    <div class="author-empty text-center text-body-secondary rounded-4 py-5 mb-5">
        <i class="bi bi-person-x display-5 d-block mb-2"></i>
        Nessun autore ancora inserito.
        <div class="mt-3">
            <a href="{{ route('authors.create') }}" class="btn btn-outline-primary btn-sm">
                <i class="bi bi-person-plus me-1"></i>Aggiungi il primo autore
            </a>
        </div>
    </div>
    @endif

    <x-footer/>
</x-app>
