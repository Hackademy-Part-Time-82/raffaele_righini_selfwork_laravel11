<x-app>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 text-center">
                <h1>Modifica Libro</h1>
            </div>
        </div>

        <form class="mt-4" action="{{ route('books.update', ['book' => $book]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-4 justify-content-center">

                {{-- Colonna copertina --}}
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="flex-grow-1 position-relative overflow-hidden rounded-top bg-body-tertiary" style="min-height: 220px;">
                            <x-image-book :$book id="coverPreview" class="position-absolute top-0 start-0 w-100 h-100 object-fit-contain p-2"/>
                        </div>
                        <div class="card-body flex-grow-0">
                            <label for="InputImage" class="form-label small text-body-secondary">
                                <i class="bi bi-image me-1"></i>Cover del libro
                            </label>
                            <input type="file" class="form-control form-control-sm" id="InputImage" name="image">
                            @error('image')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Colonna campi del form --}}
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="mb-3">
                        <label for="InputName" class="form-label">Nome del libro</label>
                        <input type="text" class="form-control" id="InputName" name="name" value="{{ $book->name }}">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="InputName" class="form-label">Autore del libro</label>
                        <select class="form-select" aria-label="Default select example" name="author_id">
                            <option value="" @if('author_id' == null) selected @endif>-- Autore sconosciuto --</option>
                            @foreach ($authors as $author)       
                                <option value="{{ $author->id }}" @selected($book->author_id == $author->id)>{{ $author->firstname }} {{ $author->lastname }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="InputPages" class="form-label">Numero pagine del libro</label>
                        <input type="text" class="form-control" id="InputPages" name="pages" value="{{ $book->pages }}">
                        @error('pages')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="InputYear" class="form-label">Anno del libro</label>
                        <input type="text" class="form-control" id="InputYear" name="year" value="{{ $book->year }}">
                        @error('year')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg me-1"></i>Salva
                    </button>
                </div>

            </div>
        </form>
    </div>

    <x-footer/>

    {{-- javascript per vedere l'anteprima di un eventuale modifica dell'immagine --}}
    <script>
        const InputImage= document.getElementById('InputImage');
        const coverPreview= document.getElementById('coverPreview');
        const originalSrc= coverPreview.src;

        InputImage.addEventListener('change', () =>{
            const file= InputImage.files[0];
            if(!file || !file.type.startsWith('image/')){
                coverPreview.src=originalSrc;
                return;
            }
            coverPreview.src=URL.createObjectURL(file);
        })
    </script>
</x-app>
