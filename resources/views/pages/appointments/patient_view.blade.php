<x-dashboard.basedashboard active_link="{{ $active_link }}">
    <div class="card">
        <x-dashboard.cardheader title="My Appoinments">
            <div class="row mt-3 align-items-center pb-2 border-bottom">
                <div class="col">

                    <button class="btn btn-sm btn-outline-info" 
                        data-bs-toggle="modal" 
                        data-bs-target="#create-modal">
                        Create An Appoinment
                    </button>
                </div>
                <div class="col">
                </div>
            </div>
        </x-dashboard.cardheader>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-info table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>Service</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $a)
                            <tr class="text-center">
                                <td>{{$a->name}}</td>
                                <td>{{$a->date}}</td>
                                <td>{{date('h:i a', strtotime($a->start))}}</td>
                                <td><span class="badge bg-info">{{ucfirst($a->status)}}</span></td>
                            </tr>
                        @endforeach
                
                    </tbody>
                
                </table>
            </div>
            

        </div>
        <x-dashboard.paginationcomponent page="{{$page}}" search="{{$search}}" totalPages="{{$totalPages}}"
            route="{{ 'patient_view' }}">
        </x-dashboard.paginationcomponent>

    </div>

    <x-dashboard.modalform 
        route='create_appointment' 
        modal_size='modal-lg' 
        id='create-modal' 
        btn_text="Schedule"
        title="Schedule Appoinment"
    >

        <input type="hidden" name="patient_id" value="{{$patient_id}}">
        <div class="row">
            <div class="col">
                <h5 class="fs-5 fw-bold mb-0">Service</h5>
                <select name="service_id" id="service-select" class="form-control">
                    <option value="">Please Select A Service</option>
                    @foreach ($services as $s)
                        <option value="{{$s->id}}">{{$s->name}}</option>
                    @endforeach
                </select>
            </div>
            
        </div>

        
        <div class="row my-2">
            <div class="col">
                <h5 class="fs-5 fw-bold mb-0">Select Date</h5>
                <input type="date" class="form-control" name="date">
            </div>
        </div>

        <p class="text-muted mb-0">Please select you time availability window</p>
        <div class="row my-1">

            <div class="col">
                <h5 class="fs-5 fw-bold mb-0">Time</h5>
                <input type="time" class="form-control" name="start">
            </div>
            
        </div>


    </x-dashboard.modalform>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Choices('#service-select', {
                searchEnabled: true,
                removeItemButton: false,
                shouldSort: true,
            });
        });
    </script>

</x-dashboard.basedashboard>