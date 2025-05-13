<?php

namespace App\Livewire\Adm;

use App\Models\PersonalData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class EmployeeComponent extends Component
{
    #[Layout('layouts.admin.app')] 
    public $searcher,$startdate,$enddate;
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
}
