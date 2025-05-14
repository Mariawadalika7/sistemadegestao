<div>
    @section('title', 'CentroMulticerviços - Criar conta')
    <div class="register-container">
        <div class="logo">
            <span class="logo-icon">⚡</span>
            ElectroManager
        </div>
        <h1>Crie sua conta</h1>
        <p class="subtitle">Preencha os campos abaixo para se cadastrar</p>
        
        <main>
            <!-- Name -->
            <div class="form-group">
                <label for="name">Nome</label>
                <input id="name" type="text" wire:model="fullname"  required autofocus autocomplete="name">
                @error('fullname')<div class="error-message">{{ $message }}</div> @enderror                    
               
            </div>

             <div class="form-group">
                <label for="name">Data de nascimento</label>
                <input id="name" type="date" wire:model="birthday" required autofocus autocomplete="name">
                @error('birthday') <div class="error-message">{{ $message }}</div> @enderror
            </div>                  
               

            <div class="form-group">
                <label for="name">Número de telefone</label>
                <input id="name" type="text" wire:model='phone_number' required autofocus autocomplete="name">
                @error('phone_number')<div class="error-message">{{ $message }}</div>@enderror
            </div>                   
                

            <div class="form-group">
                <label for="name">Endereço</label>
                <input id="name" type="text" wire:model='address' required autofocus autocomplete="name">
                @error('address') <div class="error-message">{{ $message }}</div>@enderror
            </div>      
            

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" wire:model="email" required autocomplete="username">
                @error('email')<div class="error-message">{{ $message }}</div> @enderror
            </div>                    
               
            <!-- Password -->
            <div class="form-group">
                <label for="password">Senha</label>
                <input id="password" type="password" wire:model="password" required autocomplete="new-password">
                @error('password')<div class="error-message">{{ $message }}</div> @enderror
            </div>
            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation">Confirmar Senha</label>
                <input id="password_confirmation" type="password" wire:model="password_confirmation" required autocomplete="new-password">
                @error('password_confirmation') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <button wire:click='sign_up' class="register-button">Cadastrar</button>    
            <div class="login-link"> Já tem uma conta?<a href="{{ route('login') }}">Faça login </a> </div>            
        </main>
            
    </div>
</div>
