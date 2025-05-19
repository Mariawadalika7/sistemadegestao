  <main>
        <div class="container-fluid px-4">
                        <h1 class="mt-4">Painel do {{auth()->user()->role->role_type == 'admin' ? 'Administrador' : 'Funcionário'}} </h1>
                        
                        <x-stats-counter :customersCounter='$customersCounter' :paymentsCounter='$paymentsCounter' :paymentsCounter='$paymentsCounter' :reportCounter='$reportCounter' />
                        <x-charts />                        
                        <livewire:adm.latest-stored-customer-component />                       
        </div>
                
</main>