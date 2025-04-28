<?php
include "../includes/header.php";

require "../classes/User.php";

$user = new User(); 

$id = $_GET['updateid'] ?? null;

if (!$id){ die("ID not found.");}
$errors = [];
$data = $user->getById($id);
if ($data) {
   
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $firstname = htmlspecialchars(trim($_POST['firstname'] ?? ''));
    $lastname = htmlspecialchars(trim($_POST['lastname'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $matric = htmlspecialchars(trim($_POST['matric'] ?? ''));
    $gender = htmlspecialchars(trim($_POST['gender'] ?? ''));
    $dob = htmlspecialchars(trim($_POST['dob'] ?? ''));
    $dept = htmlspecialchars(trim($_POST['dept'] ?? ''));
    $level = htmlspecialchars(trim($_POST['level'] ?? ''));
    $address = htmlspecialchars(trim($_POST['address'] ?? ''));

    $errors = $user->validate($firstname, $lastname, $email, $matric, $gender, $dob, $dept, $level, $address);

    if (empty($errors)) {
        $user->update($id,$firstname, $lastname, $email, $matric, $gender, $dob, $dept, $level, $address);
        header("Location: ../index.php");
        exit;
    }
}

}
?>

<body>
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-9">
        <div class="card shadow-lg rounded-4">
          <div class="card-header text-center rounded-top-4 bg-gradient" style="background-color: #4b1e85;">
            <h3 class="text-white mb-0">🎓 Update Student Bio Data</h3>
          </div>
          <div class="card-body p-4">
            <form method="POST" >
              <div class="row g-3 mb-3">
                <div class="col-md-6">
                  <label for="firstName" class="form-label">First Name</label>
                  <input type="text" name="firstname" class="form-control"
                   id="firstName" placeholder="Jane" required  value="<?= $data['first_name'];?>"/>
                </div>
                <div class="col-md-6">
                  <label for="lastName" class="form-label">Last Name</label>
                  <input type="text" name="lastname" class="form-control"
                   id="lastName" placeholder="Doe" required value="<?= $data['last_name'];?>"/>
                </div>
              </div>

              <div class="row g-3 mb-3">
                <div class="col-md-6">
                  <label for="email" class="form-label">Student Email</label>
                  <input type="email" name="email" class="form-control"
                   id="email" placeholder="jane@student.edu" required value="<?= $data['email'];?>" readonly/>
                </div>
                <div class="col-md-6">
                  <label for="matric" class="form-label">Matric No.</label>
                  <input type="text" name="matric" class="form-control"
                   id="matric" placeholder="STU1234567" required value="<?= $data['matric_no'];?>"/>
                </div>
              </div>

              <div class="row g-3 mb-3">
                <div class="col-md-6">
                  <label for="gender" class="form-label">Gender</label>
                  <select class="form-select" name="gender" id="gender" value="<?= $data['gender'];?>"required>
                    <option selected disabled> <?= $data['gender'] ?></option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="dob" class="form-label">Date of Birth</label>
                  <input type="date" name="dob" class="form-control" id="dob" required value="<?= $data['dob'];?>"/>
                </div>
              </div>

              <div class="row g-3 mb-3">
                <div class="col-md-6">
                  <label for="department" class="form-label">Department</label>
                  <input type="text" name="dept" class="form-control" 
                  id="department" placeholder="Computer Science" value="<?= $data['department'];?>" />
                </div>
                <div class="col-md-6">
                  <label for="level" class="form-label">Level</label>
                  <select class="form-select" name="level" id="level" required value="<?= $data['level'];?>">
                    <option selected disabled > <?= $data['level'];?></option>

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
                <textarea class="form-control" name="address" 
                id="address" rows="3" placeholder="123 Campus Street, City, State" required> <?= $data['address'] ?></textarea>
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
