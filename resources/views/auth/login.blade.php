<x-app>
    
    <div class="container py-5">
        <form action="/login" method="POST">
            @csrf
                
            </div>
            <div class="mb-3">
                <label for="InputEmail" class="form-label">Email Utente</label>
                <input type="email" class="form-control" id="InputEmail" name="email">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                
            </div>
            <div class="mb-3">
                <label for="InputPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="InputPassword" name="password">
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                
            </div>
            
            <button type="submit" class="btn btn-primary">Accedi</button>
        </form>
    </div>
    
</x-app>