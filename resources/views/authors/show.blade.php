<x-app>

    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-9">

            <a href="{{ route('authors.index') }}" class="btn btn-link fw-semibold text-decoration-none px-0 mb-3">
                <i class="bi bi-arrow-left me-1"></i>Torna alla lista autori
            </a>

            {{-- Card autore --}}
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-5">
                <div class="author-hero p-4 p-md-5">
                    <div class="d-flex flex-column flex-sm-row align-items-center gap-4 text-center text-sm-start">
                        {{-- Iniziali di nome e cognome (il cognome può mancare) --}}
                        <div class="author-avatar rounded-circle text-white fw-bold d-flex align-items-center justify-content-center shadow flex-shrink-0">
                            {{ mb_strtoupper(mb_substr($author->firstname, 0, 1) . mb_substr($author->lastname ?? '', 0, 1)) }}
                        </div>
                        <div class="flex-grow-1">
                            <span class="badge rounded-pill text-bg-primary text-uppercase mb-2">
                                <i class="bi bi-feather me-1"></i>Autore
                            </span>
                            <h1 class="display-6 fw-bold mb-1">{{ $author->firstname }} {{ $author->lastname }}</h1>
                            <p class="text-body-secondary mb-0">Scopri tutti i suoi libri presenti nella Libreria RR</p>
                        </div>
                    </div>
                </div>

                <div class="card-body border-top p-0">
                    <div class="row g-0 text-center">
                        <div class="col-4 py-3 border-end">
                            <div class="fs-4 fw-bold text-primary">{{ $author->books->count() }}</div>
                            <div class="small text-body-secondary text-uppercase">Libri</div>
                        </div>
                        <div class="col-4 py-3 border-end">
                            <div class="fs-4 fw-bold text-primary">{{ $author->books->min('year') ?? '-' }}</div>
                            <div class="small text-body-secondary text-uppercase">Primo libro</div>
                        </div>
                        <div class="col-4 py-3">
                            <div class="fs-4 fw-bold text-primary">{{ $author->books->sum('pages') }}</div>
                            <div class="small text-body-secondary text-uppercase">Pagine totali</div>
                        </div>
                    </div>
                </div>
            </div>


            {{-- Libri dell'autore --}}
            <h2 class="h5 fw-semibold mb-3">
                <i class="bi bi-book me-2 text-primary"></i>Libri di {{ $author->firstname }} {{ $author->lastname }}
            </h2>

            @if ($author->books->isNotEmpty())
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4 mb-5">
                @foreach ($author->books as $book)
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm book-card">
                        <div class="ratio" style="--bs-aspect-ratio: 150%;">
                            <x-image-book :$book class="object-fit-cover"/>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h3 class="card-title fs-6 fw-semibold mb-1">{{ $book->name }}</h3>
                            <p class="small text-body-secondary mb-3">
                                <i class="bi bi-calendar3 me-1"></i>{{ $book->year }} · <i class="bi bi-file-text me-1"></i>{{ $book->pages }} pag.
                            </p>
                            <a href="{{ route('books.show', ['book' => $book]) }}" class="btn btn-outline-primary btn-sm mt-auto">
                                <i class="bi bi-eye me-1"></i>Dettaglio
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="author-empty text-center text-body-secondary rounded-4 py-5 mb-5">
                <i class="bi bi-journal-x display-5 d-block mb-2"></i>
                Nessun libro di questo autore per ora.
            </div>
            @endif

        </div>
    </div>

    <x-footer/>
</x-app>
