<x-app>
    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 text-center">
                <h1>Aggiungi un Libro</h1>
            </div>
        </div>
        
        <form class="mt-3" action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="InputImage" class="form-label">Cover del libro</label>
                <input type="file" class="form-control" id="InputImage" name="image">
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-text">il campo per l'immagine non è obbligatorio.</div>
            </div>
            
            <div class="mb-3">
                <label for="InputName" class="form-label">Nome del libro</label>
                <input type="text" class="form-control" id="InputName" name="name">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-text">il campo titolo è obbligatorio.</div>
            </div>
            
            <div class="mb-3">
                <label for="InputName" class="form-label">Autore del libro</label>
                <select class="form-select" aria-label="Default select example" name="author_id">
                    <option value="" @selected(old("author_id") === null)>-- Autore sconosciuto --</option>
                    @foreach ($authors as $author)       
                        <option value="{{ $author->id }}">{{ $author->firstname }} {{ $author->lastname }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label for="InputPages" class="form-label">Numero pagine del libro</label>
                <input type="text" class="form-control" id="InputPages" name="pages">
                @error('pages')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-text">il campo numero pagine è obbligatorio.</div>
            </div>
            
            <div class="mb-3">
                <label for="InputYear" class="form-label">Anno del libro</label>
                <input type="text" class="form-control" id="InputYear" name="year">
                @error('year')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-text">il campo anno è obbligatorio.</div>
            </div>
            
            
            <button type="submit" class="btn btn-primary">Salva</button>
            
        </form>
    </div>
    
    <x-footer/>
</x-app>