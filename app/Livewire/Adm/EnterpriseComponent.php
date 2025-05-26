<?php

namespace App\Livewire\Adm;

use App\Models\Enterprise;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class EnterpriseComponent extends Component
{
    use WithFileUploads;
    #[Layout('layouts.admin.app')] 
    public $enterprise_uuid,$enterprise_details,$enterprise_name,$enterprise_phone_number,$enterprise_email,$enterprise_address,$enterprise_logo,$file_name,$status,$old_enderprise_logo,$enterprise_tb;
    protected $rules = ['enterprise_name' => 'required', 'enterprise_phone_number' =>'required', 'enterprise_email' =>'required', 'enterprise_address' =>'required', 'enterprise_logo' =>'required'];
    protected $messages = ['enterprise_name.required' => 'Campo obrigatório*', 'enterprise_phone_number.required' =>'Campo obrigatório*', 'enterprise_email.required' =>'Campo obrigatório*', 'enterprise_address.required' =>'Campo obrigatório*', 'enterprise_logo.required' =>'Campo obrigatório*'];
    protected $listeners = ['confirmEnterpriseDeletion' =>'confirmEnterpriseDeletion'];
    public function mount (Enterprise $enterprise_tb) {
        try {
         $this->enterprise_tb = $enterprise_tb;
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
        return view('livewire.adm.enterprise-component',[
            'enterprise' =>$this->getEnterpriseData()
        ]);
    }

    public function getEnterpriseData () {
        try {
          return Enterprise::query()->first();
        } catch (\Throwable $th) {
         LivewireAlert::title('Erro')
            ->text('erro: ' .$th->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->show();
        }
    }

    public function save () {
        $this->validate();
        DB::beginTransaction();
        try {
            if ($this->enterprise_logo) {
            $this->file_name = md5($this->enterprise_logo->getClientOriginalName()). microtime() .'.'.$this->enterprise_logo->getClientOriginalExtension();
            $this->enterprise_logo->storeAs("imgs", $this->file_name, 'public');
            }
            $this->enterprise_tb::query()->create([
             'enterprise_name' =>$this->enterprise_name,
             'phone_number' =>$this->enterprise_phone_number,
             'email' =>$this->enterprise_email,
             'address' =>$this->enterprise_address,
             'logo'  =>$this->file_name ?  $this->file_name : '',
            ]);
            DB::commit();

            LivewireAlert::title('SUCESSO')
            ->text('Dados salvos com sucesso!')
            ->success()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->show();
            $this->resetValidation();
            $this->reset(['enterprise_name', 'enterprise_phone_number','enterprise_email','enterprise_address','file_name']);
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

    public function edit($uuid) {
        try {
          $this->enterprise_uuid = $uuid;
          $this->status = true; 
          $this->enterprise_details = $this->enterprise_tb->find($this->enterprise_uuid);
          $this->enterprise_name = $this->enterprise_details->enterprise_name;
          $this->enterprise_phone_number = $this->enterprise_details->phone_number;
          $this->enterprise_email = $this->enterprise_details->email;
          $this->enterprise_address = $this->enterprise_details->address;
          $this->old_enderprise_logo = $this->enterprise_details->logo;

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
           if ($this->enterprise_logo) {
            $this->file_name = md5($this->enterprise_logo->getClientOriginalName()). microtime() .'.'.$this->enterprise_logo->getClientOriginalExtension();
            $this->enterprise_logo->storeAs("imgs", $this->file_name, 'public');
            }

            isset($this->file_name) ? Storage::disk('public')->delete('imgs/'.$this->old_enderprise_logo) : '';
            DB::beginTransaction();
            $this->enterprise_tb::find($this->enterprise_uuid)->update([
             'enterprise_name' =>$this->enterprise_name,
             'phone_number' =>$this->enterprise_phone_number,
             'email' =>$this->enterprise_email,
             'address' =>$this->enterprise_address,
             'logo'  =>$this->file_name ?  $this->file_name : $this->old_enderprise_logo,
             ]);
            DB::commit();

            LivewireAlert::title('SUCESSO')
            ->text('Dados atualizados com sucesso!')
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
           $this->reset(['enterprise_name','enterprise_phone_number','enterprise_email','enterprise_address','file_name']);
           $this->resetValidation();
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
            $this->enterprise_uuid = $uuid;
            LivewireAlert::title('ATENÇÃO')
            ->text('Deseja eliminar este registo?')
            ->withConfirmButton()
            ->confirmButtonText('Confirmar')
            ->warning()
            ->withDenyButton()
            ->denyButtonText('Cancelar')
            ->withOptions(['allowOutsideClick' => false])
            ->timer('30000')
            ->onConfirm('confirmEnterpriseDeletion')
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

    public function confirmEnterpriseDeletion () {
        try {
            DB::beginTransaction();
            $this->enterprise_tb::destroy([$this->enterprise_uuid]);
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
