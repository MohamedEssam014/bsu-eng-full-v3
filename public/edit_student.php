<?php
require_once __DIR__ . '/templates/helpers.php';
$lang = set_lang();
require_once __DIR__ . '/templates/db.php';

$id = $_GET['id'] ?? null;
if(!$id){ header('Location: /students.php?lang='.$lang); exit; }

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_number = $_POST['student_number'] ?? '';
    $name_en = $_POST['name_en'] ?? '';
    $name_ar = $_POST['name_ar'] ?? '';
    $email = $_POST['email'] ?? '';
    $course = $_POST['course'] ?? '';
    $stmt = $pdo->prepare('UPDATE students SET student_number=?, name_en=?, name_ar=?, email=?, course=? WHERE id=?');
    $stmt->execute([$student_number,$name_en,$name_ar,$email,$course,$id]);
    header('Location: /students.php?lang='.$lang);
    exit;
}

$stmt = $pdo->prepare('SELECT * FROM students WHERE id=?');
$stmt->execute([$id]);
$s = $stmt->fetch();
include __DIR__ . '/templates/header.php';
?>
<h3><?= htmlspecialchars(t('edit', $lang) . ' ' . t('students', $lang)) ?></h3>
<form method="post">
  <div class="mb-3"><label>Student Number</label><input name="student_number" class="form-control" value="<?= htmlspecialchars($s['student_number']) ?>"></div>
  <div class="mb-3"><label><?= htmlspecialchars(t('name', $lang)) ?> (EN)</label><input name="name_en" class="form-control" value="<?= htmlspecialchars($s['name_en']) ?>"></div>
  <div class="mb-3"><label><?= htmlspecialchars(t('name', $lang)) ?> (AR)</label><input name="name_ar" class="form-control" value="<?= htmlspecialchars($s['name_ar']) ?>"></div>
  <div class="mb-3"><label><?= htmlspecialchars(t('email', $lang)) ?></label><input name="email" class="form-control" value="<?= htmlspecialchars($s['email']) ?>"></div>
  <div class="mb-3"><label>Course</label><input name="course" class="form-control" value="<?= htmlspecialchars($s['course']) ?>"></div>
  <button class="btn btn-primary"><?= htmlspecialchars(t('save', $lang)) ?></button>
</form>
<?php include __DIR__ . '/templates/footer.php'; ?>
