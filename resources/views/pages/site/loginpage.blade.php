<x-site.basecomponent>

  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row mt-5">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto me-5">
              <div class="card border mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h5 class="font-weight-bolder text-secondary text-center">WELCOME TO</h5>

                  <div class="d-flex flex-row justify-content-center align-items-center">
                    <img src="{{  asset('assets/images/logo.jpg') }}" style="width: 40px; height: 40px;">
                    <p class="fs-2 text-info text-gradient mb-0 mx-1">MedSched</p>
                  </div>

                  <p class="mb-0">Enter your name and password to sign in</p>
                  <div class="mt-1 px-4">
                    @if ($errors->any())
                      <div class=" text-danger text-center">
                        <ul class="my-auto py-auto">
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach

                        </ul>
                      </div>
                    @elseif (session('invalid'))
                      <div class=" text-danger text-center my-auto">
                        <ul class="my-auto py-auto">
                          <li>{{ session('invalid') }}</li>
                        </ul>
                      </div>
                    @endif
                    
                    @if (session('status'))
                      <div class="alert {{session('status')['alert']}} alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        {{ session('status')['msg'] }}
                      </div>
                    @endif
                  </div>
                </div>
                <div class="card-body">
                  <form role="form" action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <label>Name</label>
                    <div class="mb-3">
                      <input type="email" name="email" class="form-control" placeholder="Name" required>
                    </div>
                    <label>Password</label>
                    <div class="mb-3">
                      <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
  
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Don't have an account?<span class="text-warning fw-bold fs-7"> <a href="{{route('create')}}"
                        class="text-info text-decoration-underline">Create an account</a> </span>
                  </p>
                  
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