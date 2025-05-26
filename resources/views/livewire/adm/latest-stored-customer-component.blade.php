<div class='row  {{ auth()->user()->role->role_type == 'employee' ? 'd-block' : 'd-none' }}'>
    
        <div class="card mb-4">                             
                            <div class="card-header d-flex align-items-start">
                                <i class="fas fa-table me-1"></i>
                                 <h6>Últimos Clientes Cadastrados</h6>
                            </div>
                            <div class="card-body">
                                <x-modals.form-employee :status='$status' :hideInput='$hideInput' />
                                <div class='d-flex col-md-12 align-items-center gap-2'>

                                    <div class='col-md-6 d-flex align-items-center gap-1'>
                                       <input wire:model.live='searcher' class='form-control' type='text' placeholder='Pesquisar cliente' />
                                    </div>                                   

                                    <div class='col-md-md-5 d-flex align-items-center gap-1'>
                                        <input wire:model.live='startdate' class='form-control' type='date' title='Inicio de data' />
                                        <input wire:model.live='enddate' class='form-control' type='date' title='Fim de data'  />                                        
                                    </div>

                                </div>

                                <div class='table-responsive'>
                                    <table class='table table-hover table-striped'>
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Email</th>
                                                <th>Telefone</th>                                             
                                                <th>Endereço</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if (isset($latest_stored_customers) and $latest_stored_customers->count() > 0)
                                                @foreach ($latest_stored_customers as $customer)
                                                            <tr>  
                                                                <td>{{$customer->fullname ?? ''}}</td>     
                                                                 <td>{{$customer->address ?? ''}}</td>    
                                                                 <td>{{$customer->phone_number ?? ''}}</td>   
                                                                 <td>{{$customer->address ?? ''}}</td>   

                                                                 <td>
                                                                    <div class='d-flex gap-1 align-items-center'>
                                                                        <button 
                                                                            wire:click="edit('{{ $customer->uuid }}')"
                                                                            data-bs-target='#form-employee' 
                                                                            data-bs-toggle='modal'
                                                                            class='btn btn-primary btn-sm'>
                                                                            <i class='fa fa-edit'></i>
                                                                        </button>

                                                                        <button {{ auth()->user()->role->role_type == 'employee' ? 'disabled' : '' }}
                                                                            wire:click="delete('')"                                                                            
                                                                            class='btn btn-danger btn-sm'>
                                                                            <i class='fa fa-trash-alt'></i>                                                                            
                                                                       </button>
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
