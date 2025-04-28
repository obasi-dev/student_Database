<?php
include "../includes/header.php";

?>

<body>
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-9">
        <div class="card shadow-lg rounded-4">
          <div class="card-header text-center rounded-top-4 bg-gradient" style="background-color: #4b1e85;">
            <h3 class="text-white mb-0">🎓 Student Bio Data Form</h3>
          </div>
          <div class="card-body p-4">
            <form method="POST" action="../config/submit.php">
              <div class="row g-3 mb-3">
                <div class="col-md-6">
                  <label for="firstName" class="form-label">First Name</label>
                  <input type="text" name="firstname" class="form-control" id="firstName" placeholder="Jane" required />
                </div>
                <div class="col-md-6">
                  <label for="lastName" class="form-label">Last Name</label>
                  <input type="text" name="lastname" class="form-control" id="lastName" placeholder="Doe" required />
                </div>
              </div>

              <div class="row g-3 mb-3">
                <div class="col-md-6">
                  <label for="email" class="form-label">Student Email</label>
                  <input type="email" name="email" class="form-control" id="email" placeholder="jane@student.edu" required />
                </div>
                <div class="col-md-6">
                  <label for="matric" class="form-label">Matric No.</label>
                  <input type="text" name="matric" class="form-control" id="matric" placeholder="STU1234567" required />
                </div>
              </div>

              <div class="row g-3 mb-3">
                <div class="col-md-6">
                  <label for="gender" class="form-label">Gender</label>
                  <select class="form-select" name="gender" id="gender" required>
                    <option selected disabled>Choose...</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="dob" class="form-label">Date of Birth</label>
                  <input type="date" name="dob" class="form-control" id="dob" required />
                </div>
              </div>

              <div class="row g-3 mb-3">
                <div class="col-md-6">
                  <label for="department" class="form-label">Department</label>
                  <input type="text" name="dept" class="form-control" id="department" placeholder="Computer Science" />
                </div>
                <div class="col-md-6">
                  <label for="level" class="form-label">Level</label>
                  <select class="form-select" name="level" id="level" required>
                    <option selected disabled>Select Level</option>
                    <option>100</option>
                    <option>200</option>
                    <option>300</option>
                    <option>400</option>
                    <option>500</option>
                  </select>
                </div>
              </div>

              <div class="mb-3">
                <label for="address" class="form-label">Home Address</label>
                <textarea class="form-control" name="address" id="address" rows="3" placeholder="123 Campus Street, City, State" required></textarea>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-primary px-5 py-2 mt-3">Submit 🎉</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
