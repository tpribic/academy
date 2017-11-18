<?php
require_once 'head.php';

// redirect if not logged in
if (!isset($_SESSION['user'])) {
  header('Location: login.php');
  die;
}

echo $head;
echo $header;

// get users
$sql = 'SELECT id, email, first_name, last_name, is_active FROM users';
$stmt = $db->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll();
?>

<div class="container content-wrapper">
  <a href="add.php"><span class="oi oi-plus"></span></a>
  <table class="table table-hover">
    <thead>
    <tr>
      <th>#</th>
      <th>Email</th>
      <th>First Name</th>
      <th>Last Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($users as $user): ?>
    <tr class="<?= $user['is_active'] !== '1' ? 'inactive' : '' ?>">
      <th scope="row"><?= $user['id'] ?></th>
      <td><?= $user['email'] ?></td>
      <td><?= $user['first_name'] ?></td>
      <td><?= $user['last_name'] ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?= $footer ?>
