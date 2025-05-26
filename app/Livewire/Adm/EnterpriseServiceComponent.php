<?php

namespace App\Livewire\Adm;

use App\Models\{Enterprise,EnterpriseService};
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class EnterpriseServiceComponent extends Component
{
    #[Layout('layouts.admin.app')] 
    public $enterprise_service_uuid,$enterprise_service,$service_name,$service_price,$enterprise_uuid,$enterprise_service_tb,$status,$searcher,$startdate,$enddate;
    protected $rules = ["service_name" =>"required|unique:enterprise_services", "service_price" =>"required"];
    protected $messages = ["service_name.required" =>'Campo obrigatório*', "service_name.unique" =>'O serviço já foi cadastrado', "service_price.required" =>'Campo obrigatório*'];
    protected $listeners = ['confirmEnterpriseServiceDeletion'];
   
    public function mount(Enterprise $enterprise_tb, EnterpriseService $enterprise_service_tb) {
        try {
            $this->enterprise_service_tb = new $enterprise_service_tb (); 
            $this->enterprise_uuid = $enterprise_tb::query()->select(['uuid'])->pluck('uuid')->first();            
        } catch (\Throwable $th) {
       LivewireAlert::title('Erro')
            ->text('erro: ' .$th->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->timer(0)
            ->show();
        }
    }
    public function render()
    {
        return view('livewire.adm.enterprise-service-component',[
            'available_company_services' =>$this->getEnterpriseServices()
        ]);
    }

    public function getEnterpriseServices () {
        try {
            if ($this->searcher) {
                return $this->enterprise_service_tb::query()->where('service_name', 'like', '%' .$this->searcher.'%')   
                ->latest()               
                ->get();
            }else if ($this->startdate && $this->enddate) {
                return $this->enterprise_service_tb::query()->whereBetween('created_at',[$this->startdate,$this->enddate])   
                ->latest()               
                ->get();
            }else{
                return $this->enterprise_service_tb::query()->latest()->get();
            }

        } catch (\Throwable $th) {
        LivewireAlert::title('Erro')
            ->text('erro: ' .$th->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
             ->timer(0)
            ->show();
        }
    }

    public function save () {
        $this->validate();  
        try {
          DB::beginTransaction();
          EnterpriseService::create([
            'service_name' =>$this->service_name,
            'service_price' =>$this->service_price,
            'enterprise_uuid' =>$this->enterprise_uuid
        ]);        
         DB::commit();

         LivewireAlert::title('SUCESSO')
            ->text('Dados salvos com sucesso!')
            ->success()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->show();
            $this->resetValidation();
            $this->reset(['service_name','service_price']);
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

    public function close_modal ()  {
        try {
           $this->resetValidation();
           $this->reset(['service_name','service_price']);
           $this->status = false;
        } catch (\Throwable $th) {
        LivewireAlert::title('Erro')
            ->text('erro: ' .$th->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->show();
        }
    }

    public function edit ($uuid) {
        try {
          $this->enterprise_service_uuid = $uuid;
          $this->status = true;
          $this->enterprise_service = $this->enterprise_service_tb::find($this->enterprise_service_uuid);
          $this->service_name = $this->enterprise_service->service_name;
         $this->service_price = $this->enterprise_service->service_price;
        } catch (\Throwable $th) {
        LivewireAlert::title('Erro')
            ->text('erro: ' .$th->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->show();
        }
    }

    public function delete ($uuid): void {
        try {
             $this->enterprise_service_uuid = $uuid;
             LivewireAlert::title('ATENÇÃO')
            ->text('Deseja eliminar este registo?')
            ->withConfirmButton()
            ->confirmButtonText('Confirmar')
            ->warning()
            ->withDenyButton()
            ->denyButtonText('Cancelar')
            ->withOptions(['allowOutsideClick' => false])
            ->timer('30000')
            ->onConfirm('confirmEnterpriseServiceDeletion')
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

    public function confirmEnterpriseServiceDeletion () {
        try {
           DB::beginTransaction();
           $this->enterprise_service_tb->destroy($this->enterprise_service_uuid);
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

    public function update () {
        $this->validate();
        try {
           DB::beginTransaction();
            $this->enterprise_service_tb::find($this->enterprise_service_uuid)->update([
            'service_name' =>$this->service_name,
            'service_price' =>$this->service_price,
            'enterprise_uuid' =>$this->enterprise_uuid
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
}
