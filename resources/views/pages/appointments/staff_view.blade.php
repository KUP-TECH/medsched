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
                            <th>Time</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $a)
                            <tr class="text-center align-center">
                                <td>{{$a->name}}</td>
                                <td>{{$a->date}}</td>
                                <td>{{date('h:i a', strtotime($a->start))}}</td>
                                <td>
                                    @switch($a->status)
                                        @case('pending')
                                            <span class="badge bg-warning">{{ucfirst($a->status)}}</span>
                                            @break
                                        @case('appointed')
                                            <span class="badge bg-success">{{ucfirst($a->status)}}</span>
                                            @break
                                        @default
                                            <span class="badge bg-info">{{ucfirst($a->status)}}</span>
                                    @endswitch
                                </td>
                                <td>
                                    @if(isset($user) && $user->role === 'doctor')
                                        @switch($a->status)
                                            @case('pending')

                                                <button class="btn btn-outline-primary btn-sm"
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#create-modal"
                                                    data-id={{$a->id}}
                                                    data-date="{{$a->date}}"
                                                    data-time="{{ date('G:i', strtotime($a->start)) }}"
                                                    
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
        <p class="text-muted"><strong>NOTE:</strong> You can set a different date and time for rescheduling</p>
        <div class="row my-2">
            <div class="col">
                <h5 class="fs-5 fw-bold mb-0">Select Date</h5>
                <input type="date" class="form-control" name="date" id="start-date">
            </div>
        </div>

        <div class="row my-1">
            <div class="col">
                <h5 class="fs-5 fw-bold mb-0">Time</h5>
                <input type="time" class="form-control" name="start" id="start-time">
            </div>
           
        </div>

    </x-dashboard.modalform>


    <script>
        document.addEventListener('DOMContentLoaded', function () {

            document.getElementById('create-modal').addEventListener('show.bs.modal', function(evnt){
                let btn = evnt.relatedTarget;
                document.getElementById('data-id').value = btn.getAttribute('data-id');
                document.getElementById('start-time').value = btn.getAttribute('data-time');
                document.getElementById('start-date').value = btn.getAttribute('data-date');


            });

            
        });
    </script>

</x-dashboard.basedashboard>