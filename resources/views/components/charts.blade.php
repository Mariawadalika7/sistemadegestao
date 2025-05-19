<div wire:ignore class="row d-flex align-items-center gsp-1 {{ auth()->user()->role->role_type == 'employee' ? 'd-none' : 'd-block' }}">
                <div class="col-xl-6">
                    <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                    </div>
                </div>
</div>