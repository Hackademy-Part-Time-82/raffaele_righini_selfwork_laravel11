<x-app :title="$title">
    
    <div class="container py-5">
        <form action="/register" method="POST">
            @csrf
            <div class="mb-3">
                <label for="InputName" class="form-label">Nome Utente</label>
                <input type="text" class="form-control" id="InputName" name="name">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                
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
            <div class="mb-3">
                <label for="InputPassword2" class="form-label">Conferma Password</label>
                <input type="password" class="form-control" id="InputPassword2" name="password_confirmation">
                @error('password_confirmation')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                
            </div>
            
            <button type="submit" class="btn btn-primary">Registrami</button>
        </form>
    </div>
    
</x-app>