<?php

namespace App\Livewire\Adm;

use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
class RoleComponent extends Component
{
    #[Layout('layouts.admin.app')] 
    protected $listeners = ['confirmRoleDeletion' =>'confirmRoleDeletion'];
    public $uuid,$startdate,$enddate,$searcher,$available_default_roles = [],$role,$role_type,$status,$role_tb;
   
   protected $rules = ['role_type' => 'required|unique:roles'];
   protected $messages = ['role_type.required' => 'Campo obrigatório*', 'role_type.unique' => 'O role já está sendo usado'];

   public function mount (Role $role_tb) {
    try {
        $this->role_tb = $role_tb;
        $this->available_default_roles = ['admin', 'Admin','employee', 'Employee', 'customer','Customer'];
    } catch (\Throwable $th) {
         LivewireAlert::title('Erro')
            ->text('erro: ' .$th->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->show();
    }
   }
   
   public function render()
    {
        return view('livewire.adm.role-component', [
            'roles' =>$this->getRoles()
        ]);
    }

    public function getRoles () {
        try {
            if ($this->startdate && $this->enddate) {
                return Role::query()->where(function($q) {                    
                        $q->whereBetween('created_at', [$this->startdate,$this->enddate])->latest()->get();
                    });                    
            }else{
                return Role::query()->latest()->get();
            }
           
        } catch (\Throwable $th) {
          LivewireAlert::title('Erro')
            ->text('erro: ' .$th->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->show();
        }
    }

    public function save (Role $role_tb) {
        $this->validate();
        try {
            DB::beginTransaction();
            $role_tb::query()->create(['role_type' =>$this->role_type]);
            DB::commit();
            LivewireAlert::title('SUCESSO')
            ->text('Role salva com sucesso!')
            ->success()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->show();
            $this->resetValidation();
            $this->reset(['role_type']);
        } catch (\Throwable $th) {
        LivewireAlert::title('Erro')
            ->text('erro: ' .$th->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->show();
        }
    }

    public function edit  ($uuid, Role $role_tb) {
        try {
            $this->uuid = $uuid;           
            $this->status = true;
            $this->role = $role_tb::query()->find($uuid);
            $this->role_type = $this->role->role_type;

        } catch (\Throwable $th) {
            LivewireAlert::title('Erro')
            ->text('erro: ' .$th->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->show();
        }
    }

    public function update () {
        try {
         DB::beginTransaction();
         $this->role_tb->find($this->uuid)->update(['role_type' => $this->role_type]);
         DB::commit();
         LivewireAlert::title('SUCESSO')
            ->text('Role atualizada com sucesso!')
            ->success()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->show();
        } catch (\Throwable $th) {
        DB::rollBack();
        LivewireAlert::title('Erro')
            ->text('erro: ' .$th->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->show();
        }
    }

  

    public function close_modal () {
        try {
           $this->status = false;
           $this->resetValidation();
           $this->reset(['role_type']);
        } catch (\Throwable $th) {
            LivewireAlert::title('Erro')
            ->text('erro: ' .$th->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->show();
        }
    }

    public function delete ($uuid) {
        try {
            $this->uuid = $uuid;
            LivewireAlert::title('ATENÇÃO')
            ->text('Deseja eliminar este registo?')
            ->withConfirmButton()
            ->confirmButtonText('Confirmar')
            ->warning()
            ->withDenyButton()
            ->denyButtonText('Cancelar')
            ->withOptions(['allowOutsideClick' => false])
            ->timer('30000')
            ->onConfirm('confirmRoleDeletion')
            ->show();
        } catch (\Throwable $th) {
           LivewireAlert::title('Erro')
            ->text('erro: ' .$th->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->show();
        }
    }

    public function confirmRoleDeletion () {
        try {
            DB::beginTransaction();
            $this->role_tb::destroy([$this->uuid]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        LivewireAlert::title('Erro')
            ->text('erro: ' .$th->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->show();
        }
    }
}
