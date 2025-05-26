<?php

namespace App\Livewire\Auth;

use App\Models\{Employee, Enterprise, PersonalData, Role, User};
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AuthComponent extends Component
{
     #[Layout('layouts.home.app')] 
    public $email,$password,$user,$admin,$role,$credentials = [],$phone_number,$availableRoles,$employee,$enterprise_tb;
    protected $rules = ['email' =>'required','password' =>'required'];
    protected $messages = ['email.required' => 'Campo obritório*', 'password.required' =>'Campo obritório*'];

    public function mount (Enterprise $enterprise_tb) {
        $this->enterprise_tb = $enterprise_tb;
        $this->verifyIfAlreadyHaveOneAdminUser();
        $this->verifyAllAvailableRoles();
        $this->verifyIfAlreadyHaveEnterpriseData();
    }

    public function render()
    {
        return view('livewire.auth.auth-component');
    }

    public function sign_in () {       
       $this->validate();
        try {
            $this->credentials = ["email" =>$this->email,"password" =>$this->password];
            if (auth()->attempt($this->credentials)) {
                if (auth()->user()->role->role_type === 'customer') {
                       return redirect()->route('dashboard.customer.home');
                    }else if (auth()->user()->role->role_type === 'admin') {
                        return redirect()->route('dashboard.admin.home');
                    }else if (auth()->user()->role->role_type === 'employee') {
                        return redirect()->route('dashboard.admin.home');
                }
            }else{
            LivewireAlert::title('Atenção')
                ->text('Credenciais incorretas,tente novamente!')
                ->warning()
                ->withConfirmButton()
                ->confirmButtonText('Fechar')
                 ->show();
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

    public function verifyIfAlreadyHaveOneAdminUser () {
        try {
          $this->admin = User::query()->with('role')
            ->whereHas('role', function ($q) {
            $q->where('role_type','admin');
          })->first();
          $this->role = Role::query()->where('role_type', 'admin')->first();       

        if (!$this->admin)  {
        DB::beginTransaction();
            $this->employee = Employee::query()->create(['position' =>'CEO']);
            $personaldata = PersonalData::query()->create([
                'fullname' =>'Admin',
                'birthday' =>'1996-01-01',
                'phone_number' =>'+244923453132',
                'address' =>'Luanda,Angola',
                'employee_uuid' =>$this->employee->uuid
            ]); 
             !$this->role ? $role = Role::query()->create(['role_type' =>'admin']) : '';
              $user = User::query()->create([
                'role_uuid' => !$this->role ? $role->uuid : $this->role->uuid,
                'email' =>'admin@gmail.com',
                'username' =>'global_admin',
                'password' => Hash::make('admin#'),
                'employee_uuid' =>$this->employee->uuid
            ]);          
            DB::commit();
        }

        } catch (Exception $ex) {
        DB::rollBack();
            LivewireAlert::title('Erro')
            ->text('erro: ' .$ex->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->timer(0)
            ->show();
        }
    }

    public function verifyAllAvailableRoles () {
        try {
            $this->availableRoles = Role::query()->get();            
            if ($this->availableRoles->count() < 2 ) {
                $roleTypes = [1 => 'customer',2 => 'employee'];
        
                for ($i=1; $i < 3; $i++) {
                    DB::beginTransaction();
                    Role::query()->create(['role_type' => $roleTypes[$i]]);              
                    DB::commit();                  
                }
            }

        } catch (Exception $ex) {
            DB::rollBack();
            LivewireAlert::title('Erro')
                ->text('erro: ' .$ex->getMessage())
                ->error()
                ->withConfirmButton()
                ->confirmButtonText('Fechar')
                ->timer(0)
                ->show();
        }
    }

    public function verifyIfAlreadyHaveEnterpriseData () {
        try {
          
            if ($this->enterprise_tb->count() < 1){
                $this->enterprise_tb::create([
                    'enterprise_name' =>"Centro De Electricidade Multiserviço",
                    'phone_number' =>"+244923567899",
                    'email' =>"centro.multi-angola@gmail.com",
                    'address' =>"Luanda, Angola",
                    'logo'  => null,
                    ]);
            }
        } catch (Exception $ex) {
             LivewireAlert::title('Erro')
                ->text('erro: ' .$ex->getMessage())
                ->error()
                ->withConfirmButton()
                ->confirmButtonText('Fechar')
                ->timer(0)
                ->show();
        }
    }
}
