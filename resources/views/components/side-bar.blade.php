 <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div wire:ignore class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            
                            <a class="nav-link {{ request()->route()->getname() == 'dashboard.admin.home' ? 'rounded text-dark bg-white' : '' }}" href="{{ route('dashboard.admin.home') }}">
                                <div class="sb-nav-link-icon">
                                    <i class="fa fa-solid fa-home {{ request()->route()->getname() == 'dashboard.admin.home' ? ' text-dark' : '' }}"></i>
                                </div>
                                Dashboard
                            </a>    
                            
                            <a class="nav-link {{ request()->route()->getname() == 'dashboard.admin.employees' ? 'rounded text-dark bg-white' : '' }}" href="{{ route('dashboard.admin.employees') }}">
                                <div class="sb-nav-link-icon">
                                    <i class="fa  fa-solid fa-id-card {{ request()->route()->getname() == 'dashboard.admin.employees' ? ' text-dark' : '' }}"></i>
                                </div>
                                Funcionários
                            </a>     
                            
                        </div>
                    </div>
                    
                </nav>
        </div>