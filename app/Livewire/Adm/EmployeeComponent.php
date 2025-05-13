<?php

namespace App\Livewire\Adm;

use App\Models\PersonalData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class EmployeeComponent extends Component
{
    #[Layout('layouts.admin.app')] 
    public $uuid,$searcher,$startdate,$enddate, $status, $fullname,$position,$phone_number,$salary,$birthday,$address;
    public function render()
    {
        return view('livewire.adm.employee-component',[
            'employees' =>$this->getEmployees()
        ]);
    }

    public function getEmployees () {
        try {
            if ($this->searcher) {
             return PersonalData::query()->where('fullname', 'like', '%' . $this->searcher . '%')
             ->with('employee')
             ->get();
            }else if ($this->startdate and $this->enddate) {
                return PersonalData::query()->whereBetween('created_at',[$this->startdate,$this->enddate])
                ->with('employee')                
                ->get();
            }else{
                return PersonalData::query()->with('employee')->get();
            }
        } catch (\Throwable $th) {
        LivewireAlert::title('Erro')
            ->text('erro: ' .$th->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Close')
            ->show();
        }
    }

    public function edit ($uuid) {
        try {
            $this->uuid = $uuid;   
           $this->status = true;
                     
        } catch (\Throwable $th) {
        LivewireAlert::title('Erro')
            ->text('erro: ' .$th->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Close')
            ->show();
        }
    }

    public function close_modal () {
        try {
           $this->status = false;
        } catch (\Throwable $th) {
        LivewireAlert::title('Erro')
            ->text('erro: ' .$th->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Close')
            ->show();
        }
    }
}
