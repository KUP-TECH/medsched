<x-dashboard.basedashboard active_link="{{ $active_link }}">
    <div class="card">
        <x-dashboard.cardheader title="Dashboard">
            <div class="row mt-3 align-items-center pb-2 border-bottom">
                <div class="row mb-4 gy-4">
                    <!-- Total Patients -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card text-white bg-primary shadow-sm h-100">
                            <div class="card-body text-center px-1">
                                <h5 class="card-title">Total Patients</h5>
                                <h4 class="card-text text-white">{{ $patient }}</h4>
                            </div>
                        </div>
                    </div>

                    <!-- Total Staff -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card text-white bg-warning shadow-sm h-100">
                            <div class="card-body text-center px-1">
                                <h5 class="card-title">Total Staff</h5>
                                <h4 class="card-text text-white">{{ $staff }}</h4>
                            </div>
                        </div>
                    </div>

                    <!-- Appointments -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card text-white bg-success shadow-sm h-100">
                            <div class="card-body text-center px-1">
                                <h5 class="card-title">Appointments</h5>
                                <h4 class="card-text text-white">{{ $appointments }}</h4>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Appointments -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card text-white bg-info shadow-sm h-100">
                            <div class="card-body text-center px-1">
                                <h5 class="card-title text-nowrap">Pending Appointments</h5>
                                <h4 class="card-text text-white">{{ $pending }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-dashboard.cardheader>
    </div>
</x-dashboard.basedashboard>