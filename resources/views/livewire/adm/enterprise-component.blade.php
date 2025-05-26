<div>
    @section('title', 'Dados da empresa')
        <livewire:adm.fixed-top-bar />
         <x-side-bar />     

            <div id="layoutSidenav_content">
               <main>
                    <x-modals.form-enterprise :status='$status' />
                    <div class='container-fluid px-4 my-4'>
                         <div class="card mb-4">
                            <div class="card-header d-flex ">
                              
                                 <h6 class='text-uppercase'>Dados da empresa</h6>
                            </div>
                            <div class="card-body">
                                <div class='d-flex col-md-12 align-items-center  gap-2'>
                            
                                </div>

                                <div class='table-responsive'>
                                    <table class='table table-hover'>
                                        <thead>
                                            <tr>
                                               <th>Nome </th> 
                                               <th>Telefone</th>
                                                <th>Email</th>
                                              <th>Endereço</th>
                                                <th>Logotipo</th>
                                                <th class="text-end">Opções</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if (!is_null($enterprise))                                               
                                                            <tr>  
                                                                <td>{{$enterprise->enterprise_name ?? ''}}</td>    
                                                                <td>{{$enterprise->phone_number ?? ''}}</td>      
                                                                <td>{{$enterprise->email ?? ''}}</td>
                                                                <td>{{$enterprise->address  ?? ''}}</td>            
                                                                <td>
                                                                @if (!is_null($enterprise->logo))
                                                                <div class='container'>
                                                                    <img width="50" src='{{ asset('storage/imgs/' .$enterprise->logo) }}' class="rounded img-fluid" />
                                                                </div>
                                                                @else 
                                                                <span class='text-center'>Sem foto</span>       
                                                                @endif
                                                                </td>            
                                                                 <td>
                                                                    <div class='d-flex gap-1 align-items-center justify-content-end'>   

                                                                        <button                                                                             
                                                                            wire:click="edit('{{ $enterprise->uuid }}')"
                                                                            data-bs-target='#form_enterprise' 
                                                                            data-bs-toggle='modal'
                                                                            class='btn btn-primary btn-sm'>
                                                                            <i class='fa fa-edit'></i>
                                                                        </button>                                                                      
                                                                   
                                                                        <button 
                                                                                wire:click="delete('{{ $enterprise->uuid }}')"
                                                                                class='btn btn-danger btn-sm'>
                                                                                <i class='fa fa-trash-alt'></i>
                                                                        </button>

                                                                    </div>
                                                                </td>   
                                                            </tr>                                                    
                                                
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