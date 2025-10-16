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
                                        <p class="mb-4 text-sm mx-auto">
                                            Don't have an account?<span class="text-warning fw-bold fs-7"> <a href=""
                                                    class="text-info text-decoration-underline">Create an account</a>
                                            </span>
                                        </p>
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
        <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
        <footer class="footer mt-5 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-8 mx-auto text-center mt-1">
                        <img src="{{ asset('assets/img/kuptech-icon.png') }}" style="width: 35px; height: 35px;">
                        <p class="mb-0 text-secondary">
                            Copyright ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> <a href="https://kuptech.lyncxus.online/" class="font-weight-bold" target="_blank">
                                {{ config('const.provider') }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->


</x-site.basecomponent>