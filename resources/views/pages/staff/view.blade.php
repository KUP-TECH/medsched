<x-dashboard.basedashboard active_link="{{ $active_link }}">
    <div class="card">
        <x-dashboard.cardheader title="Staff">
            <div class="row mt-3 align-items-center pb-2 border-bottom">
                <div class="col">
                    <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#create-modal">
                        Create
                    </button>
                </div>
                <div class="col">
                    <x-dashboard.cardsearchbar search_route="staff"
                        placeholder="Staff name"></x-dashboard.cardsearchbar>
                </div>
            </div>
        </x-dashboard.cardheader>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-info table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>Name</th>
                            <th>Address</th>
                            <th>Contact No.</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($staff as $p)

                            <tr class="text-center">
                                <td>{{ "$p->fname $p->mname $p->lname" }}</td>
                                <td>{{ $p->address }}</td>
                                <td>{{ $p->contactno }}</td>
                                <td>{{ ucfirst($p->role) }}</td>
                                <td>
                                    <div class="d-flex flex-row align-items-center justify-content-center">
                                        <button class="badge bg-danger border-1 border-dark mx-1" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#delete-staff"
                                            data-id="{{ $p->id }}"
                                        >
                                            <i class="bi bi-person-x fs-5"></i>
                                        </button>
                                    </div>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>


        </div>
        <x-dashboard.paginationcomponent page="{{$page}}" search="{{$search}}" totalPages="{{$totalPages}}"
            route="{{ 'staff' }}">
        </x-dashboard.paginationcomponent>

    </div>


    <x-dashboard.modalform title="Create" route='create_staff' modal_size='modal-lg' id='create-modal'
        btn_text="Create">


        <div class="row">
        
            <div class="col">
                <label>First Name</label>
                <div class="mb-3">
                    <input type="text" name="fname" class="form-control" placeholder="Juan"
                        required>
                </div>
            </div>
            <div class="col">
                <label>Middle Name</label>
                <div class="mb-3">
                    <input type="text" name="mname" class="form-control" placeholder="Dela">
                </div>
            </div>
            <div class="col">
                <label>Last Name</label>
                <div class="mb-3">
                    <input type="text" name="lname" class="form-control" placeholder="Cruz"
                        required>
                </div>
            </div>

            <div class="row">
            
                <div class="col">
                    <label>Date of Birth</label>
                    <div class="mb-3">
                        <input type="date" name="dob" class="form-control" required>
                    </div>
                </div>
                <div class="col">
                    <label>Address</label>
                    <div class="mb-3">
                        <input type="text" name="address" class="form-control" required>
                    </div>
                </div>
                <div class="col">
                    <label>Contact No</label>
                    <div class="mb-3">
                        <input type="number" name="contactno" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row">
            
                <div class="col">
                    <label>Email</label>
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control" placeholder="test@gmail.com" required>
                    </div>
                </div>
                <div class="col">
                    <label>Password</label>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" required>
                    </div>
                </div>
                <div class="col">
                    <label>Confirm Password</label>
                    <div class="mb-3">
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-4">
                    <label>Role</label>
                    <select name="role" class="form-select">
                        <option value="staff">Staff</option>
                        <option value="doctor">Doctor</option>
                    </select>
                </div>
                <div class="col-4">
                    <label>Gender</label>
                    <div class="mb-3">
                        <select name="gender" class="form-select">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                </div>

            </div>

        </div>


    </x-dashboard.modalform>


    <x-dashboard.modalform route="delete_staff" modal_size="modal-lg" id="delete-staff" title="Delete Staff" btn_text="Confirm">
        <input type="hidden" name="id" id="data-id">
        
        <div class="card-body py-5 text-center">
            <div class="mb-3">
                <i class="fa-solid fa-triangle-exclamation text-danger fs-1"></i>
            </div>
            <h4 class="card-title mb-2 text-danger">Critical Operation</h4>
            <p class="card-text text-muted">
                Please confirm as you may not <strong class="text-danger">UNDO</strong> this operation
            </p>
        </div>
    </x-dashboard.modalform>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            document.getElementById('delete-staff').addEventListener('show.bs.modal', function(e){
                document.getElementById('data-id').value = e.relatedTarget.getAttribute('data-id');
            });

        });

    </script>

</x-dashboard.basedashboard>