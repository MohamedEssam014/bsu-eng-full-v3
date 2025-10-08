<?php
require_once __DIR__ . '/templates/helpers.php';
$lang = set_lang();
require_once __DIR__ . '/templates/db.php';
$id = $_GET['id'] ?? null;
if($id){
    $stmt = $pdo->prepare('DELETE FROM students WHERE id=?');
    $stmt->execute([$id]);
}
header('Location: /students.php?lang='.$lang);
exit;
