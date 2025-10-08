<?php
require_once __DIR__ . '/../templates/helpers.php';
$lang = set_lang();
require_once __DIR__ . '/../templates/db.php';
session_start();
if(!isset($_SESSION['user'])){ header('Location: /admin/login.php?lang='.$lang); exit; }
include __DIR__ . '/../templates/header.php';
?>
<div class="container">
  <h3>Admin Dashboard</h3>
  <p><a href="/students.php?lang=<?= $lang ?>" class="btn btn-secondary">Manage Students</a>
  <a href="/courses.php?lang=<?= $lang ?>" class="btn btn-secondary">Manage Courses</a></p>
  <p><a href="/admin/logout.php?lang=<?= $lang ?>" class="btn btn-danger">Logout</a></p>
</div>
<?php include __DIR__ . '/../templates/footer.php'; ?>
