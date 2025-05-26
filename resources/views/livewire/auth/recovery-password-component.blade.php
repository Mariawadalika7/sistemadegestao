@section('title', 'CentroMulticerviços - Recuperar senha')

<div>
   <div  class="login-container">
                <div class="logo">
                    <span class="logo-icon">⚡</span>
                    CentroMultisserviços
                </div>

                <div>
                    <h1>Recuperar senha!</h1>
                </div>

            <form>

            <div style='{{is_bool(!$isVerified) ? "display:none !important;" : "" }}' class="form-floating mb-2">
            <input wire:model="verificationCode" type="number" min="1" class="form-control" id="floatingInput" />
            <label for="floatingInput">Codigo de recuperação:</label>
            @error('verificationCode') <span class='text-danger'>{{ $message }}</span> @enderror
           </div>

          <div style='{{is_bool(!$isVerified) ? "display:none !important;" : "" }}' class="form-floating mb-2">
            <input wire:model="newPassword" type="password"  class="form-control" id="floatingInput" />
            <label for="floatingInput">Nova senha:</label>
            @error('newPassword') <span class='text-danger'>{{ $message }}</span> @enderror
          </div>

          <div style='{{is_bool(!$isVerified) ? "display:none !important;" : "" }}' class="form-floating mb-2 ">
            <input wire:model="confirmNewPassword" type="password"  class="form-control" id="floatingInput" />
            <label for="floatingInput">Confirmar senha:</label>
            @error('confirmNewPassword') <span class='text-danger'>{{ $message }}</span> @enderror
          </div>

         <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" wire:model="email"  />
                    @error('email')<span class='text-danger'>{{$message}}</span>@enderror
         </div>              

         <div>
                <button      
                        wire:click.prevent='recoverPassword()'                
                        class="login-button">
                        Recuperar
                </button>
        </div>                 
                   
        <div style='{{is_bool(!$isVerified) ? "display:none !important;" : "" }}' class="">
           <button  wire:click='finishResetPassword' class="recover-password-button">
             Atualizar
           </button>
       </div>

        </form>

        <div style="text-align: center; margin-top: 10px;">
          <a href="{{ route('login') }}">Fazer login</a>
        </div>
        
               
               
    </div>


</div>
