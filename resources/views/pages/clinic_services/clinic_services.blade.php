<x-dashboard.basedashboard active_link="{{ $active_link }}">
    <div class="card">
        <x-dashboard.cardheader title="Services">
            <div class="row mt-3 align-items-center pb-2 border-bottom">
                <div class="col">

                    <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#create-modal">
                        Create A Service
                    </button>
                </div>
                <div class="col">

                </div>
            </div>
        </x-dashboard.cardheader>
        <div class="card-body">

            <table class="table table-info table-striped table-responsive">
                <thead>
                    <tr class="text-center">
                        <th>Service</th>
                        <th>Description</th>
                        <th>Time</th>
                        <th>Days</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $s)
                        <tr class="text-center">
                            <th>{{$s->name}}</th>
                            <th>{{$s->desc}}</th>
                            @if($s->start && $s->end) 
                                <th>{{date('h:i a', strtotime($s->start))}} - {{date('h:i a', strtotime($s->end))}}</th>
                            @else
                                <th><span class="badge bg-secondary">N/A</span></th>
                            @endif
                            <th>
                                @if($s->active_days) 
                                    @foreach ($s->active_days as $d)
                                        <span class="badge bg-primary">{{ $dayMap[$d] }}</span>
                                    @endforeach
                                @else
                                    <span class="badge bg-secondary">Appointment Only</span>
                                @endif
                            </th>
                            <th>
                                <button 
                                    class="btn btn-sm btn-outline-danger" 
                                    data-id="{{$s->id}}"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#delete-modal"
                                >
                                    <i class="fa-solid fa-trash fs-6"></i>
                                </button>
                            </th>
                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>
        <x-dashboard.paginationcomponent page="{{$page}}" search="{{$search}}" totalPages="{{$totalPages}}"
            route="{{ 'clinic_services' }}">
        </x-dashboard.paginationcomponent>

    </div>


    <x-dashboard.modalform title="Delete" route='delete_service' modal_size='modal-sm' id='delete-modal' btn_text="Delete">
        <div class="card-body">
            <h5 class="card-text">Delete?</h5>
            <input type="hidden" name="id" id="delete_id">
        </div>
    </x-dashboard.modalform>

    <x-dashboard.modalform title="Create" route='create_service' modal_size='modal-lg' id='create-modal' btn_text="Schedule">

        <div class="row">
            <div class="col">
                <h5 class="fs-5 fw-bold mb-0">Service Name</h5>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="col">
                <h5 class="fs-5 fw-bold mb-0">Description</h5>
                <input type="text" class="form-control" name="desc">
            </div>
        </div>


        
        

        <div class="row my-1">
            <div class="col">

                <div class="form-check">
                    <input type="checkbox" id="app-only" class="form-check-input border border-2">
                
                    <label class="form-check-label" for="app-only">
                        Appointment Only
                    </label>
                </div>

                
                <div class="d-flex flex-column">
                    <h5 class="fs-5 fw-bold mb-0">Active Days</h5>
                    <div class="btn-group" role="group" aria-label="Weekday toggle buttons">


                        @for ($i = 0; $i <= 6; $i++)
                            <input type="checkbox" class="btn-check" id="day{{ $i }}" autocomplete="off" value="{{ $i }}" name="active_days[]">
                            <label class="btn btn-outline-info" for="day{{ $i }}">{{ $dayMap[$i] }}</label>

                        @endfor
                        
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="row my-1">
            <div class="col">
                <h5 class="fs-5 fw-bold mb-0">Start Time</h5>
                <input type="time" class="form-control" name="start">
            </div>
            <div class="col">
                <h5 class="fs-5 fw-bold mb-0">End Time</h5>
                <input type="time" class="form-control" name="end">
            </div>
        </div>


    </x-dashboard.modalform>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('delete-modal').addEventListener('show.bs.modal', function(evnt){
                document.getElementById('delete_id').value = evnt.relatedTarget.getAttribute('data-id');
            });
        });
    </script>

</x-dashboard.basedashboard>