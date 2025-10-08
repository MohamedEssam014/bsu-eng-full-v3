<?php
require_once __DIR__ . '/templates/helpers.php';
$lang = set_lang();
require_once __DIR__ . '/templates/db.php';
$id = $_GET['id'] ?? null;
if($id){
    $stmt = $pdo->prepare('DELETE FROM courses WHERE id=?');
    $stmt->execute([$id]);
}
header('Location: /courses.php?lang='.$lang);
exit;
