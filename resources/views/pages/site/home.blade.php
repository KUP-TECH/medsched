<x-site.basecomponent>
    <style>
        .top-right {
            position: absolute;
            top: 1rem;
            right: 1.5rem;
        }

        .center-content {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        body {
            background-image: url('assets/images/background.png');
        }
    </style>

    <!-- Top Right Login Button -->
    <div class="top-right">
        <a href="{{ route('login') }}" class="btn btn-info">
            <i class="fas fa-sign-in-alt me-1"></i> Login
        </a>
    </div>

    <!-- Centered Title and Subtitle -->
    <div class="center-content">
        <h1 class="fs-2 fw-bold text-info badge bg-white">MedSched</h1>
        <p class="lead text-secondary text-white">Seamless medical appointment scheduling at your fingertips.</p>
    </div>
</x-site.basecomponent>