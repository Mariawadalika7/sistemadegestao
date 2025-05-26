<div>
    @section('title', 'Roles')
        <livewire:adm.fixed-top-bar />
         <x-side-bar />     

            <div id="layoutSidenav_content">
               <main>
                    <x-modals.form-role :status='$status' />
                    <div class='container-fluid px-4 my-4'>
                         <div class="card mb-4">
                            <div class="card-header d-flex ">
                              
                                 <h6 class='text-uppercase'>Roles</h6>
                            </div>
                            <div class="card-body">
                                <div class='d-flex col-md-12 align-items-center  gap-2'>

                                    <div class=' col-md-12 d-flex align-items-center gap-1'>
                                        <input wire:model.live='startdate' class='form-control ' type='date' title='Inicio de data' />
                                        <input wire:model.live='enddate' class='form-control' type='date' title='Fim de data'  />   
                                    </div>                                   

                               

                                </div>

                                <div class='table-responsive'>
                                    <table class='table table-hover'>
                                        <thead>
                                            <tr>
                                                <th>Data de cadastro</th>
                                                <th>Role</th>                                             
                                                <th class="text-end">Opções</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if (isset($roles) and $roles->count() > 0)
                                                @foreach ($roles as $role)
                                                            <tr>  
                                                                <td>{{$role->created_at ?? ''}}</td>     
                                                                <td class="text-capitalize">
                                                                    @if ($role->role_type == 'admin')
                                                                        <span>Administrador</span>
                                                                    @elseif ($role->role_type == 'employee')
                                                                        <span>Funcionário</span>
                                                                    @elseif ($role->role_type == 'customer')
                                                                        <span>Cliente</span>
                                                                    @else
                                                                    <span>{{$role->role_type ?? ''}}</span>
                                                                    @endif
                                                                </td>                                                                
                                                                 <td>
                                                                    <div class='d-flex gap-1 align-items-center justify-content-end'>
                                                                        @if ($role->role_type == 'admin' || $role->role_type == 'employee' || $role->role_type == 'customer')
                                                                        <button 
                                                                            disabled
                                                                            wire:click="edit('{{ $role->uuid }}')"
                                                                            data-bs-target='#form_role' 
                                                                            data-bs-toggle='modal'
                                                                            class='btn btn-primary btn-sm'>
                                                                            <i class='fa fa-edit'></i>
                                                                        </button>
                                                                            
                                                                        @else

                                                                        <button                                                                             
                                                                            wire:click="edit('{{ $role->uuid }}')"
                                                                            data-bs-target='#form_role' 
                                                                            data-bs-toggle='modal'
                                                                            class='btn btn-primary btn-sm'>
                                                                            <i class='fa fa-edit'></i>
                                                                        </button>
                                                                        @endif
                                                                        
                                                                        @if ($role->role_type == 'admin' || $role->role_type == 'employee' || $role->role_type == 'customer')
                                                                            <button 
                                                                                disabled
                                                                                wire:click="delete('{{ $role->uuid }}')"
                                                                                class='btn btn-danger btn-sm'>
                                                                                <i class='fa fa-trash-alt'></i>
                                                                            </button>
                                                                        @else
                                                                            <button 
                                                                                wire:click="delete('{{ $role->uuid }}')"
                                                                                class='btn btn-danger btn-sm'>
                                                                                <i class='fa fa-trash-alt'></i>
                                                                        </button>
                                                                            
                                                                        @endif

                                                                    </div>
                                                                </td>   
                                                            </tr>                                                    
                                                @endforeach
                                            @else
                                            <tr>
                                                <td colspan='10'>
                                                   <div class='alert alert-secondary text-center'>Nenhum resultado encontrado.</div> 
                                                </td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                   
               </main>
               <x-footer />                
            </div>
        </div>
</div>