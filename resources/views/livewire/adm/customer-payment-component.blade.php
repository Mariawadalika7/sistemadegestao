<div>
    @section('title', 'Pagamentos')
        <livewire:adm.fixed-top-bar />
         <x-side-bar />     

            <div id="layoutSidenav_content">
               <main>
                   
                    <div class='container-fluid px-4 my-4'>
                         <div class="card mb-4">
                            <div class="card-header d-flex ">                              
                                 <h6 class='text-uppercase'>Pagamentos efectuados</h6>
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
                                                <th>Data de pagamento</th>
                                                <th>Nome do cliente</th>       
                                                <th>Valor pago</th>   
                                                <th class="text-end">Opções</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if (isset($roles) and $roles->count() > 0)
                                                @foreach ($roles as $role)
                                                            <tr>  
                                                                <td>{{$role->created_at ?? ''}}</td>     
                                                                                                                          
                                                                 <td>
                                                                    <div class='d-flex gap-1 align-items-center justify-content-end'>                                                                  

                                                                        <button                                                                             
                                                                            wire:click="edit('{{ $role->uuid }}')"
                                                                            data-bs-target='#form_role' 
                                                                            data-bs-toggle='modal'
                                                                            class='btn btn-primary btn-sm'>
                                                                            <i class='fa fa-print'></i>
                                                                        </button>                                                                    
                                                                        
                                                                      
                                                                            <button 
                                                                                wire:click="delete('{{ $role->uuid }}')"
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
                   
               </main>
               <x-footer />                
            </div>
        </div>
</div>