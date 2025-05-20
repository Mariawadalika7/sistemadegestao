@section('title', 'CentroMulticerviços - Login')
<div>
   <div class="login-container">
                <div class="logo">
                    <span class="logo-icon">⚡</span>
                    CentroMultisserviços
                </div>

                <div>
                    <h1>Bem-vindo de volta!</h1>
                    <p class="subtitle">Acesse sua conta para gerenciar o sistema</p>
                </div>

            <form wire:submit='signIn'>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" wire:model="email"  />
                    @error('email')<span class='text-danger'>{{$message}}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="password">Senha</label>
                    <input id="password" type="password" wire:model="password" />
                    @error('password')<span class='text-danger'>{{$message}}</span>@enderror
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
                    <div class="remember-me">
                        <input id="remember_me" type="checkbox" name="remember">
                        <label for="remember_me">Lembrar-me</label>
                    </div>
                </div>

                <div>
                    <button                       
                        class="login-button">
                        Entrar no Sistema
                    </button>
                </div>
                 
                   <div id='forgot_password'>
                        <span>Esqueçeu a sua senha? </span><a href='{{ route('user.recover.password') }}'>clique aqui para recuperar</a>
                    </div>
            </form>
               
                <div class="register">
                  
                    Não tem uma conta?
                    <a href="{{ route('user.sign.up') }}">
                        Cadastre-se
                    </a>
                </div>
    </div>


</div>
