<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id'; 

    protected $fillable = [
        'username',
        'email',
        'password',
        'role_uuid',
        'reset_password_code',
        'employee_uuid',
        'customer_uuid'
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];
   
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
  
    public function employee () {
        return $this->belongsTo(Employee::class, 'employee_uuid', 'uuid');
    }

    public function customer () {
        return $this->belongsTo(Customer::class, 'customer_uuid', 'uuid');
    }

    public function role() {
        return $this->belongsTo(Role::class, 'role_uuid', 'uuid');
    }

    /**
     * Verifica se o usuário é um administrador
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
    
}
