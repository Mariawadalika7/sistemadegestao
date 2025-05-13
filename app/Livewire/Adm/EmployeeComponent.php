<?php

namespace App\Livewire\Adm;

use App\Models\Employee;
use App\Models\PersonalData;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class EmployeeComponent extends Component
{
    #[Layout('layouts.admin.app')] 
    public $uuid,$searcher,$startdate,$enddate, $status, $fullname,$position,$phone_number,$salary,$birthday,$address,$employee,$user,$username,$email,$password,$old_password;
    
    protected $rules = ['fullname' => 'required'];
    protected $messages = ['fullname.required' => 'Campo obrigatório*'];
    
    
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
           $personal_data = PersonalData::query()->with('employee')->find($this->uuid);
           $this->user = User::query()->where('employee_uuid',$personal_data->employee_uuid)->first();
           $this->employee = Employee::query()->where('uuid',$personal_data->employee_uuid)->first();
           $this->old_password =  $this->user->password;

           $this->fullname =  $personal_data->fullname;
           $this->position = $personal_data->employee->position;
           $this->birthday = $personal_data->birthday;
           $this->salary = $personal_data->employee->salary ?? 0;
           $this->phone_number = $personal_data->phone_number;
           $this->address = $personal_data->address;
           $this->username = $this->user->username;
           $this->email = $this->user->email;

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
           $this->reset([
            'old_password',
            'fullname',
            'position',
            'salary',
            'phone_number',
            'address',
            'username',
            'email',
            ]);
           $this->resetValidation();
        } catch (\Throwable $th) {
        LivewireAlert::title('Erro')
            ->text('erro: ' .$th->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Close')
            ->show();
        }
    }

    public function update (PersonalData $personal_data_tb, User $user_tb, Employee $employee_tb) {
        $this->validate();
        try {
        DB::beginTransaction();
        $personal_data_tb::find($this->uuid)->update([
            'fullname' =>$this->fullname,
            'address' =>$this->address,
            'birthday' =>$this->birthday,
            'phone_number' =>$this->phone_number,
        ]);

        $this->user->update([
            'username' =>$this->username,
            'email' =>$this->email,
            'password' =>$this->password ? $this->password : $this->old_password,
        ]);

        $this->$this->employee->update([
            'position' =>$this->position,
            'salary' =>$this->salary
        ]);

        DB::commit();
        LivewireAlert::title('SUCESSO')
            ->text('Dados atualizados com sucesso!')
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->show();
           
        } catch (\Throwable $th) {
        DB::rollBack();
           LivewireAlert::title('Erro')
            ->text('erro: ' .$th->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Close')
            ->show();
        }
    }

    public function save () {
        $this->validate();
        try {
            //code...
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
