<x-site.basecomponent>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="max-width: 500px; width: 100%;">
            <div class="card-body text-center">
                <!-- Icon -->
                <div class="mb-3">
                    <i class="bi bi-envelope-check-fill text-primary" style="font-size: 3rem;"></i>
                </div>
                @if (session('status'))
                    <div class="alert {{session('status')['alert']}} alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        {{ session('status')['msg'] }}
                    </div>
                @endif
                <!-- Heading -->
                <h3 class="card-title mb-3">Verify Your Email</h3>
                <p class="text-muted mb-4">
                    We’ve sent a verification link to your email. Please check your inbox and copy paste the token.
                </p>

                <form action="{{ route('verify_token') }}" method="post">
                    @csrf
                    <input type="hidden" name="patient_id" value="{{ $patient_id->id }}">
                    
                    <div class="input-group my-2">
                        <input type="text" class="form-control" name="token" placeholder="token">
                    </div>

                    <button class="btn btn-sm btn-primary">Verify</button>
                </form>
                


                <!-- Resend Link -->
                <p class="small text-muted">
                    Didn’t receive the email?
                    <a href="{{ route('resend_token') }}" class="text-decoration-none">Resend verification
                        link</a>
                </p>
            </div>
        </div>
    </div>
</x-site.basecomponent>