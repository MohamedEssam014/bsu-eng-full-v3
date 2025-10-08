<?php
// $lang must be set before including header
$dir = $lang === 'en' ? 'ltr' : 'rtl';
$lang_attr = $lang === 'en' ? 'en' : 'ar';
?><!doctype html>
<html lang="<?= $lang_attr ?>" dir="<?= $dir ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars(t('site_title', $lang)) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <?php if($lang==='ar'): ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-rtl@4.2.1/dist/css/bootstrap-rtl.min.css" rel="stylesheet">
    <style>body{font-family: 'Tajawal', sans-serif;}</style>
  <?php endif; ?>
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
  <div class="container">
    <a class="navbar-brand" href="/?lang=<?= $lang ?>"><?= $lang==='ar' ? 'كلية الهندسة' : 'Faculty of Engineering' ?></a>
    <div class="d-flex align-items-center">
      <a class="btn btn-link" href="/?lang=ar">عربي</a>
      <a class="btn btn-link" href="/?lang=en">EN</a>
      <a class="btn btn-primary ms-2" href="/students.php?lang=<?= $lang ?>"><?= htmlspecialchars(t('students', $lang)) ?></a>
      <a class="btn btn-outline-secondary ms-2" href="/courses.php?lang=<?= $lang ?>"><?= htmlspecialchars(t('courses', $lang)) ?></a>
      <a class="btn btn-outline-dark ms-2" href="/admin/login.php?lang=<?= $lang ?>"><?= htmlspecialchars(t('login', $lang)) ?></a>
    </div>
  </div>
</nav>
<div class="container mt-4">
