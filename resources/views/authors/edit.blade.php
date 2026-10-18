<x-app>
    
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 text-center">
                <h1>Modifica Libro</h1>
            </div>
        </div>
        
        <form class="mt-4" action="{{ route('authors.update', ['author' => $author]) }}" method="post">
            @csrf
            @method('PUT')
            
            <div class="row g-4 justify-content-center">
                
                <div class="mb-3">
                    <label for="InputName" class="form-label">Nome dell'autore</label>
                    <input type="text" class="form-control" id="InputName" name="firstname" value="{{ $author->firstname }}">
                    @error('firstname')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-text">il campo "nome dell'autore" è obbligatorio.</div>
                </div>
                
                <div class="mb-3">
                    <label for="InputName2" class="form-label">cognome dell'autore</label>
                    <input type="text" class="form-control" id="InputName2" name="lastname" value="{{ $author->lastname }}">
                    {{-- @error('lastname')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror --}}
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
