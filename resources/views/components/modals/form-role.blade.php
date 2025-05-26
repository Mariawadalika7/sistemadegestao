<div wire:ignore.self class="modal fade" id="form_role" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h1 class="modal-title fs-6 text-muted text-uppercase" id="staticBackdropLabel">{{ $status ? 'Editar ' : 'Adicionar' }} role</h1>
        <button wire:click='close_modal' type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form >
            <div class='col-md-12 gap-1 d-flex align-items-start'>
              

                    <div class='form-group w-100'>
                        <label>Role:</label>
                        <input type='text' class='form-control' wire:model='role_type' />
                        @error('role_type')<span class='text-danger'>{{$message}}</span>@enderror
                    </div> 
     
            </div>
            <hr>
        

        </form>
      </div>
      <x-buttons.buttons-save-and-cancel :status="$status" />
    </div>
  </div>
</div>