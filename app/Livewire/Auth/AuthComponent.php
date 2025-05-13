<?php

namespace App\Livewire\Auth;

use App\Models\{Employee, PersonalData, Role, User};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AuthComponent extends Component
{
    #[Layout('layouts.auth.app')]

    public $email, $password,$user,$admin,$role,$credentials,$phone_number;
    protected $rules = ['email' => 'required', 'password' =>'required'];
    protected $messages = ['email.required' => 'Campo obritório*', 'password.required' =>'Campo obritório*'];
    public function mount () {
        $this->verifyIfAlreadyHaveOneAdminUser();
    }
    public function render()
    {
        return view('livewire.auth.auth-component');
    }

    public function sign_in () {
       $this->validate();
        try {

            if (Auth::attempt(["email" =>$this->email, "password" =>$this->password])) {
                if (auth()->user()->role->role_type == 'customer') {
                       return redirect()->route('buyer.home');
                    }else if (auth()->user()->role->role_type == 'admin') {
                        return redirect()->route('dashboard.admin.home');
                    }else if (auth()->user()->role->role_type == 'employee') {
                        return redirect()->route('dashboard.admin.home');
                }
            }else{
            LivewireAlert::title('Atenção')
                ->text('Credenciais incorretas,tente novamente!')
                ->warning()
                ->withConfirmButton()
                ->confirmButtonText('Close')
                 ->show();
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

    public function verifyIfAlreadyHaveOneAdminUser () {
        try {
          $this->admin = User::query()->with('role')
            ->whereHas('role', function ($q) {
            $q->where('role_type','admin');
          })->first();
          $this->role = Role::query()->where('role_type', 'admin')->first();

        if (!$this->admin and !$this->role) {
        DB::beginTransaction();
            $employee = Employee::query()->create(['position' =>'System manager']);
            $personaldata = PersonalData::query()->create([
                'fullname' =>'Admin',
                'birthday' =>'1996-01-01',
                'phone_number' =>'+244923453132',
                'address' =>'Luanda,Angola',
                'employee_uuid' =>$employee->uuid
            ]);
            $role = Role::query()->create(['role_type' =>'admin']);
            $user = User::query()->create([
                'role_uuid' =>$role->uuid,
                'email' =>'admin@gmail.com',
                'username' =>'global_admin',
                'password' => Hash::make('admin#'),
                'employee_uuid' =>$employee->uuid
            ]);

            DB::commit();
          }
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
}
