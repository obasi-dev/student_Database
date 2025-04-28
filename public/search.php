<?php

require "../classes/User.php";

if (isset($_GET['q'])) {
    $query = trim($_GET['q']);
    $user = new User();
    $results = $user->search($query);

    foreach ($results as $u) {
        echo "<tr>
                <td>{$u['id']}</td>
                <td>{$u['first_name']}</td>
                <td>{$u['last_name']}</td>
                <td>{$u['email']}</td>
                <td>{$u['matric_no']}</td>
                <td>
                  <a href='update.php?updateid={$u['id']}' class='me-4 text-success'><i class='fa fa-eye'></i></a>
                  <a href='delete.php?deleteid={$u['id']}' onclick='return confirm(\"Are you Sure?\")'><i class='fa fa-trash text-danger'></i></a>
                </td>
              </tr>";
    }
}
