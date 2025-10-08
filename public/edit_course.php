<?php
require_once __DIR__ . '/templates/helpers.php';
$lang = set_lang();
require_once __DIR__ . '/templates/db.php';

$id = $_GET['id'] ?? null;
if(!$id){ header('Location: /courses.php?lang='.$lang); exit; }

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course_code = $_POST['course_code'] ?? '';
    $name_en = $_POST['name_en'] ?? '';
    $name_ar = $_POST['name_ar'] ?? '';
    $instructor = $_POST['instructor'] ?? '';
    $stmt = $pdo->prepare('UPDATE courses SET course_code=?, name_en=?, name_ar=?, instructor=? WHERE id=?');
    $stmt->execute([$course_code,$name_en,$name_ar,$instructor,$id]);
    header('Location: /courses.php?lang='.$lang);
    exit;
}

$stmt = $pdo->prepare('SELECT * FROM courses WHERE id=?');
$stmt->execute([$id]);
$c = $stmt->fetch();
include __DIR__ . '/templates/header.php';
?>
<h3><?= htmlspecialchars(t('edit', $lang) . ' ' . t('courses', $lang)) ?></h3>
<form method="post">
  <div class="mb-3"><label>Course Code</label><input name="course_code" class="form-control" value="<?= htmlspecialchars($c['course_code']) ?>"></div>
  <div class="mb-3"><label><?= htmlspecialchars(t('name', $lang)) ?> (EN)</label><input name="name_en" class="form-control" value="<?= htmlspecialchars($c['name_en']) ?>"></div>
  <div class="mb-3"><label><?= htmlspecialchars(t('name', $lang)) ?> (AR)</label><input name="name_ar" class="form-control" value="<?= htmlspecialchars($c['name_ar']) ?>"></div>
  <div class="mb-3"><label><?= htmlspecialchars(t('instructor', $lang)) ?></label><input name="instructor" class="form-control" value="<?= htmlspecialchars($c['instructor']) ?>"></div>
  <button class="btn btn-primary"><?= htmlspecialchars(t('save', $lang)) ?></button>
</form>
<?php include __DIR__ . '/templates/footer.php'; ?>
