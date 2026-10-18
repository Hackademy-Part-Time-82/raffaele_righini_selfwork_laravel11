<x-app>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mt-4 mb-5">

        @foreach ($books as $book)
        <div class="col">
            <div class="card h-100 border-0 shadow-sm book-card">
                <div class="ratio" style="--bs-aspect-ratio: 150%;">
                    <x-image-book :$book class="object-fit-cover"/>
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fs-6 fw-semibold mb-1">{{ $book['name'] }}</h5>
                    <p class="card-text small text-body-secondary mb-3">
                        <i class="bi bi-person me-1"></i>{{ $book->author?->firstname ?? 'Autore sconosciuto' }} {{ $book->author?->lastname }}
                    </p>
                    <div class="mt-auto">
                        <a href="{{ route('books.show', ['book'=>$book]) }}" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-eye me-1"></i>Dettaglio
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

    </div>

</x-app>
