@section('title', 'CentroMulticerviços - Login')
<div>
   <div class="login-container">
        <div class="logo">
            <span class="logo-icon">⚡</span>
            CentroMultisserviços
        </div>

        <h1>Bem-vindo de volta!</h1>
        <p class="subtitle">Acesse sua conta para gerenciar o sistema</p>



            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" wire:model="email" required  />
                @error('email')<span class='text-danger'>{{$message}}</span>@enderror
            </div>


            <div class="form-group">
                <label for="password">Senha</label>
                <input id="password" type="password" wire:model="password" required />
                @error('password')<span class='text-danger'>{{$message}}</span>@enderror
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
                <div class="remember-me">
                    <input id="remember_me" type="checkbox" name="remember">
                    <label for="remember_me">Lembrar-me</label>
                </div>
            </div>

            <button
                wire:click='sign_in'
                class="login-button">
                Entrar no Sistema
            </button>

            <div class="register">
                Não tem uma conta?
                <a href="{{ route('user.sign.up') }}">
                    Cadastre-se
                </a>
            </div>

    </div>

</div>
