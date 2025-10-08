<?php
require_once __DIR__ . '/templates/helpers.php';
$lang = set_lang();
require_once __DIR__ . '/templates/db.php';
include __DIR__ . '/templates/header.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_number = $_POST['student_number'] ?? '';
    $name_en = $_POST['name_en'] ?? '';
    $name_ar = $_POST['name_ar'] ?? '';
    $email = $_POST['email'] ?? '';
    $course = $_POST['course'] ?? '';
    $stmt = $pdo->prepare('INSERT INTO students (student_number, name_en, name_ar, email, course) VALUES (?,?,?,?,?)');
    $stmt->execute([$student_number, $name_en, $name_ar, $email, $course]);
    header('Location: /students.php?lang='.$lang);
    exit;
}
?>
<h3><?= htmlspecialchars(t('add_new', $lang) . ' ' . t('students', $lang)) ?></h3>
<form method="post">
  <div class="mb-3"><label>Student Number</label><input name="student_number" class="form-control"></div>
  <div class="mb-3"><label><?= htmlspecialchars(t('name', $lang)) ?> (EN)</label><input name="name_en" class="form-control"></div>
  <div class="mb-3"><label><?= htmlspecialchars(t('name', $lang)) ?> (AR)</label><input name="name_ar" class="form-control"></div>
  <div class="mb-3"><label><?= htmlspecialchars(t('email', $lang)) ?></label><input name="email" class="form-control"></div>
  <div class="mb-3"><label>Course</label><input name="course" class="form-control"></div>
  <button class="btn btn-success"><?= htmlspecialchars(t('save', $lang)) ?></button>
</form>
<?php include __DIR__ . '/templates/footer.php'; ?>
