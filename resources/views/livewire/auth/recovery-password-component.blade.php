@section('title', 'CentroMulticerviços - Recuperar senha')
<div>
   <div class="login-container">
                <div class="logo">
                    <span class="logo-icon">⚡</span>
                    CentroMultisserviços
                </div>

                <div>
                    <h1>Recuperar senha!</h1>
                </div>

            <form>

            <div style='display:none;' class="form-floating mb-2">
            <input wire:model="verificationCode" type="number" min="1" class="form-control" id="floatingInput" />
            <label for="floatingInput">Codigo de recuperação:</label>
            @error('verificationCode') <span class='text-danger'>{{ $message }}</span> @enderror
           </div>

          <div style='display:none;' class="form-floating mb-2 {{ !$isVerified ? 'd-none' : 'd-block' }}">
            <input wire:model="newPassword" type="password"  class="form-control" id="floatingInput" />
            <label for="floatingInput">Nova senha:</label>
            @error('newPassword') <span class='text-danger'>{{ $message }}</span> @enderror
          </div>

          <div style='display:none;' class="form-floating mb-2 {{ !$isVerified ? 'd-none' : 'd-block' }}">
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
                        class="login-button">
                        Recuperar
                </button>
        </div>                 
                   
        </form>

         <div  style='display:none;'  class="{{ !$isVerified ? 'd-none' : 'd-block' }}">
            <button  wire:click='finishResetPassword' class="recover-password-button">
              Atualizar
            </button>
        </div>
               
               
    </div>


</div>
