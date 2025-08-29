<x-dashboard.basedashboard active_link="{{ $active_link }}">
    <div class="card">
        <x-dashboard.cardheader title="Patients">
            <div class="row mt-3 align-items-center pb-2 border-bottom">
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card text-white bg-primary shadow-sm">
                            <div class="card-body text-center px-1">
                                <h5 class="card-title">Total Patients</h5>
                                <h4 class="card-text text-white">{{ $patient}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-warning shadow-sm">
                            <div class="card-body text-center px-1">
                                <h5 class="card-title">Total Staff</h5>
                                <h4 class="card-text text-white">{{ $staff }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-success shadow-sm">
                            <div class="card-body text-center px-1">
                                <h5 class="card-title">Appointments</h5>
                                <h4 class="card-text text-white">N/A</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-info shadow-sm">
                            <div class="card-body text-center px-1">
                                <h5 class="card-title text-nowrap">Pending Appoinments</h5>
                                <h4 class="card-text text-white">N/A</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-dashboard.cardheader>
        <div class="card-body">

        </div>

            

    </div>

</x-dashboard.basedashboard>