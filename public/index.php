<?php
require_once __DIR__ . '/templates/helpers.php';
$lang = set_lang();
require_once __DIR__ . '/templates/db.php';

// fetch latest news equivalent: students and courses counts for dashboard
$students_count = $pdo->query('SELECT COUNT(*) as c FROM students')->fetch()['c'];
$courses_count = $pdo->query('SELECT COUNT(*) as c FROM courses')->fetch()['c'];

include __DIR__ . '/templates/header.php';
?>
<div class="container mt-4">
  <div class="row">
    <div class="col-12">
      <h1><?= htmlspecialchars(t('site_title', $lang)) ?></h1>
      <p class="text-muted"><?= $lang==='ar' ? 'موقع كلية الهندسة' : 'BSU Faculty of Engineering' ?></p>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-md-6">
      <div class="card p-3">
        <h5><?= $lang==='ar' ? 'إجمالي الطلاب' : 'Total Students' ?></h5>
        <p class="display-6"><?= $students_count ?></p>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card p-3">
        <h5><?= $lang==='ar' ? 'إجمالي المقررات' : 'Total Courses' ?></h5>
        <p class="display-6"><?= $courses_count ?></p>
      </div>
    </div>
  </div>
</div>
<?php include __DIR__ . '/templates/footer.php'; ?>