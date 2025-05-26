<div class="modal-footer">
        <button 
            type="button"
            class="btn btn-secondary text-uppercase"
            data-bs-dismiss="modal">
           Fechar
        </button>

        <button 
            wire:click="{{($status) ? 'update' : 'save' }}"         
            class="btn text-uppercase {{($status) ? 'btn-success' : 'btn-primary'}} ">{{($status) ? 'Atualizar' : 'Salvar'}}             
        </button>

      </div>