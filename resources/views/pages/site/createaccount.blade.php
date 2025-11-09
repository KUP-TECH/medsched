<x-site.basecomponent>


        <main class="main-content  mt-0">
            <section>
                <div class="page-header min-vh-75">
                    <div class="container">
                        <div class="row mt-2">
                            <div class="col-12 d-flex flex-column mx-auto ">
                                <div class="card border mt-8">
                                    <div class="card-header pb-0 text-left bg-transparent">
                                        <a href="{{route('login')}}" class="text-dark"><i class="fa-solid fa-arrow-left"></i></a>
                                        <h3 class="font-weight-bolder text-info text-gradient">Create Patient Account</h3>
                                        <p class="mb-0">please fill in the form</p>
                                    </div>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <strong>There were some problems with your input:</strong>
                                                <ul class="mb-0">
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        @if (session('status'))
                                            <div class="alert {{session('status')['alert']}} alert-dismissible fade show" role="alert">
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                {{ session('status')['msg'] }}
                                            </div>
                                        @endif
                                    <div class="card-body">
                                        <form action="{{ route('create.post') }}" method="POST">
                                            @csrf
        
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
        
        
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <label>Gender</label>
                                                    <div class="mb-3">
                                                        <select name="gender" class="form-select">
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label>Civil Status</label>
                                                    <div class="mb-3">
                                                        <select name="civil" class="form-select">
                                                            <option value="single">Single</option>
                                                            <option value="married">Married</option>
                                                            <option value="divorced">Divorced</option>
                                                            <option value="widowed">Widowed</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label>PhilHealth / National ID No.</label>
                                                    <div class="mb-3">
                                                        <input type="text" name="idno" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col">
                                                    <label>Emergency Contact Person</label>
                                                    <input type="text" name="e_contact" class="form-control" required>
                                                </div>
                                                <div class="col">
                                                    <label>Contact No.</label>
                                                    <input type="text" name="e_number" class="form-control" required>
                                                </div>
                                                <div class="col">
                                                    <label>Relations</label>
                                                    <input type="text" name="relationship" class="form-control" required>
                                                </div>
                                            </div>



                                            <div class="row">
                                                <div class="col">
                                                    <label>Blood Type</label>
                                                    <select name="blood_type" class="form-select" required>
                                                        <option value="A">A+</option>
                                                        <option value="A-">A-</option>
                                                        <option value="B">B+</option>
                                                        <option value="B-">B-</option>
                                                        <option value="AB">AB+</option>
                                                        <option value="AB-">AB-</option>
                                                        <option value="O">O+</option>
                                                        <option value="O">O-</option>
                                                        <option value="unknown">Unknown</option>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label>Known Allergies <span class="text-muted">Peanut, Shell fish</span></label>
                                                    <input type="text" name="allergies" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label>Current Medications <span class="text-muted">Highpertension Meds, etc..</span></label>
                                                    <input type="text" name="medications" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row my-3">
                                                <div class="col">
                                                    <label>Previous Surgeris/Major Illness</label>
                                                    <input type="text" name="previuos_illness" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label>Family History of Illness</label>
                                                    <select name="illness" class="form-select">
                                                        <option value="">None</option>
                                                        <option value="diabetes">Diabetes</option>
                                                        <option value="hypertension">Hypertension</option>
                                                        <option value="heart-disease">Heart disease</option>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="smoke" value="1" id="radioDefault1">
                                                        <label class="form-check-label" for="radioDefault1">
                                                            I smoke
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="smoke" value="0" id="radioDefault2" checked>
                                                        <label class="form-check-label" for="radioDefault2">
                                                            I dont smoke
                                                        </label>
                                                    </div>

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
                                            

                                            

        
        
                                            <div class="text-center">
                                                <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Create</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                        
                                        <div class="my-1 px-4">
                                            @if ($errors->any())
                                                <div class=" text-danger text-center my-auto">
                                                    <ul class="my-auto py-auto">
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach

                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img class="img-fluid" src="{{ asset('assets/img/bg.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
       

</x-site.basecomponent>