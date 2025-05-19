<div class='row'>

              <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">
                                        <h2>{{isset($customersCounter) ? $customersCounter : 0 }}</h2>
                                       <h6 class=''>Clientes activos</h6> 
                                    </div>
                    </div>
                </div>
                                   


                 <div class="col-xl-3 col-md-6">
                         <div class="card bg-success text-white mb-4">
                            <div class="card-body">
                                <h2>{{isset($paymentsCounter) ? $paymentsCounter : 0}}</h2>
                                <h6 class=''>Pagamentos processados</h6> 
                            </div>
                        </div>
                 </div>

                 <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">
                                <h2>{{isset($reportCounter) ? $reportCounter : 0}}</h2>
                                <h6 class=''>Relatórios gerados</h6> 
                            </div>
                        </div>
                 </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                            <div class="card-body">
                                <h2>24h</h2>
                                <h6 class=''>Suporte técnico</h6> 
                            </div>
                        </div>
                 </div>
</div>