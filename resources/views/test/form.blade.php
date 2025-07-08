<x-site.basecomponent>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="bg-white p-4 p-md-5 rounded shadow-lg">
                    <h3 class="fw-bold text-center mb-4">Appointment Form</h3>
    
                    <form>
                        <!-- First and Last Name -->
                        <div class="row mb-3">
                            <div class="fw-bold mb-3">
                                <h4>Name</h4>
                            </div>
                            <div class="col-md-6">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Enter first name">
                            </div>
                            <div class="col-md-6">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" placeholder="Enter last name">
                            </div>
                        </div>
    
                        <!-- Date of Birth -->
                        <div class="row mb-3">
                            <div class="fw-bold mb-3">
                                <h4>Date of birth</h4>
                            </div>
                            <div class="col-md-4">
                                <label for="dobDay" class="form-label">Day</label>
                                <input type="number" class="form-control" id="dobDay" placeholder="DD" min="1" max="31">
                            </div>
                            <div class="col-md-4">
                                <label for="dobMonth" class="form-label">Month</label>
                                <input type="number" class="form-control" id="dobMonth" placeholder="MM" min="1" max="12">
                            </div>
                            <div class="col-md-4">
                                <label for="dobYear" class="form-label">Year</label>
                                <input type="number" class="form-control" id="dobYear" placeholder="YYYY" min="1900"
                                    max="2099">
                            </div>
                        </div>
    
                        <!-- Gender -->
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select id="gender" class="form-select">
                                <option selected disabled>Select gender</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                                <option>Prefer not to say</option>
                            </select>
                        </div>
    
                        <!-- Contact Number -->
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number">
                        </div>
    
                        <!-- Address -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" id="city" placeholder="Enter your city">
                            </div>
                            <div class="col-md-4">
                                <label for="province" class="form-label">Province</label>
                                <input type="text" class="form-control" id="province" placeholder="Enter province">
                            </div>
                            <div class="col-md-2">
                                <label for="postal" class="form-label">Postal Code</label>
                                <input type="text" class="form-control" id="postal" placeholder="ZIP">
                            </div>
                        </div>
    
                        <!-- Department -->
                        <div class="mb-3">
                            <label for="department" class="form-label">Department / Specialty</label>
                            <select id="department" class="form-select">
                                <option selected disabled>Select a department</option>
                                <option>General Medicine</option>
                                <option>Pediatrics</option>
                                <option>Cardiology</option>
                                <option>Dermatology</option>
                                <option>OB-GYN</option>
                                <option>Orthopedics</option>
                            </select>
                        </div>
    
                        <!-- Preferred Date and Time -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="date" class="form-label">Preferred Date</label>
                                <input type="date" class="form-control" id="date">
                            </div>
                            <div class="col-md-6">
                                <label for="time" class="form-label">Preferred Time</label>
                                <input type="time" class="form-control" id="time">
                            </div>
                        </div>
    
                        <!-- Message / Concern -->
                        <div class="mb-3">
                            <label for="message" class="form-label">Your Concern</label>
                            <textarea class="form-control" id="message" rows="3"
                                placeholder="Describe your concern..."></textarea>
                        </div>
    
                        <!-- Submit -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Request Appointment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-site.basecomponent>