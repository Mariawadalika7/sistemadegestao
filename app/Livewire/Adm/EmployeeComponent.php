<?php

namespace App\Livewire\Adm;

use App\Models\Employee;
use App\Models\PersonalData;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class EmployeeComponent extends Component
{
    #[Layout('layouts.admin.app')] 
    public $uuid,$searcher,$startdate,$enddate, $status, $fullname,$position,$phone_number,$salary,$birthday,$address,$employee,$user,$username,$email,$password,$personal_data,$old_password;
    protected $listeners = ['confirmEmployeeDeletion' => 'confirmEmployeeDeletion'];
    protected $rules = [
        'fullname' => 'required',
        'salary' => 'required',
        'position' => 'required',
        'birthday' => 'required', 
        'phone_number' => 'required',  
        'address' => 'required',
        'email' => 'required|unique:users',  
        'password' => 'required',   
    ];
          
    protected $messages = [
        'fullname.required' => 'Campo obrigatório*',
        'salary.required' => 'Campo obrigatório*',
        'position.required' => 'Campo obrigatório*',
        'birthday.required' => 'Campo obrigatório*',
        'phone_number.required' => 'Campo obrigatório*',
        'address.required' => 'Campo obrigatório*',
        'email.required' => 'Campo obrigatório*',
        'email.unique' => 'O email já existe*',
        'password.required' => 'Campo obrigatório*',
   ];
    
    
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
             ->where('customer_uuid',null)
             ->get();
            }else if ($this->startdate and $this->enddate) {
                return PersonalData::query()->whereBetween('created_at',[$this->startdate,$this->enddate])
                ->where('customer_uuid',null)
                ->with('employee')                
                ->get();
            }else{
                return PersonalData::query()->with('employee')
                ->where('customer_uuid',null)
                ->get();
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
           $this->old_password =  $this->user->password ?? '';

           $this->fullname =  $personal_data->fullname ?? '';
           $this->position = $personal_data->employee->position ?? '';
           $this->birthday = $personal_data->birthday ?? '';
           $this->salary = $personal_data->employee->salary ?? 0;
           $this->phone_number = $personal_data->phone_number ?? '';
           $this->address = $personal_data->address ?? '';
           $this->username = $this->user->username ?? '';
           $this->email = $this->user->email ?? '';

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
           $this->reset(['old_password','password','fullname','position','birthday','salary','phone_number', 'address','username','email']);
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
        $this->validate([            
        'fullname' => 'required',
        'salary' => 'required',
         'position' => 'required',
        'birthday' => 'required', 
        'phone_number' => 'required',  
        'address' => 'required',
        'email' => 'required',  
    
        ],[
             'fullname.required' => 'Campo obrigatório*',
            'salary.required' => 'Campo obrigatório*',
            'position.required' => 'Campo obrigatório*',
            'birthday.required' => 'Campo obrigatório*',
            'phone_number.required' => 'Campo obrigatório*',
            'address.required' => 'Campo obrigatório*',
            'email.required' => 'Campo obrigatório*',
        ]);

        try {            
        DB::beginTransaction();
        $personal_data_tb::find($this->uuid)->update([
            'fullname' =>$this->fullname ?? '',
            'address' =>$this->address ?? '',
            'birthday' =>$this->birthday ?? '',
            'phone_number' =>$this->phone_number ?? '',
        ]);

        $this->user->update([
            'username' =>$this->username ?? '',
            'email' =>$this->email ?? '',
            'password' =>$this->password ? $this->password : $this->old_password,
        ]);

        $this->employee->update([
            'position' =>$this->position ?? '',
            'salary' =>$this->salary ?? ''
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
            ->confirmButtonText('Close')
            ->timer(0)
            ->show();
        }
    }

    public function save (PersonalData $personal_data_tb, User $user_tb, Employee $employee_tb) {       
        $this->validate();
        try {
          $role = Role::query()->where('role_type', 'employee')->first();
          
          if ($this->birthday >= now()->format('Y')) {
            LivewireAlert::title('ATENÇÃO')
                ->text('A data de nascimento não deve ser igual ou superior a data atual!')
                ->warning()
                ->withConfirmButton()
                ->confirmButtonText('Fechar')
                ->show();

          }else{
          DB::beginTransaction();
          $employee = $employee_tb->create([
            'position' =>$this->position,
            'salary' =>$this->salary
        ]);

        $personal_data_tb::create([
            'fullname' =>$this->fullname,
            'address' =>$this->address,
            'birthday' =>$this->birthday,
            'phone_number' =>$this->phone_number,
            'employee_uuid' =>$employee->uuid
        ]);

        $user_tb->create([
            'username' =>$this->username,
            'email' =>$this->email,
            'password' =>Hash::make($this->password),
            'role_uuid' =>$role->uuid,
            'employee_uuid' =>$employee->uuid
        ]); 

        DB::commit();
        LivewireAlert::title('SUCESSO')
            ->text('Dados salvos com sucesso!')
            ->success()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->show();
            $this->close_modal();
          }
          

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

    public function delete($uuid) {
        try {
        $this->uuid = $uuid;
        LivewireAlert::title('ATENÇÃO')
            ->text('Deseja eliminar este registo?')
            ->withConfirmButton()
            ->confirmButtonText('Confirmar')
            ->warning()
            ->withDenyButton()
            ->denyButtonText('Cancel')
            ->withOptions(['allowOutsideClick' => false])
            ->timer('30000')
            ->onConfirm('confirmEmployeeDeletion')
            ->show();
        } catch (\Throwable $th) {
           LivewireAlert::title('Erro')
            ->text('erro: ' .$th->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Close')
            ->show();
        }
    }

    public function confirmEmployeeDeletion() {
        DB::beginTransaction();
        try {
            $this->personal_data = PersonalData::findOrFail($this->uuid);            
            
            PersonalData::destroy($this->uuid);
            User::query()->where('employee_uuid', $this->personal_data->employee_uuid)->delete();
            Employee::query()->where('uuid', $this->personal_data->employee_uuid)->delete();
        
        DB::commit();
        } catch (Exception $ex) {
            DB::rollBack();
            LivewireAlert::title('Erro')
            ->text('erro: ' .$ex->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Close')
            ->timer(0)
            ->show();
        }
    }
}
