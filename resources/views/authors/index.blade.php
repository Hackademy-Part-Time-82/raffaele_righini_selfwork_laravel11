<x-app >
    
    <header class="text-center py-4 mb-4 border-bottom">
        <i class="bi bi-book-half display-4 text-primary"></i>
        <h1 class="display-5 fw-bold mt-2 mb-2">Libreria RR</h1>
        <p class="lead text-body-secondary mb-0">Scopri tutti gli autori dei nostri libri</p>
    </header>
    
    <a href="{{ route('authors.create') }}">crea autore</a>

    @if (session('success'))
    
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    
    @endif
    
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mb-5">
        
        @foreach ($authors as $author)
        <div class="col">
            <div class="card h-100 border-0 shadow-sm book-card">
                <div class="ratio" style="--bs-aspect-ratio: 150%;">
                    
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fs-6 fw-semibold mb-1">{{ $author['firstname'] }} {{ $author['lastname'] }}</h5>
                    <p class="card-text small text-body-secondary mb-3">
                    </p>
                
                    <div class="mt-auto d-flex flex-wrap gap-2">
                        <a href="{{ route('authors.show', ['author'=>$author]) }}" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-eye me-1"></i>Dettaglio
                        </a>
                        
                        

                                <a href="{{ route('authors.edit', ['author'=>$author]) }}" class="btn btn-outline-secondary btn-sm">
                                    <i class="bi bi-pencil me-1"></i>Modifica
                                </a>

                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#destroy-{{ $author->id }}">
                                    <i class="bi bi-trash"></i>Elimina
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="destroy-{{ $author->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Sei sicuro di voler eliminare l'autore?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('authors.destroy', ['author'=>$author]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i>Elimina
                                            </button>
                                        </form>
                                    </div>
                                    {{-- <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div> --}}
                                    </div>
                                </div>
                                </div>  

                    </div>
                    
                </div>
            </div>
        </div>
        
        @endforeach
        
    </div>
    
    
    <x-footer/>
</x-app>
