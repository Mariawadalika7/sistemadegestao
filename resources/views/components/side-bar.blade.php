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
                                <div class="sb-nav-link-icon d-flex gap-2 align-items-center {{ request()->route()->getname() == 'dashboard.admin.employees' ? 'text-dark' : '' }}">
                                    <i class="fa fa-solid fa-id-card "></i>
                                    <span>Funcionários</span>
                                </div>
                            </a> 
                            
                            <a class="nav-link {{ request()->route()->getname() == 'dashboard.admin.enterprise' ? 'rounded text-dark bg-white' : ''}} {{ auth()->user()->role->role_type == 'admin' ? 'd-block' : 'd-none' }}" href="{{ route('dashboard.admin.enterprise') }}">
                                <div class="sb-nav-link-icon d-flex gap-2 align-items-center {{ request()->route()->getname() == 'dashboard.admin.enterprise' ? ' text-dark' : '' }}">
                                    <i class="fa fa-solid fa-home "></i>
                                    <span>Dados da empresa</span> 
                                </div>
                            </a> 
                            
                             <a class="nav-link {{ request()->route()->getname() == 'dashboard.admin.roles' ? 'rounded text-dark bg-white' : ''}} {{ auth()->user()->role->role_type == 'admin' ? 'd-block' : 'd-none' }}" href="{{ route('dashboard.admin.roles') }}">
                                <div class="sb-nav-link-icon d-flex gap-2 align-items-center {{ request()->route()->getname() == 'dashboard.admin.roles' ? ' text-dark' : '' }}">
                                    <i class="fa fa-solid fa-lock "></i>
                                    <span>Roles</span> 
                                </div>
                            </a>   

                              <a class="nav-link {{ request()->route()->getname() == 'dashboard.admin.enterprise.services' ? 'rounded text-dark bg-white' : ''}} {{ auth()->user()->role->role_type == 'employee' ? 'd-block' : 'd-none' }}" href="{{ route('dashboard.admin.enterprise.services') }}">
                                <div class="sb-nav-link-icon d-flex gap-2 align-items-center {{ request()->route()->getname() == 'dashboard.admin.enterprise.services' ? ' text-dark' : '' }}">
                                    <i class="fa fa-solid fa-plug "></i>
                                    <span>Serviços da empresa</span> 
                                </div>
                            </a> 
                            
                        </div>
                    </div>
                    
                </nav>
        </div>