<x-site.basecomponent>
    <div class="container-fluid bg-white">
        <div class="row">
            <div class=" col fs-5 d-flex  align-items-center mx-4">
                <img class="mb-0" src="https://cdn.vectorstock.com/i/500p/10/31/medical-symbol-icons-vector-7601031.jpg"
                    style=" width:16%; height: auto;">
                <p class="fs-1 mt-1 mb-0">Medcare</p>
            </div>
            <div class="col fs-5  d-flex flex-row align-items-center justify-content-end">
                <div class="mx-3">
                    <a href="#" class="fs-6 text-decoration-none">Home</a>
                </div>
                <div class="mx-3">
                    <a href="#" class="fs-6 badge bg-dark-blue text-decoration-none">Login</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid p-0">
        <div class="d-flex align-items-center justify-content-center text-center text-white"
            style="background-image: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.2)), url('https://img.freepik.com/free-photo/smiling-woman-doctor-professional-medical-worker-showing-okay-ok-sign-approval-recommending-clini_1258-124588.jpg');
            background-size:cover;
            background-position:center;
            height: 100vh;">
            <div class="container">
            <div class="col-md-6 text-white text-center" style="width: 70%; height: 50vh;">
                <h1 class="fs-1 fw-bold">CARING FOR LIFE</h1>
                <p class="fs-6 fw-bold">leading the way in medical exellence</p>
                <p class="fs-6 fw-bold fs-6 p-0 mt-1 rounded-pill" style="background-color: rgb(1, 1, 61); text-decoration-color: aliceblue; width: 200px; margin:0 auto; text-align: center;">Make an appointment</p> 
            </div>
        </div>
    </div>
    
<!-- Fullscreen Background with Bottom-Half Form Peek -->
<div style="position: relative; height: 50vh; width: 160vh; background-image: url('https://your-image-url.jpg'); background-size: cover; background-position: center;">
  
  <!-- Dark overlay -->
  <div style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; background-color: rgba(255, 255, 255, 0.5);"></div>

  <!-- Bottom Positioned Form Box (half showing) -->
  <div class=" position-absolute start-50 translate-middle-x"
       style="bottom: 0; transform: translateY(50%); width: 100%; max-width: 400px; z-index: 10;">
    <div class="bg-white p-4 pt-5 rounded shadow ">
        <h5 class="fw-light text-muted mb-2">REQUEST FOR YOUR</h5>
      <h2 class="fw-bolder mb-2">Consultation</h2>
      <form>
        <div class="mb-3 text-start">
          <label for="name" class="form-label">Full Name</label>
          <input type="text" class="form-control" id="name" placeholder="Enter your name">
        </div>

        <div class="mb-3 text-start">
          <label for="email" class="form-label">Email Address</label>
          <input type="email" class="form-control" id="email" placeholder="Enter your email">
        </div>

        <div class="mb-3 text-start">
          <label for="message" class="form-label">Your Concern</label>
          <textarea class="form-control" id="message" rows="3" placeholder="Your message..."></textarea>
        </div>

        <button type="submit" class="btn btn-primary w-100">BOOK APPOINTMENT</button>
      </form>
    </div>

  </div>
</div>



</x-site.basecomponent>