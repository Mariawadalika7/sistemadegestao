<div>
    @section('title', 'Sistema Escolar')
        <livewire:adm.fixed-top-bar />
         <x-side-bar />     

            <div id="layoutSidenav_content">
                <x-stats :customersCounter='$customersCounter' :paymentsCounter='$paymentsCounter' :paymentsCounter='$paymentsCounter' :reportCounter='$reportCounter' />
               <x-footer />
            </div>
        </div>
</div>

@push('dashboard-home')
<script src="{{ asset('dashboard/js/ajax-chart.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('dashboard/assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('dashboard/assets/demo/chart-bar-demo.js') }}"></script>
    <script src="{{ asset('dashboard/js/simple-datatables.js') }}" ></script>
    <script src="{{ asset('dashboard/js/datatables-simple-demo.js') }}"></script>
@endpush