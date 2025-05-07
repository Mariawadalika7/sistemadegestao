<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Rota inicial com barra de progresso
Route::get('/', function () {
    return view('welcome');
});

// Rota de teste sem middleware para verificar funcionamento básico
Route::get('/teste', function () {
    return 'Rota de teste funcionando corretamente!';
});

// Rotas de autenticação básicas
Route::middleware(['auth'])->group(function () {
    
    // Verificação e redirecionamento após login
    Route::get('/check-user-type', function () {
        if (Auth::user()->role === 'admin') {
            return redirect('/dashboard');
        } else {
            return redirect('/funcionario');
        }
    })->name('check.user.type');
    
    // Rota para dashboard de administrador
    Route::get('/dashboard', function () {
        if (Auth::user()->role !== 'admin') {
            return redirect('/check-user-type');
        }
        return view('adm.dashboard');
    })->name('dashboard');
    
    // Rota para painel de funcionário
    Route::get('/funcionario', function () {
        if (Auth::user()->role !== 'funcionario') {
            return redirect('/check-user-type');
        }
        return view('profile.partials.funcionario.funcionario');
    })->name('funcionario');
    
    // Rotas comuns a todos os usuários autenticados
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Rotas para gerenciamento de clientes
    Route::resource('clientes', ClienteController::class);
    
    // Rotas para gerenciamento de usuários
    Route::middleware(['checkRole:admin'])->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/users/store', [UserController::class, 'store'])->name('user.store');
    });
});

require __DIR__.'/auth.php';

