<x-dashboard.basedashboard active_link="{{ $active_link }}">
    <div class="card">
        <x-dashboard.cardheader title="Appoinments">
            <div class="row mt-3 align-items-center pb-2 border-bottom">
                <div class="col">

                    
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
                            <th>Time Window</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $a)
                            <tr class="text-center align-center">
                                <td>{{$a->name}}</td>
                                <td>{{$a->date}}</td>
                                <td>{{date('h:i a', strtotime($a->start))}} - {{date('h:i a', strtotime($a->end))}}</td>
                                <td><span class="badge bg-info">{{ucfirst($a->status)}}</span></td>
                                <td>
                                    @if(isset($user) && $user->role === 'doctor')
                                        @switch($a->status)
                                            @case('pending')

                                                <button class="btn btn-outline-primary btn-sm"
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#create-modal"
                                                    data-id={{$a->id}}
                                                >
                                                    Schedule
                                                </button>
                                            @break
                                        @endswitch
                                    @else
                                        <span class="bg-warning badge">Doctor Only</span>
                                    @endif

                                    
                                    
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
            

        </div>
        <x-dashboard.paginationcomponent page="{{$page}}" search="{{$search}}" totalPages="{{$totalPages}}"
            route="{{ 'staff_view' }}">
        </x-dashboard.paginationcomponent>

    </div>

    <x-dashboard.modalform 
        route='schedule_appoinment' 
        modal_size='modal-lg' 
        id='create-modal' 
        btn_text="Schedule"
        title="Schedule Appoinment"
    >

        <input type="hidden" name="id" id="data-id">

        <div class="row my-2">
            <div class="col">
                <h5 class="fs-5 fw-bold mb-0">Select Date</h5>
                <input type="date" class="form-control" name="date">
            </div>
        </div>

        <div class="row my-1">
            <div class="col">
                <h5 class="fs-5 fw-bold mb-0">Time</h5>
                <input type="time" class="form-control" name="start">
            </div>
           
        </div>

    </x-dashboard.modalform>


    <script>
        document.addEventListener('DOMContentLoaded', function () {

            document.getElementById('create-modal').addEventListener('show.bs.modal', function(evnt){
                let btn = evnt.relatedTarget;
                document.getElementById('data-id').value = btn.getAttribute('data-id');

            });

            
        });
    </script>

</x-dashboard.basedashboard>