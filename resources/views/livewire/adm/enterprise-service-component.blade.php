<div>
    @section('title', 'Serviços da empresa')
        <livewire:adm.fixed-top-bar />
         <x-side-bar />     

            <div id="layoutSidenav_content">
               <main>
                    <x-modals.form_enterprise_service :status='$status' />
                    <div class='container-fluid px-4 my-4'>
                         <div class="card mb-4">
                            <div class="card-header d-flex ">
                              
                                 <h6 class='text-uppercase'>Serviços da empresa</h6>
                            </div>
                            <div class="card-body">
                                <div class='d-flex col-md-12 align-items-center  gap-2'>

                                    <div class=' col-md-12 d-flex align-items-center gap-1'>
                                      <div class='col-md-6 d-flex align-items-center gap-1'>
                                        <button  data-bs-target='#form_enterprise_service' data-bs-toggle='modal' class='btn btn-primary'>Adicionar</button>
                                       <input wire:model.live='searcher' class='form-control' type='text' placeholder='Pesquisar serviço' />
                                    </div>                                   

                                    <div class='col-md-md-5 d-flex align-items-center gap-1'>
                                        <input wire:model.live='startdate' class='form-control' type='date' title='Inicio de data' />
                                        <input wire:model.live='enddate' class='form-control' type='date' title='Fim de data'  />                                        
                                    </div>
                                    </div>  

                                </div>

                                <div class='table-responsive'>
                                    <table class='table table-hover'>
                                        <thead>
                                            <tr>
                                                <th>Data de cadastro</th>
                                                <th>Serviço</th> 
                                                <th>Preço</th>  
                                                <th class="text-end">Opções</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if (isset($available_company_services) and $available_company_services->count() > 0)
                                                @foreach ($available_company_services as $service)
                                                            <tr>  
                                                                <td>{{$service->created_at ?? ''}}</td>     
                                                                <td>{{ $service->service_name }}</td>
                                                                <td>{{ number_format($service->service_price, 2, ',', '.') }}</td>
                                                                                                                               
                                                                 <td>
                                                                    <div class='d-flex gap-1 align-items-center justify-content-end'>                                                                   

                                                                        <button                                                                             
                                                                            wire:click="edit('{{ $service->uuid }}')"
                                                                            data-bs-target='#form_enterprise_service' 
                                                                            data-bs-toggle='modal'
                                                                            class='btn btn-primary btn-sm'>
                                                                            <i class='fa fa-edit'></i>
                                                                        </button>
                                                                       
                                                                        <button 
                                                                                wire:click="delete('{{ $service->uuid }}')"
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