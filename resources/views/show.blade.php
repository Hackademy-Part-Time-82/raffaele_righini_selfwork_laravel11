<x-app>
    
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">
                <a href="{{ route('books.index') }}" class="text-secondary fw-semibold text-decoration-none px-0 mb-2">
                <i class="bi bi-arrow-left me-1"></i>Torna alla lista libri
            </a>
                <div class="row g-4 align-items-start">
                    
                    {{-- Colonna immagine --}}
                    <div class="col-12 col-md-4">
                        <div class="card border-0 shadow-sm bg-light p-3 text-center">
                            <x-image-book :$book/>
                        </div>
                    </div>
                    
                    {{-- Colonna informazioni --}}
                    <div class="col-12 col-md-8">
                        <span class="badge rounded-pill text-bg-secondary text-uppercase mb-2">Libro</span>
                        
                        <h1 class="h3 fw-bold mb-1">{{ $book->name }}</h1>
                        <p class="fs-6 text-body-secondary mb-3">
                            di <span class="fw-semibold text-body">{{ $book->author?->firstname ?? 'Autore sconosciuto' }} {{ $book->author?->lastname }}</span>
                        </p>
                        {{-- se fossero dati nullable, quindi non obbligatori, potremmo scrivere {{ $book->author ?? 'Anno non definito'}} per evitare di lasciare il campo vuoto --}}
                        
                        <hr class="my-3">
                        
                        <h2 class="h6 text-uppercase text-body-secondary fw-semibold mb-3">Dettagli prodotto</h2>
                        
                        <ul class="list-group list-group-flush border rounded-3 shadow-sm">
                            <li class="list-group-item d-flex justify-content-between align-items-center py-2">
                                <span class="text-body-secondary">Titolo</span>
                                <span class="fw-semibold text-end">{{ $book->name }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center py-2">
                                <span class="text-body-secondary">Autore</span>
                                <span class="fw-semibold text-end">{{ $book->author?->firstname ?? 'Autore sconosciuto' }} {{ $book->author?->lastname }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center py-2">
                                <span class="text-body-secondary">Anno di pubblicazione</span>
                                <span class="fw-semibold">{{ $book->year }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center py-2">
                                <span class="text-body-secondary">Numero di pagine</span>
                                <span class="badge text-bg-light border fw-semibold">{{ $book->pages }} pagine</span>
                            </li>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
    <x-footer/>
</x-app>