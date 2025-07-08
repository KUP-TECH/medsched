<x-site.basecomponent>
    <div class="position-relative vh-100">

        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50"
            style="background-image: url('https://static.vecteezy.com/system/resources/thumbnails/004/449/845/small_2x/abstract-geometric-medical-cross-shape-medicine-and-science-concept-background-medicine-medical-health-cross-healthcare-decoration-for-flyers-poster-web-banner-and-card-illustration-vector.jpg'); background-size: cover; background-position: center;">
        </div>

        
        <div class="position-absolute top-50 start-50 translate-middle w-100" style="max-width: 500px; z-index: 10;">
            <div class="bs-secondary-dark-blue-rgb bg-opacity-7 p-5 rounded shadow">
                <style>
                    .my-tex {
                        font-family: var(--bs-font-sans-serif);
                    }
                </style>
                

                <div class="bg-white bg-opacity-75 p-5 rounded-4 shadow-lg">
                <h2 class="my-tex fw-bold mb-2 text-center text-primary">Medcare</h2>
                <h5 class="fw-light text-muted mb-4 text-center">Sign in</h5>
            
                <form>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email">
                    </div>
            
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter your password">
                    </div>
            
                    <div class="mb-3 d-flex flex-column gap-2">
                        <button type="submit" class="btn btn-primary w-100">Log in</button>
                        <button type="button" class="btn btn-outline-primary w-100">Create Account</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

</x-site.basecomponent>