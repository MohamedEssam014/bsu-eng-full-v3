<?php
require_once __DIR__ . '/templates/helpers.php';
$lang = set_lang();
require_once __DIR__ . '/templates/db.php';
include __DIR__ . '/templates/header.php';

$stmt = $pdo->query('SELECT * FROM courses ORDER BY id DESC');
$courses = $stmt->fetchAll();
?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h3><?= htmlspecialchars(t('courses', $lang)) ?></h3>
  <a href="/add_course.php?lang=<?= $lang ?>" class="btn btn-success"><?= htmlspecialchars(t('add_new', $lang)) ?></a>
</div>
<table class="table table-bordered">
  <thead class="table-light">
    <tr><th>#</th><th><?= htmlspecialchars(t('name', $lang)) ?></th><th><?= htmlspecialchars(t('instructor', $lang)) ?></th><th><?= htmlspecialchars(t('actions', $lang)) ?></th></tr>
  </thead>
  <tbody>
    <?php foreach($courses as $c): ?>
      <tr>
        <td><?= $c['id'] ?></td>
        <td><?= htmlspecialchars($lang==='en' ? $c['name_en'] : $c['name_ar']) ?></td>
        <td><?= htmlspecialchars($c['instructor']) ?></td>
        <td>
          <a class="btn btn-sm btn-primary" href="/edit_course.php?id=<?= $c['id'] ?>&lang=<?= $lang ?>"><?= htmlspecialchars(t('edit', $lang)) ?></a>
          <a class="btn btn-sm btn-danger" href="/delete_course.php?id=<?= $c['id'] ?>&lang=<?= $lang ?>" onclick="return confirm('Are you sure?')"><?= htmlspecialchars(t('delete', $lang)) ?></a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php include __DIR__ . '/templates/footer.php'; ?>
