<x-app>
    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 text-center">
                <h1>Aggiungi un Libro</h1>
            </div>
        </div>
        
        <form class="mt-3" action="{{ route('authors.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label for="InputName" class="form-label">Nome dell'autore</label>
                <input type="text" class="form-control" id="InputName" name="firstname">
                @error('firstname')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-text">il campo "nome dell'autore" è obbligatorio.</div>
            </div>
            
            <div class="mb-3">
                <label for="InputName2" class="form-label">cognome dell'autore</label>
                <input type="text" class="form-control" id="InputName2" name="lastname">
                {{-- @error('lastname')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror --}}
            </div>
            
            <button type="submit" class="btn btn-primary">Salva</button>
            
        </form>
    </div>
    
    <x-footer/>
</x-app>