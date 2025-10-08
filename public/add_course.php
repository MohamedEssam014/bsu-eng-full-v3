<?php
require_once __DIR__ . '/templates/helpers.php';
$lang = set_lang();
require_once __DIR__ . '/templates/db.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course_code = $_POST['course_code'] ?? '';
    $name_en = $_POST['name_en'] ?? '';
    $name_ar = $_POST['name_ar'] ?? '';
    $instructor = $_POST['instructor'] ?? '';
    $stmt = $pdo->prepare('INSERT INTO courses (course_code, name_en, name_ar, instructor) VALUES (?,?,?,?)');
    $stmt->execute([$course_code, $name_en, $name_ar, $instructor]);
    header('Location: /courses.php?lang='.$lang);
    exit;
}
include __DIR__ . '/templates/header.php';
?>
<h3><?= htmlspecialchars(t('add_new', $lang) . ' ' . t('courses', $lang)) ?></h3>
<form method="post">
  <div class="mb-3"><label>Course Code</label><input name="course_code" class="form-control"></div>
  <div class="mb-3"><label><?= htmlspecialchars(t('name', $lang)) ?> (EN)</label><input name="name_en" class="form-control"></div>
  <div class="mb-3"><label><?= htmlspecialchars(t('name', $lang)) ?> (AR)</label><input name="name_ar" class="form-control"></div>
  <div class="mb-3"><label><?= htmlspecialchars(t('instructor', $lang)) ?></label><input name="instructor" class="form-control"></div>
  <button class="btn btn-success"><?= htmlspecialchars(t('save', $lang)) ?></button>
</form>
<?php include __DIR__ . '/templates/footer.php'; ?>
