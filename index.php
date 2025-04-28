
<?php
require "classes/User.php";
include "includes/header.php";

$user = new User();

$limit = 10; // Users per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $limit;

$users = $user->getPaginated($limit, $offset);
$totalUsers = $user->getTotalUsers();
$totalPages = ceil($totalUsers / $limit);




?>
<body>
  <div class="container py-4">

    <!-- Header Row -->
    <div class="d-flex justify-content-between align-items-center mb-4">
    <div class="d-flex" role="search">
    <input class="form-control me-2" type="search" placeholder="Search users..." id="search" />
</div>
      <div class="flex-grow-1 text-center">
        <h1 class="m-0">List of Users</h1>
      </div>
      <div class="ms-auto">
        <a class="btn btn-sm btn-primary" href="public/create.php">Add User</a>
      </div>
    </div>

    <!-- Table -->
    <table class="table" id="userTable">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First</th>
          <th scope="col">Last</th>
          <th scope="col">Email</th>
          <th scope="col">Matric No.</th>
          <th scope="col">Action</th>

        </tr>
      </thead>
      <tbody>
      <?php foreach ($users as $u): ?>
        <tr>
          <td><?= $u['id']; ?></td>
          <td><?= $u['first_name']; ?></td>
          <td><?= $u['last_name']; ?></td>
          <td><?= $u['email']; ?></td>
          <td><?= $u['matric_no']; ?></td>
          <td><a href="public/update.php?updateid=<?= $u['id']?>" class="me-4 text-success">
            <i class="fa fa-eye"></i></a><a href="public/delete.php?deleteid=<?= $u['id'] ?>" onclick="return confirm('Are you Sure?')">
                <i class="fa fa-trash text-danger"></i></a></td>
          
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    
    <!-- Pagination Links -->
<nav>
  <ul class="pagination justify-content-center mt-4">
    <?php if ($page > 1): ?>
      <li class="page-item"><a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a></li>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
      <li class="page-item <?= $i === $page ? 'active' : '' ?>">
        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
      </li>
    <?php endfor; ?>

    <?php if ($page < $totalPages): ?>
      <li class="page-item"><a class="page-link" href="?page=<?= $page + 1 ?>">Next</a></li>
    <?php endif; ?>
  </ul>
</nav>

  </div>

  <script>
const searchInput = document.getElementById('search');


searchInput.addEventListener('keydown', function (e) {
  if (e.key === 'Enter') {
    e.preventDefault();
  }
});

// Real-time search
searchInput.addEventListener('keyup', function () {
 
  const query = this.value.trim();

  fetch('./public/search.php?q=' + encodeURIComponent(query))
    .then(res => res.text())
    .then(data => {
      document.querySelector('#userTable tbody').innerHTML = data;
    });
});
</script>

</body>
</html>
