<div wire:ignore.self class="modal fade" id="form_enterprise" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h1 class="modal-title fs-6 text-muted text-uppercase" id="staticBackdropLabel">{{ $status ? 'Editar ' : 'Adicionar' }} dados da empresa</h1>
        <button wire:click='close_modal' type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form >
            <div class='col-md-12 gap-1'>
              

                    <div class='form-group w-100'>
                        <label>Nome:</label>
                        <input type='text' class='form-control' wire:model='enterprise_name' />
                        @error('enterprise_name')<span class='text-danger'>{{$message}}</span>@enderror
                    </div> 

                     <div class='form-group w-100'>
                        <label>Telefone:</label>
                        <input type='tel' class='form-control' wire:model='enterprise_phone_number' />
                        @error('enterprise_phone_number')<span class='text-danger'>{{$message}}</span>@enderror
                    </div> 

                      <div class='form-group w-100'>
                        <label>Email:</label>
                        <input type='email' class='form-control' wire:model='enterprise_email' />
                        @error('enterprise_email')<span class='text-danger'>{{$message}}</span>@enderror
                    </div> 

                      <div class='form-group w-100'>
                        <label>Endereço:</label>
                        <input type='text' class='form-control' wire:model='enterprise_address' />
                        @error('enterprise_address')<span class='text-danger'>{{$message}}</span>@enderror
                    </div> 

                       <div class='form-group w-100'>
                        <label>Logotipo:</label>
                        <input class='form-control' wire:model='enterprise_logo' type='file' accept="image/*" />
                        @error('enterprise_logo')<span class='text-danger'>{{$message}}</span>@enderror
                    </div> 
     
            </div>
            <hr>
        

        </form>
      </div>
      <x-buttons.buttons-save-and-cancel :status="$status" />
    </div>
  </div>
</div>