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
    public $service_name,$service_price,$enterprise_uuid,$enterprise_service_tb,$status;
    protected $rules = ["service_name" =>"required|unique:enterprise_services", "service_price" =>"required"];
    protected $messages = ["service_name.required" =>'Campo obrigatório*', "service_name.unique" =>'O serviço já foi cadastrado', "service_price.required" =>'Campo obrigatório*'];
    public function mount(Enterprise $enterprise_tb, EnterpriseService $enterprise_services_tb) {
        try {
            $this->enterprise_service_tb = new $enterprise_services_tb (); 
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
           return $this->enterprise_service_tb::query()->get();
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
          EnterpriseService::create(['service_name' =>$this->service_name,'service_price' =>$this->service_price,'enterprise_uuid' =>$this->enterprise_uuid]);        
          DB::commit();

         LivewireAlert::title('SUCESSO')
            ->text('Role salva com sucesso!')
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
}
